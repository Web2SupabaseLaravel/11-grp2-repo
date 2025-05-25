# 🎟️ Laravel-qusai – Event Registration Management System

Welcome to **Laravel-qusai**, a modern Laravel application for managing event registrations with a simple, elegant, and professional interface.  
This system allows users to register for events by providing key details like User ID, Event ID, status, and the exact registration date and time.

---

## 🎯 Purpose

This project was built to:

- ✅ Simplify the process of registering users to events
- ✅ Ensure accurate data validation
- ✅ Maintain clean relationships between users and events
- ✅ Offer a smooth and user-friendly interface

---

## ⚙️ Tech Stack

- ⚡ **Laravel 12** – PHP web framework  
- 🎨 **Blade** – Laravel’s templating engine  
- 🐘 **PostgreSQL (via Supabase)** – Cloud database  
- 💻 **HTML & CSS** – Custom styled registration form  

---

## 🧾 Features

- 🆔 Choose existing User and Event IDs  
- 📅 Set an exact registration datetime (`YYYY-MM-DDTHH:MM`)  
- 🔄 Select registration status:  
  - Confirmed  
  - Cancelled  
  - Transferred  
- 🧠 Validates data before inserting  
- 💾 Saves to Supabase-backed PostgreSQL database  
- 🎨 Fully styled with a responsive and elegant form design  
---
Picture
---
http://127.0.0.1:8000/registration/create 

![image](https://github.com/user-attachments/assets/8e494367-d188-4ea2-9c91-a6495f3a5ed7)
------------------------------------------------------------------------------------------
http://127.0.0.1:8000/registration
![image](https://github.com/user-attachments/assets/3e452242-422f-4b23-89dd-8a9cdbb9c646)

------------------------------------------------------------------------------------------
![image](https://github.com/user-attachments/assets/d63f05d6-c19b-4e40-a175-0eda0fc4b695)




## ✨
API Documentation: https://documenter.getpostman.com/view/45167747/2sB2qcCLsC


.env:
-----
DB_CONNECTION=pgsql
DB_HOST=aws-0-us-west-1.pooler.supabase.com
DB_PORT=5432
DB_DATABASE=postgres
DB_USERNAME=postgres.bwlxqtmcpjgbzxflywpw
DB_PASSWORD=12325336web2

Made with ❤️ by **Qusai Hamed** – Branch: `qusai-final-submission`


