# Ticket-Management

# Ticket Management System

## Technology Stack

- PHP 8.x
- Laravel 10
- MySQL
- Laravel Sanctum

---

### Move to Project Folder

```bash
cd ticket-management
```

### Install Dependencies

```bash
composer install
```

### Create Environment File

```bash
copy .env.example .env
```

### Generate Application Key

```bash
php artisan key:generate
```

### Configure Database

Update `.env`

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ticket_management
DB_USERNAME=root
DB_PASSWORD=
```

### Run Migration & Seeder

```bash
php artisan migrate --seed
```

### Start Server

```bash
php artisan serve
```

---

## Admin Credentials

Email: admin@test.com

Password: password123


---

## Features

### Admin

- Dashboard
- Staff Management
- Task Management
- Create Tasks
- Assign Tasks
- Search Tasks
- Pagination
- Soft Delete Staff

### Staff

- Login
- View Assigned Tasks
- Update Task Status

---
# Screenshot
###login
-----------------
<img width="767" height="477" alt="image" src="https://github.com/user-attachments/assets/9b0de0a9-95a9-40c4-a956-c9e4714da9c0" />

### admin dashboard
--------------------
<img width="1915" height="832" alt="image" src="https://github.com/user-attachments/assets/b80c2611-7fb0-4e11-bf50-ce36d69e853c" />

### staff dashboard
-------------------
<img width="1912" height="695" alt="image" src="https://github.com/user-attachments/assets/d5dd7601-40ac-494e-9093-a7d43b8b9387" />

### create task
--------------------
<img width="1902" height="917" alt="image" src="https://github.com/user-attachments/assets/b4b39359-f71a-4dd2-9a2a-863b05810fbf" />


## Author
Arya M
Laravel Developer

Arya M
Laravel Developer
