
__Introduction__  
Todo App is a simple task management application built with Laravel and MySQL. It allows users to create, update, and delete tasks, as well as track their progress. Follow the steps below to set up and run the project.

## REQUIREMENTS
------------

The minimum requirement for this project:

- PHP: Minimum version 8.2
- Composer: Installed on your system
- Database: MySQL or a compatible database system

### Installations Steps

Clone the project repository from your version control system:

```bash
git clone https://github.com/azakarneh1/todo-app.git
cd todo-app


### Installations Steps

Clone the project repository from your version control system:

```bash
git clone https://github.com/azakarneh1/todo-app.git
cd todo-app
~~~


### Install Dependencies
~~~
composer install
~~~

### Database Configuration

~~~
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=todo_app
DB_USERNAME=root
DB_PASSWORD=
~~~


### Run Database Migrations
~~~
php artisan migrate
~~~

### Start the Application
~~~
php artisan serve
~~~
### Important Seeder Step
Before running the application, ensure you have seeded the database with the default admin user. This can be done by running the following command:
```bash
php artisan db:seed --class=AdminUserSeeder


## API Endpoints
The Todo App provides the following API endpoints for managing tasks:
API Endpoints
Authentication
Login

Endpoint: POST /api/v1/login
Description: Logs the user in and returns a token.
Request Example:
{
  "email": "user@example.com",
  "password": "yourpassword"
}

Response Example:
{
    "status": "success",
    "data": {
        "profile": {
            "id": 7,
            "name": "hamza6",
            "email": "hamza@mail.com",
            "role": "user"
        },
        "access_token": "access_token"
    }
}

Logout

Endpoint: POST /api/v1/logout
Method: POST
Description: Logs the user out and invalidates the token.
Authentication Required: Yes (Token must be included in the request header)


Task Management (Requires Authentication)
Get All Tasks

Endpoint: GET /api/v1/tasks
Description: Retrieves a list of all tasks for the authenticated user.
Response Example:
json
Copy
Edit
{
  "tasks": [
    {
      "id": 1,
      "text": "Task 1",
      "description": "Task description here",
      "status": "pending"
    },
    {
      "id": 2,
      "text": "Task 2",
      "description": "Another task",
      "status": "completed"
    }
  ]
}
Add a Task

Endpoint: POST /api/v1/add-task
Description: Creates a new task.
Request Example:
json
Copy
Edit
{
  "title": "New Task",
  "text": "Task description here",
  "status": "pending"
}
Response Example:
json
Copy
Edit
{
  "task": {
    "id": 3,
    "text": "New Task",
    "description": "Task description here",
    "status": "pending"
  }
}
Update a Task

Endpoint: PUT /api/v1/update-task
Description: Updates an existing task.
Request Example:
json
Copy
Edit
{
  "id": 1,
  "text": "Updated Task",
  "description": "Updated description",
  "status": "completed"
}
Response Example:
json
Copy
Edit
{
  "task": {
    "id": 1,
    "text": "Updated Task",
    "description": "Updated description",
    "status": "completed"
  }
}
Delete a Task

Endpoint: DELETE /api/v1/delete-task/{id}
Description: Deletes a task by its ID.
Response Example:
json
Copy
Edit
{
  "message": "Task deleted successfully."
}

---


---
## Notes About the App

The Todo App API is built with several key features and technologies that ensure smooth and efficient task management. Below are the features included in this API:

### Features Used:
- **Laravel Sanctum**: Provides simple token-based authentication for API requests, allowing users to log in and perform actions securely.
- **CRUD Operations**: Full CRUD functionality for tasks, allowing users to create, read, update, and delete tasks.
- **API Versioning**: The API follows a versioning structure (`/api/v1/`) to ensure backward compatibility and easy future updates.
- **Middleware**: Utilizes Laravel's built-in `auth:sanctum` middleware to secure routes that require authentication.
- **Route Grouping**: Grouped routes under a versioned API prefix to organize endpoints logically and make the app scalable.
- **Observer**: Uses Eloquent Observers to handle model events such as creating, updating, and deleting tasks, ensuring code is more organized and maintainable.
- **Scopes**: Used query scopes in the `Task` model to encapsulate common query logic, making the code more readable and reusable.
- **Global Scopes**: Applied global scopes to automatically filter tasks based on user-specific data (e.g., show only the authenticated user's tasks).
- **Emails**: Sends task-related notifications to users through Laravel’s email system, allowing the app to communicate important updates to users.
- **Real-Time Notifications**: Integrated real-time notifications using **Laravel Echo** and **Pusher** to notify users of updates to tasks without needing to refresh the page.
- **Reverb ORM**: Implemented **Reverb ORM** models for efficient querying and handling relationships, ensuring optimized performance and easy data management.
- **Pagination**: Added pagination to task lists to limit the number of tasks displayed per page, improving performance and user experience for large datasets.
- **Caching**: Implemented caching strategies to store frequently accessed data in memory, reducing database load and improving the app’s responsiveness.
- **Livewire 3**: Integrated **Livewire 3** for building dynamic, reactive interfaces, enabling users to interact with tasks without requiring a full page reload.
- **Laravel 11**: The app is built on **Laravel 11**, utilizing its newest features and improvements for better performance and functionality.
- **Seeders**: Added seeders to populate the database with initial data, enabling easy testing and development without the need to manually add entries.
- **Filters**: Implemented filters for tasks, allowing users to query tasks by specific criteria such as status, priority, or due date.
- **Migrations**: Used **Laravel Migrations** to create and modify the database schema, ensuring that database structure changes are version-controlled and easily reproducible.

### Key Features:
1. **User Authentication**: Users can log in and out using Laravel Sanctum.
2. **Task Management**: Tasks can be created, updated, deleted, and listed. Each task is tied to a specific user.
3. **Real-Time Task Notifications**: Users receive real-time notifications when tasks are updated or modified.
4. **Filters and Search**: Users can filter tasks by their status, priority, or due date.
5. **Database Seeding**: Automatic seeding of default data like tasks, users, and categories for easier development and testing.

---

## Enhancements & Future Plans
- **Task Prioritization**: Add functionality to prioritize tasks (e.g., high, medium, low priority) to help users focus on important tasks.
- **Due Date Notifications**: Implement reminders for tasks with due dates, allowing users to receive notifications before the task's deadline.
- **Task Categories**: Add functionality
- **Traits usage

