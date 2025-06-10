# 11-grp2-repo

# EventManager API Documentation 
# via postman, invitation link:
("https://app.getpostman.com/join-team?invite_code=086829f86c39a0a764eea3f933b161f93fbc338a7d6617ec6611e777159e9c29&target_code=7559793b6d09580f953a07346705fc54")

## DEMO link ("https://youtu.be/iTnKTPvfPd8")

## Base URL
```
http://localhost:8000
```

## Authentication
Use **Bearer Token** in the `Authorization` header for protected routes.

---

## Endpoints Summary

| Method | Endpoint                     | Description                      | Auth Required |
|--------|------------------------------|----------------------------------|----------------|
| GET    | `/app_users`                 | List all users (public)          | No             |
| GET    | `/api/test`                  | Test API connectivity            | No             |
| GET    | `/api/app_users`            | List users (API)                 | Yes            |
| POST   | `/api/app_users`            | Create a new user                | No / Yes       |
| POST   | `/api/login`                | Login user                       | No             |
| DELETE | `/api/app_users/{id}`       | Delete user by ID                | Yes            |

---

## 📘 Endpoints

### 1. List Users (Public)
**GET** `/app_users`

**Description:** Returns all users (unprotected route).

---

### 2. Test API
**GET** `/api/test`

**Headers:**
- `Accept: application/json`

**Response:**
```json
{
  "message": "API is working"
}
```

---

### 3. List Users (API)
**GET** `/api/app_users`

**Headers:**
- `Accept: application/json`
- `Authorization: Bearer YOUR_TOKEN`

**Description:** Returns authenticated user list.

---

### 4. Create User (Public)
**POST** `/api/app_users`

**Headers:**
- `Accept: application/json`
- `Content-Type: application/json`

**Request Body:**
```json
{
  "name": "Jane Doe",
  "email": "jane53@example.com",
  "password": "password123",
  "gender": "female",
  "age": 32,
  "role": "Organizer"
}
```

**Response:** User data and optional token (depending on setup).

---

### 5. Login
**POST** `/api/login`

**Headers:**
- `Accept: application/json`
- `Content-Type: application/json`

**Request Body:**
```json
{
  "email": "test4@example.com",
  "password": "password4"
}
```

**Response Example:**
```json
{
  "token": "YOUR_BEARER_TOKEN",
  "user": {
    "id": 4,
    "name": "Test User",
    "email": "test4@example.com"
  }
}
```

---

### 6. Create User (Authenticated)
**POST** `/api/app_users`

**Headers:**
- `Accept: application/json`
- `Authorization: Bearer 1|...`
- `Content-Type: application/json`

**Request Body:**
```json
{
  "name": "Jane Doe",
  "email": "jane144@example.com",
  "password": "password123",
  "gender": "female",
  "age": 32,
  "role": "Organizer"
}
```

**Note:** This creates a user from an authenticated session.

---

### 7. Get Authenticated User List
**GET** `/api/app_users`

**Headers:**
- `Accept: application/json`
- `Authorization: Bearer 4|...`
- `Content-Type: application/json`

---

### 8. Delete User by ID
**DELETE** `/api/app_users/{id}`

**Example:** `/api/app_users/12`

**Headers:**
- `Accept: application/json`
- `Content-Type: application/json`

**Body (optional):**
```json
{
  "user": {
    "id_users": 12,
    "name": "Ahmad",
    "email": "ahmad1234@example.com",
    "gender": "Male",
    "age": 20,
    "role": "Organizer"
  }
}
```

**Response:** Confirmation message.

---

## Example Token Usage
```http
Authorization: Bearer 4|uy4zsJZeQxQ50zdoENzX6HI5RkMzSo9MbXDIggQ6245e3806
```

---

## Notes
- Ensure your `.env` file is correctly configured with `SANCTUM` or `PASSPORT` if you're using Laravel's token system.
- You can import this collection into **Postman** or **Thunder Client** to easily test each endpoint.

---
## .env: 
DB_CONNECTION=pgsql
DB_HOST=aws-0-us-west-1.pooler.supabase.com
DB_PORT=5432
DB_DATABASE=postgres
DB_USERNAME=postgres.bwlxqtmcpjgbzxflywpw
DB_PASSWORD=12325336web2

# images:
<img width="1470" alt="Screenshot 2025-06-10 at 6 34 55 AM" src="https://github.com/user-attachments/assets/ff07f68f-5f55-4d93-835d-6a6f7eff0f19" />
<img width="1470" alt="Screenshot 2025-06-10 at 6 41 18 AM" src="https://github.com/user-attachments/assets/e33df1a5-5bd8-4b21-a659-7a0b3281b727" />
<img width="1470" alt="Screenshot 2025-06-10 at 6 41 30 AM" src="https://github.com/user-attachments/assets/967bf358-da6c-49f6-844a-06b62641a922" />
<img width="1470" alt="Screenshot 2025-06-10 at 6 41 51 AM" 
src="https://github.com/user-attachments/assets/98a0d7ef-e2af-440a-ba99-c75e772c41da" />
<img width="1470" alt="Screenshot 2025-06-10 at 6 41 56 AM" src="https://github.com/user-attachments/assets/9f34a6ea-cbc5-47ed-a897-a54919fa318a" />
<img width="1470" alt="Screenshot 2025-06-10 at 6 50 47 AM" src="https://github.com/user-attachments/assets/714dbacd-0494-4461-b8f1-0c956ad3b95a" />
<img width="1470" alt="Screenshot 2025-06-10 at 6 50 56 AM" src="https://github.com/user-attachments/assets/9ef1cfca-ef4d-434a-b5ae-d9e4f01bb0dc" />
<img width="1470" alt="Screenshot 2025-06-10 at 6 51 16 AM" src="https://github.com/user-attachments/assets/6967cc36-423a-4540-8af9-4635cb750451" />



