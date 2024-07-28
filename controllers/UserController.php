<?php
require_once 'models/User.php';

class UserController {
    private $model;

    public function __construct() {
        $this->model = new User();
    }

    public function login($username, $password) {
        if ($this->model->verifyPassword($username, $password)) {
            $_SESSION['username'] = $username;
            header('Location: index.php');
            exit();
        }

        $_SESSION['message'] = 'Wrong Login Data!';
        header('Location: login.php');
        exit();
    }

    public function logout() {
        session_destroy();
        header('Location: login.php');
        exit();
    }

    public function isLoggedIn() {
        return isset($_SESSION['username']);
    }

    public function showLogin() {
        $message = null;
        if (isset($_SESSION['message'])) {
            $message = $_SESSION['message'];
            unset($_SESSION['message']);
        }

        require 'views/login.php';
    }
}