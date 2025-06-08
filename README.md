# 11-grp2-repo-TASBEEH BRANCH
## DEMO link ("https://youtu.be/iTnKTPvfPd8")
- my task : app users table(CRUD) : for now, create, store, index 
- update : api doc, testing via postman, full CRUD : done
- .env :
DB_CONNECTION=pgsql
DB_HOST=aws-0-us-west-1.pooler.supabase.com
DB_PORT=5432
DB_DATABASE=postgres
DB_USERNAME=postgres.bwlxqtmcpjgbzxflywpw
DB_PASSWORD=12325336web2

<img width="1470" alt="Screenshot 2025-06-04 at 3 24 13 PM" src="https://github.com/user-attachments/assets/10013a0a-3631-45d4-add2-298cf194f2ad" />
<img width="1470" alt="Screenshot 2025-06-04 at 3 24 31 PM" src="https://github.com/user-attachments/assets/8e26d089-7f24-467b-884f-ae36f60200c9" />
<img width="1470" alt="Screenshot 2025-06-04 at 3 26 02 PM" src="https://github.com/user-attachments/assets/99bf72ad-50bf-45a7-a3db-912c45633cb3" />
<img width="1470" alt="Screenshot 2025-06-04 at 3 26 20 PM" src="https://github.com/user-attachments/assets/73b3624d-9294-42f2-a41d-815615c919ce" />

--------------------------------------------------------------
# My Laravel Supabase API Documentation

## Overview
This is the API documentation for the Laravel application connected to Supabase as the database. It provides endpoints for managing users and follows RESTful principles.

## Base URL
```
http://localhost:8000/api
```

## Authentication
This API uses Bearer Token authentication. Include the token in the header:
```
Authorization: Bearer your_token_here
```

## Rate Limiting
No rate limiting is currently applied.

## Error Handling
The API uses standard HTTP status codes to indicate success or failure:
- `200 OK`: The request was successful.
- `201 Created`: The resource was created successfully.
- `401 Unauthorized`: Authentication is required.
- `422 Unprocessable Entity`: Validation errors.
- `500 Internal Server Error`: An error occurred on the server.

## Available Resources
- [Users](./appusers.md)

## Status Codes

| Code | Description             |
|------|-------------------------|
| 200  | Success                 |
| 201  | Created                 |
| 401  | Unauthorized            |
| 422  | Validation Error        |
| 500  | Internal Server Error   |

---

# Importing the API Collection

## Postman (used in this testing)
1. Open Postman.
2. Click "Import" in the top left.
3. Drag and drop the `My Laravel Supabase API.postman_collection.json` file.
4. Click "Import".

---

# Reflection

### Importance of API Documentation
API documentation ensures that developers understand how to interact with the system. It increases maintainability, onboarding speed, and reduces integration issues.

### Challenges Faced
- Structuring endpoint details concisely yet informatively.
- Ensuring consistency between actual API responses and documentation.
- Organizing Postman collection and variable environments.

### Value to Future Developers
This documentation provides all necessary request details, examples, and error handling scenarios. Future developers can onboard quickly and avoid guesswork while integrating or extending the API.
