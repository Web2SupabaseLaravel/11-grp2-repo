# Users API

## Overview
Endpoints related to user management, including creating, reading, updating, and deleting users.

## Base URL
```
http://localhost:8000/api
```

---

## Get All Users

**GET** `/app-users`

### Headers
| Name  | Required | Description             |
|-------|----------|-------------------------|
| Accept | Yes     | Must be `application/json` |

### Query Parameters
| Name    | Type    | Required | Description                    |
|---------|---------|----------|--------------------------------|
| page    | integer | No       | Page number for pagination     |
| per_page| integer | No       | Number of users per page       |

### Example Request
```
GET /app-users?page=1&per_page=5
```

### Example Response
```json
{
  "data": [
    {
      "id": 1,
      "name": "Ahmad",
      "email": "ahmad1234@example.com",
      "gender": "Male",
      "age": 20,
      "role": "Organizer"
    }
  ],
  "meta": {
    "current_page": 1,
    "last_page": 1,
    "per_page": 5,
    "total": 1
  }
}
```

---

## Create User

**POST** `/app-users`

### Headers
| Name  | Required | Description             |
|-------|----------|-------------------------|
| Accept | Yes     | Must be `application/json` |

### Request Body
| Parameter | Type    | Required | Description            |
|-----------|---------|----------|------------------------|
| name      | string  | Yes      | Full name of the user  |
| email     | string  | Yes      | Must be unique         |
| password  | string  | Yes      | At least 8 characters  |
| gender    | string  | Yes      | Male/Female            |
| age       | integer | Yes      | Age of the user        |
| role      | string  | Yes      | User's role            |

### Example Request
```json
{
  "name": "Ahmad",
  "email": "ahmad1234@example.com",
  "password": "password1234",
  "gender": "Male",
  "age": 20,
  "role": "Organizer"
}
```

### Success Response
**Status Code**: 201 Created  
```json
{
  "message": "User created successfully",
  "user": {
    "id": 12,
    "name": "Ahmad",
    "email": "ahmad1234@example.com",
    "gender": "Male",
    "age": 20,
    "role": "Organizer"
  }
}
```

---

## Update User

**PUT** `/app-users/{id}`

### Example Endpoint
```
PUT /app-users/12
```

### Headers
Same as Create User.

### Request Body
Same as Create User.

### Example Response
```json
{
  "message": "User updated successfully",
  "user": {
    "id": 12,
    "name": "Ahmad",
    "email": "ahmad1234@example.com",
    "gender": "Male",
    "age": 20,
    "role": "Organizer"
  }
}
```

---

## Delete User

**DELETE** `/app-users/{id}`

### Example Endpoint
```
DELETE /app-users/7
```

### Headers
Same as Create User.

### Example Response
```json
{
  "message": "User deleted successfully"
}
```

---

## Error Responses

### Validation Error (422)
```json
{
  "message": "The given data was invalid.",
  "errors": {
    "email": ["The email has already been taken."],
    "password": ["The password must be at least 8 characters."]
  }
}
```

### Server Error (500)
```json
{
  "message": "Server error occurred",
  "error": "Internal server error"
}
```
