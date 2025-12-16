# Techbuds Admin Backend - API Documentation

## Base URL
```
http://localhost:8000/api
```

**Note:** For production, replace `localhost:8000` with your production domain.

---

## Authentication

All endpoints use **Bearer Token** authentication (except login, forgot-password, and reset-password).

**Header Format:**
```
Authorization: Bearer {your-token-here}
```

---

## Endpoints

### 1. Login

Authenticate a user and receive an access token.

**Endpoint:** `POST /api/login`

**Authentication:** Not required

**Request Headers:**
```
Content-Type: application/json
Accept: application/json
```

**Request Body:**
```json
{
  "email": "admin@techbuds.online",
  "password": "admin@2025"
}
```

**Success Response (200 OK):**
```json
{
  "token": "1|abcdefghijklmnopqrstuvwxyz1234567890",
  "user": {
    "id": 1,
    "name": "Admin User",
    "email": "admin@techbuds.online",
    "role": "user"
  },
  "message": "Login successful"
}
```

**Error Responses:**

**401 Unauthorized** - Invalid credentials:
```json
{
  "message": "Invalid email or password",
  "errors": {}
}
```

**422 Unprocessable Entity** - Validation errors:
```json
{
  "message": "The given data was invalid.",
  "errors": {
    "email": ["The email field is required."],
    "password": ["The password field is required."]
  }
}
```

**429 Too Many Requests** - Rate limit exceeded (5 attempts per 15 minutes):
```json
{
  "message": "Too many login attempts. Please try again later."
}
```

**Validation Rules:**
- `email`: Required, must be valid email format
- `password`: Required, minimum 6 characters

---

### 2. Logout

Revoke the current access token and log out the user.

**Endpoint:** `POST /api/logout`

**Authentication:** Required (Bearer Token)

**Request Headers:**
```
Content-Type: application/json
Accept: application/json
Authorization: Bearer {token}
```

**Request Body:** None (or empty JSON `{}`)

**Success Response (200 OK):**
```json
{
  "message": "Logged out successfully"
}
```

**Error Response:**

**401 Unauthorized** - Missing or invalid token:
```json
{
  "message": "Unauthenticated."
}
```

**Frontend Implementation Note:**
After successful logout, remove the token from localStorage/sessionStorage and redirect to login page.

---

### 3. Forgot Password

Request a password reset link to be sent to the user's email.

**Endpoint:** `POST /api/forgot-password`

**Authentication:** Not required

**Request Headers:**
```
Content-Type: application/json
Accept: application/json
```

**Request Body:**
```json
{
  "email": "admin@techbuds.online"
}
```

**Success Response (200 OK):**
```json
{
  "message": "Password reset link has been sent to your email address.",
  "status": "success"
}
```

**Important Security Note:**
This endpoint **always returns success** (200 OK) even if the email doesn't exist in the database. This prevents email enumeration attacks.

**Error Response:**

**422 Unprocessable Entity** - Validation errors:
```json
{
  "message": "The given data was invalid.",
  "errors": {
    "email": ["The email field is required.", "The email must be a valid email address."]
  }
}
```

**429 Too Many Requests** - Rate limit exceeded (3 attempts per 60 minutes):
```json
{
  "message": "Too many password reset requests. Please try again later."
}
```

**Validation Rules:**
- `email`: Required, must be valid email format

**Frontend Implementation Note:**
Always show the success message to the user, regardless of whether the email exists. Do not reveal if an email is registered or not.

---

### 4. Reset Password

Reset the user's password using a token received via email.

**Endpoint:** `POST /api/reset-password`

**Authentication:** Not required

**Request Headers:**
```
Content-Type: application/json
Accept: application/json
```

**Request Body:**
```json
{
  "token": "reset-token-from-email",
  "email": "admin@techbuds.online",
  "password": "newpassword123",
  "password_confirmation": "newpassword123"
}
```

**Success Response (200 OK):**
```json
{
  "message": "Password has been reset successfully.",
  "status": "success"
}
```

**Error Responses:**

**400 Bad Request** - Invalid or expired token:
```json
{
  "message": "Invalid or expired password reset token."
}
```

**422 Unprocessable Entity** - Validation errors:
```json
{
  "message": "The given data was invalid.",
  "errors": {
    "password": ["The password must be at least 8 characters."],
    "password_confirmation": ["The password confirmation does not match."]
  }
}
```

**Validation Rules:**
- `token`: Required, must be valid reset token from email
- `email`: Required, must be valid email format
- `password`: Required, minimum 8 characters
- `password_confirmation`: Required, must match `password`

**Frontend Implementation Notes:**
1. The token and email are typically extracted from the URL query parameters when the user clicks the reset link in their email
2. The reset link format is usually: `https://yourapp.com/reset-password?token=xxx&email=user@example.com`
3. After successful reset, redirect the user to the login page

---

## Frontend Integration Guide

### 1. Token Storage

After successful login, store the token:
```javascript
// Example: Store in localStorage
localStorage.setItem('auth_token', response.data.token);
localStorage.setItem('user', JSON.stringify(response.data.user));
```

### 2. Making Authenticated Requests

Include the token in all authenticated requests:
```javascript
// Example using Axios
axios.defaults.headers.common['Authorization'] = `Bearer ${localStorage.getItem('auth_token')}`;
```

Or per request:
```javascript
axios.post('/api/logout', {}, {
  headers: {
    'Authorization': `Bearer ${localStorage.getItem('auth_token')}`,
    'Content-Type': 'application/json',
    'Accept': 'application/json'
  }
});
```

### 3. Handling Token Expiration

If you receive a 401 Unauthorized response:
- Clear stored token
- Redirect user to login page
- Show appropriate message

### 4. Error Handling

Always check for these HTTP status codes:
- **200**: Success
- **400**: Bad Request (invalid data)
- **401**: Unauthorized (invalid/missing token)
- **422**: Validation Error (check `errors` object)
- **429**: Rate Limit Exceeded

### 5. Request Format

All requests should:
- Use `Content-Type: application/json` header
- Use `Accept: application/json` header
- Send JSON in request body (for POST requests)

### 6. Response Format

All responses follow this structure:

**Success:**
```json
{
  "message": "Success message",
  "data": {...} // Optional
}
```

**Error:**
```json
{
  "message": "Error message",
  "errors": {
    "field_name": ["Error message 1", "Error message 2"]
  }
}
```

---

## Example Frontend Implementation

### Login Example (React/Axios)
```javascript
import axios from 'axios';

const login = async (email, password) => {
  try {
    const response = await axios.post('http://localhost:8000/api/login', {
      email,
      password
    }, {
      headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json'
      }
    });

    // Store token and user data
    localStorage.setItem('auth_token', response.data.token);
    localStorage.setItem('user', JSON.stringify(response.data.user));

    return response.data;
  } catch (error) {
    if (error.response) {
      // Handle specific error responses
      if (error.response.status === 401) {
        throw new Error('Invalid email or password');
      } else if (error.response.status === 422) {
        throw new Error(error.response.data.errors);
      } else if (error.response.status === 429) {
        throw new Error('Too many login attempts. Please try again later.');
      }
    }
    throw error;
  }
};
```

### Logout Example
```javascript
const logout = async () => {
  try {
    const token = localStorage.getItem('auth_token');
    
    await axios.post('http://localhost:8000/api/logout', {}, {
      headers: {
        'Authorization': `Bearer ${token}`,
        'Content-Type': 'application/json',
        'Accept': 'application/json'
      }
    });

    // Clear stored data
    localStorage.removeItem('auth_token');
    localStorage.removeItem('user');
    
    // Redirect to login
    window.location.href = '/login';
  } catch (error) {
    // Even if logout fails, clear local data
    localStorage.removeItem('auth_token');
    localStorage.removeItem('user');
  }
};
```

### Forgot Password Example
```javascript
const forgotPassword = async (email) => {
  try {
    const response = await axios.post('http://localhost:8000/api/forgot-password', {
      email
    }, {
      headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json'
      }
    });

    // Always show success message
    return response.data;
  } catch (error) {
    if (error.response?.status === 422) {
      throw error.response.data.errors;
    }
    throw error;
  }
};
```

### Reset Password Example
```javascript
const resetPassword = async (token, email, password, passwordConfirmation) => {
  try {
    const response = await axios.post('http://localhost:8000/api/reset-password', {
      token,
      email,
      password,
      password_confirmation: passwordConfirmation
    }, {
      headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json'
      }
    });

    return response.data;
  } catch (error) {
    if (error.response?.status === 400) {
      throw new Error('Invalid or expired password reset token.');
    } else if (error.response?.status === 422) {
      throw error.response.data.errors;
    }
    throw error;
  }
};
```

---

## CORS Configuration

The backend is configured to accept requests from:
- `http://localhost:5173` (Vite dev server)
- `http://localhost:3000` (Alternative dev server)

For production, update `config/cors.php` with your production domain.

---

## Rate Limiting

- **Login:** 5 attempts per 15 minutes per IP
- **Forgot Password:** 3 attempts per 60 minutes per IP

If rate limit is exceeded, you'll receive a **429 Too Many Requests** response.

---

## Test Credentials

For testing purposes, you can use:
- **Email:** `admin@techbuds.online`
- **Password:** `admin@2025`

---

## Support

For any issues or questions:
- Check the server logs: `storage/logs/laravel.log`
- Verify database connection in `.env`
- Ensure migrations are run: `php artisan migrate`
- Clear config cache: `php artisan config:clear`

---

**Last Updated:** November 2025  
**API Version:** 1.0

