# PHP Login System

This project is a simple PHP login system that demonstrates user authentication using a MySQL database. It utilizes the MVC (Model-View-Controller) architecture for better organization and separation of concerns.

## Project Structure

```
php-login-system
├── src
│   ├── config
│   │   └── database.php        # Database connection settings
│   ├── controllers
│   │   └── loginController.php  # Handles login logic
│   ├── views
│   │   ├── login.php            # Login form view
│   │   └── style.css            # CSS styles for the login page
│   └── models
│       └── user.php             # User model for database interactions
├── index.php                    # Entry point for the application
└── README.md                    # Project documentation
```

## Setup Instructions

1. **Clone the repository**:
   ```
   git clone <repository-url>
   cd php-login-system
   ```

2. **Create a database**:
   Create a MySQL database for the application. You can name it `php_login_system`.

3. **Configure database connection**:
   Open `src/config/database.php` and update the database connection settings with your database credentials.

4. **Create the users table**:
   Run the following SQL command to create a `users` table:
   ```sql
   CREATE TABLE users (
       id INT AUTO_INCREMENT PRIMARY KEY,
       username VARCHAR(50) NOT NULL UNIQUE,
       password VARCHAR(255) NOT NULL
   );
   ```

5. **Add a user**:
   Insert a user into the `users` table for testing:
   ```sql
   INSERT INTO users (username, password) VALUES ('testuser', 'password123');
   ```

6. **Run the application**:
   Open your web server and navigate to `http://localhost/php-login-system/index.php` to access the login page.

## Usage Guidelines

- Enter your username and password in the login form.
- The application will validate the credentials against the database.
- If the login is successful, you will be redirected to a welcome page (to be implemented).
- If the login fails, an error message will be displayed.

## Contributing

Feel free to fork the repository and submit pull requests for any improvements or features you would like to add.