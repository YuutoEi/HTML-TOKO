<?php
require_once 'src/config/database.php';
require_once 'src/controllers/loginController.php';

$loginController = new LoginController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $loginController->processLogin();
} else {
    $loginController->showLoginForm();
}
?>