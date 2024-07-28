# Recruitment task for **cgrd**

## How to run the application

### Prerequisites
1. **PHP 8.3**
2. **MySQL**

### Setting up the database

#### Create a database

First, create a database named `cgrd_task`. You can do this by connecting to your MySQL server and running the following SQL command:

```sql
CREATE DATABASE cgrd_task;
```

#### Configure database connection

Ensure that the database connection details (host name, database name, username, and password) are correctly configured in the file database/Database.php. Note that normally, this configuration should be placed in a separate file that is not tracked by version control (e.g., in a .gitignore file) to protect sensitive information.


#### Create tables

Execute the following SQL queries to create the `users` and `entries` tables:

```sql
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE entries (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    description TEXT
);
```

### Starting the servers

Start your MySQL server. Then, start a web server to serve the PHP application. If you're using a built-in PHP server, navigate to the root directory of your project and run:

```bash
php -S localhost:8000
```

Once the server is running, you can access the application in your web browser at http://localhost:8000.

### Creating admin user

To create an admin user, run the provided add_admin_user.php script. Navigate to your project's directory and execute the following command:

```bash
php add_admin_user.php
```

## Task description:
Build a website with a login. The login should only be successful with the login data admin/test. Afterwards you should see an admin area where you can create, change or delete a news article. The news entries should be stored in a database. The change function should write the data live via javascript into the create form. All functions should be provided with a success or error message.

Screenshots and images/icons for this task are attached to the mail.

Here is an preview of this task: https://www.loom.com/share/65f7533740024aafb1e5fc9ad1e16379

What can be used?
- PHP
- SQL (Database)
- Vanilla JS (Nativ Javascript) 
- jQuery (https://api.jquery.com/) 
- HTML 
- CSS 

What should not be used?
- No other Javascript libraries
- No HTML and/or CSS Frameworks (eg. Bootstrap)
- No CSS preprocessor (eg. Sass)
