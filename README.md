# Laravel Todos API

A simple Laravel API for managing todos.

## 📋 Features

- ✅ User registration and login with bearer token authentication
- ✅ Full CRUD operations (Create, Read, Update, Delete) for todos
- 🔐 Secure access to todos via token-based API authentication
- ⚡ Lightweight and extendable Laravel structure
- 🧪 PHPUnit test coverage for core features
- 🧰 Includes Postman collection for testing
- 📦 Powered by Laravel 9 and follows best practices

## 🔌 API Endpoints

- Authentication is required for all todo-related endpoints.
- Use the `/api/auth/register` and `/api/auth/login` endpoints to obtain a bearer token.
- Include the token in the `Authorization` header using the Bearer scheme: `Authorization: Bearer <TOKEN>`.

- `POST /api/auth/register` - Register a new user
- `POST /api/auth/login` - Login and receive a bearer token
- `GET /api/todos` - Get all todos (requires authentication)
- `GET /api/todos/{id}` - Get a specific todo (requires authentication)
- `POST /api/todos` - Create a new todo (requires authentication)
- `PATCH /api/todos/{id}` - Update an existing todo (requires authentication)
- `DELETE /api/todos/{id}` - Delete a todo (requires authentication)

## 🛠 Installation

```bash
git clone https://github.com/yourusername/laravel-todos-api.git
cd laravel-todos-api
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
```
