<?php
require_once '../config/database.php';
require_once '../models/user.php';

class LoginController {
    private $db;
    private $user;

    public function __construct() {
        $this->db = getConnection();
        $this->user = new User($this->db);
    }

    public function showLoginForm() {
        include '../views/login.php';
    }

    public function processLogin() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $userData = $this->user->findByUsername($username);

            if ($userData && $this->user->validatePassword($password, $userData['password'])) {
                // Start session and set user data
                session_start();
                $_SESSION['user_id'] = $userData['id'];
                $_SESSION['username'] = $userData['username'];
                header("Location: ../../../../index.html"); // Redirect to dashboard
            } else {
                echo "Invalid username or password.";
            }
        }
    }
}
?>