<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once 'controllers/UserController.php';

$userController = new UserController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $userController->login($username, $password);
}

$userController->showLogin();