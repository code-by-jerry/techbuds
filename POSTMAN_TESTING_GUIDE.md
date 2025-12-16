# Postman Testing Guide for Authentication Endpoints

This guide will help you test all authentication endpoints manually using Postman.

## Prerequisites

1. **Start Laravel Server:**
   ```bash
   php artisan serve
   ```
   Server will run on `http://localhost:8000`

2. **Ensure Database is Set Up:**
   - Make sure you have a user in the database
   - Or create one using tinker or a seeder

3. **Create a Test User (Optional):**
   ```bash
   php artisan tinker
   ```
   Then run:
   ```php
   App\Models\User::create([
       'name' => 'Test User',
       'email' => 'test@example.com',
       'password' => bcrypt('password123'),
   ]);
   ```

---

## Postman Setup

### Base URL
Set your base URL: `http://localhost:8000/api`

### Environment Variables (Optional but Recommended)
Create a Postman environment with:
- `base_url`: `http://localhost:8000`
- `token`: (will be set after login)

---

## 1. Test Login Endpoint

### Request Details
- **Method:** `POST`
- **URL:** `http://localhost:8000/api/login`
- **Headers:**
  ```
  Content-Type: application/json
  Accept: application/json
  ```

### Request Body (raw JSON):
```json
{
  "email": "test@example.com",
  "password": "password123"
}
```

### Expected Success Response (200 OK):
```json
{
  "token": "1|abcdefghijklmnopqrstuvwxyz1234567890",
  "user": {
    "id": 1,
    "name": "Test User",
    "email": "test@example.com",
    "role": "user"
  },
  "message": "Login successful"
}
```

### Expected Error Responses:

**401 Unauthorized (Invalid Credentials):**
```json
{
  "message": "Invalid email or password",
  "errors": {}
}
```

**422 Unprocessable Entity (Validation Error):**
```json
{
  "message": "The given data was invalid.",
  "errors": {
    "email": ["The email field is required."],
    "password": ["The password field is required."]
  }
}
```

### Steps in Postman:
1. Create a new request
2. Set method to `POST`
3. Enter URL: `http://localhost:8000/api/login`
4. Go to **Headers** tab and add:
   - `Content-Type`: `application/json`
   - `Accept`: `application/json`
5. Go to **Body** tab
6. Select **raw** and **JSON** format
7. Paste the request body JSON
8. Click **Send**
9. **Important:** Copy the `token` from the response - you'll need it for logout

---

## 2. Test Logout Endpoint

### Request Details
- **Method:** `POST`
- **URL:** `http://localhost:8000/api/logout`
- **Headers:**
  ```
  Content-Type: application/json
  Accept: application/json
  Authorization: Bearer {your-token-here}
  ```

### Request Body:
None required (or send empty JSON: `{}`)

### Expected Success Response (200 OK):
```json
{
  "message": "Logged out successfully"
}
```

### Expected Error Response:

**401 Unauthorized (Missing/Invalid Token):**
```json
{
  "message": "Unauthenticated."
}
```

### Steps in Postman:
1. Create a new request
2. Set method to `POST`
3. Enter URL: `http://localhost:8000/api/logout`
4. Go to **Headers** tab and add:
   - `Content-Type`: `application/json`
   - `Accept`: `application/json`
   - `Authorization`: `Bearer {paste-your-token-here}`
     - Example: `Bearer 1|abcdefghijklmnopqrstuvwxyz1234567890`
5. Go to **Body** tab - leave empty or select "none"
6. Click **Send**

### Pro Tip: Use Postman Authorization Tab
Instead of manually adding Authorization header, you can:
1. Go to **Authorization** tab
2. Select **Type**: `Bearer Token`
3. Paste your token in the **Token** field

---

## 3. Test Forgot Password Endpoint

### Request Details
- **Method:** `POST`
- **URL:** `http://localhost:8000/api/forgot-password`
- **Headers:**
  ```
  Content-Type: application/json
  Accept: application/json
  ```

### Request Body (raw JSON):
```json
{
  "email": "test@example.com"
}
```

### Expected Success Response (200 OK):
```json
{
  "message": "Password reset link has been sent to your email address.",
  "status": "success"
}
```

**Note:** This response is returned even if the email doesn't exist (to prevent email enumeration attacks).

### Expected Error Response:

**422 Unprocessable Entity (Validation Error):**
```json
{
  "message": "The given data was invalid.",
  "errors": {
    "email": ["The email field is required.", "The email must be a valid email address."]
  }
}
```

### Steps in Postman:
1. Create a new request
2. Set method to `POST`
3. Enter URL: `http://localhost:8000/api/forgot-password`
4. Go to **Headers** tab and add:
   - `Content-Type`: `application/json`
   - `Accept`: `application/json`
5. Go to **Body** tab
6. Select **raw** and **JSON** format
7. Paste the request body JSON
8. Click **Send**

**Note:** Check your email (or mail log if using Mailtrap) for the password reset link.

---

## 4. Test Reset Password Endpoint

### Request Details
- **Method:** `POST`
- **URL:** `http://localhost:8000/api/reset-password`
- **Headers:**
  ```
  Content-Type: application/json
  Accept: application/json
  ```

### Request Body (raw JSON):
```json
{
  "token": "reset-token-from-email",
  "email": "test@example.com",
  "password": "newpassword123",
  "password_confirmation": "newpassword123"
}
```

### Expected Success Response (200 OK):
```json
{
  "message": "Password has been reset successfully.",
  "status": "success"
}
```

### Expected Error Responses:

**400 Bad Request (Invalid Token):**
```json
{
  "message": "Invalid or expired password reset token."
}
```

**422 Unprocessable Entity (Validation Error):**
```json
{
  "message": "The given data was invalid.",
  "errors": {
    "password": ["The password must be at least 8 characters."],
    "password_confirmation": ["The password confirmation does not match."]
  }
}
```

### Steps in Postman:
1. **First:** Request a password reset using the forgot-password endpoint
2. **Check your email** (or mail logs) for the reset token
3. Create a new request
4. Set method to `POST`
5. Enter URL: `http://localhost:8000/api/reset-password`
6. Go to **Headers** tab and add:
   - `Content-Type`: `application/json`
   - `Accept`: `application/json`
7. Go to **Body** tab
8. Select **raw** and **JSON** format
9. Paste the request body JSON with the actual token from email
10. Click **Send**

### How to Get Reset Token:
1. Use the forgot-password endpoint
2. Check your email (or Laravel log file: `storage/logs/laravel.log`)
3. Look for the reset token in the email link or database
4. Or use tinker to check:
   ```bash
   php artisan tinker
   ```
   ```php
   DB::table('password_reset_tokens')->latest()->first();
   ```

---

## Testing Rate Limiting

### Test Login Rate Limit:
1. Send 5 login requests with wrong credentials quickly
2. On the 6th attempt, you should get a **429 Too Many Requests** response:
   ```json
   {
     "message": "Too many login attempts. Please try again later."
   }
   ```

### Test Forgot Password Rate Limit:
1. Send 3 forgot-password requests quickly
2. On the 4th attempt, you should get a **429 Too Many Requests** response

---

## Postman Collection Setup (Recommended)

### Create a Collection:
1. Click **New** → **Collection**
2. Name it: "Techbuds Admin Backend - Auth"

### Create Collection Variables:
1. Click on your collection
2. Go to **Variables** tab
3. Add:
   - `base_url`: `http://localhost:8000`
   - `token`: (leave empty, will be set automatically)

### Use Variables in Requests:
- URL: `{{base_url}}/api/login`
- Authorization Token: `{{token}}`

### Auto-save Token (Using Tests Tab):
Add this script in the **Tests** tab of your Login request:

```javascript
// Save token to collection variable
if (pm.response.code === 200) {
    const response = pm.response.json();
    if (response.token) {
        pm.collectionVariables.set("token", response.token);
        console.log("Token saved:", response.token);
    }
}
```

Then in your Logout request Authorization header, use: `Bearer {{token}}`

---

## Quick Test Checklist

- [ ] Login with valid credentials → Should return token
- [ ] Login with invalid credentials → Should return 401
- [ ] Login with missing fields → Should return 422
- [ ] Login 6 times quickly with wrong password → Should return 429 (rate limit)
- [ ] Logout with valid token → Should return success
- [ ] Logout without token → Should return 401
- [ ] Forgot password with valid email → Should return success
- [ ] Forgot password with invalid email format → Should return 422
- [ ] Forgot password 4 times quickly → Should return 429 (rate limit)
- [ ] Reset password with valid token → Should return success
- [ ] Reset password with invalid token → Should return 400
- [ ] Reset password with password mismatch → Should return 422

---

## Troubleshooting

### Issue: "Could not find driver"
- **Solution:** Make sure MySQL is running and PHP PDO MySQL extension is enabled

### Issue: "Route not found" or 404
- **Solution:** 
  - Check if server is running: `php artisan serve`
  - Verify URL is correct: `http://localhost:8000/api/login`
  - Clear route cache: `php artisan route:clear`

### Issue: "Unauthenticated" on logout
- **Solution:** Make sure you're sending the token in Authorization header as `Bearer {token}`

### Issue: Password reset email not sending
- **Solution:** 
  - Check `.env` mail configuration
  - Use Mailtrap for testing: https://mailtrap.io
  - Check `storage/logs/laravel.log` for errors
  - Or use `php artisan tinker` to check `password_reset_tokens` table

### Issue: CORS errors
- **Solution:** 
  - Verify `config/cors.php` is configured correctly
  - Check that `config/sanctum.php` has your frontend URL in stateful domains
  - Clear config cache: `php artisan config:clear`

---

## Example cURL Commands (Alternative to Postman)

### Login:
```bash
curl -X POST http://localhost:8000/api/login \
  -H "Content-Type: application/json" \
  -H "Accept: application/json" \
  -d '{"email":"test@example.com","password":"password123"}'
```

### Logout:
```bash
curl -X POST http://localhost:8000/api/logout \
  -H "Content-Type: application/json" \
  -H "Accept: application/json" \
  -H "Authorization: Bearer YOUR_TOKEN_HERE"
```

### Forgot Password:
```bash
curl -X POST http://localhost:8000/api/forgot-password \
  -H "Content-Type: application/json" \
  -H "Accept: application/json" \
  -d '{"email":"test@example.com"}'
```

### Reset Password:
```bash
curl -X POST http://localhost:8000/api/reset-password \
  -H "Content-Type: application/json" \
  -H "Accept: application/json" \
  -d '{"token":"reset-token","email":"test@example.com","password":"newpassword123","password_confirmation":"newpassword123"}'
```

---

**Happy Testing! 🚀**

