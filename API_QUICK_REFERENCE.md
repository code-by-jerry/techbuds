# API Quick Reference - Frontend Developers

## 🚀 Base URL
```
http://localhost:8000/api
```

## 📋 Endpoints Summary

| Endpoint | Method | Auth Required | Description |
|----------|--------|----------------|-------------|
| `/api/login` | POST | ❌ | Login user |
| `/api/logout` | POST | ✅ | Logout user |
| `/api/forgot-password` | POST | ❌ | Request password reset |
| `/api/reset-password` | POST | ❌ | Reset password |

---

## 🔑 Authentication

Store token after login:
```javascript
localStorage.setItem('auth_token', token);
```

Use token in requests:
```javascript
headers: {
  'Authorization': `Bearer ${token}`,
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}
```

---

## 📝 1. Login

**POST** `/api/login`

**Body:**
```json
{
  "email": "admin@techbuds.online",
  "password": "admin@2025"
}
```

**Response (200):**
```json
{
  "token": "1|abc...",
  "user": {
    "id": 1,
    "name": "Admin User",
    "email": "admin@techbuds.online",
    "role": "user"
  },
  "message": "Login successful"
}
```

**Errors:**
- `401` - Invalid credentials
- `422` - Validation errors
- `429` - Rate limit (5 attempts/15 min)

---

## 🚪 2. Logout

**POST** `/api/logout`

**Headers:** `Authorization: Bearer {token}`

**Response (200):**
```json
{
  "message": "Logged out successfully"
}
```

**Error:** `401` - Unauthenticated

---

## 📧 3. Forgot Password

**POST** `/api/forgot-password`

**Body:**
```json
{
  "email": "admin@techbuds.online"
}
```

**Response (200):**
```json
{
  "message": "Password reset link has been sent to your email address.",
  "status": "success"
}
```

**Note:** Always returns success (even if email doesn't exist)

**Errors:**
- `422` - Validation errors
- `429` - Rate limit (3 attempts/60 min)

---

## 🔄 4. Reset Password

**POST** `/api/reset-password`

**Body:**
```json
{
  "token": "reset-token-from-email",
  "email": "admin@techbuds.online",
  "password": "newpassword123",
  "password_confirmation": "newpassword123"
}
```

**Response (200):**
```json
{
  "message": "Password has been reset successfully.",
  "status": "success"
}
```

**Errors:**
- `400` - Invalid/expired token
- `422` - Validation errors

---

## ⚠️ Important Notes

1. **Always include headers:**
   - `Content-Type: application/json`
   - `Accept: application/json`

2. **Token storage:** Save token in localStorage after login

3. **Token removal:** Clear token on logout or 401 error

4. **Error handling:** Check status codes (200, 400, 401, 422, 429)

5. **Rate limiting:** Login (5/15min), Forgot Password (3/60min)

---

## 🧪 Test Credentials

```
Email: admin@techbuds.online
Password: admin@2025
```

---

For detailed documentation, see `API_DOCUMENTATION.md`

