<?php

require_once 'models/User.php';
require_once 'repositories/UserRepository.php';

class UserController 
{
    private $repository;

    public function __construct() 
    {
        $this->repository = new UserRepository();
    }

    public function login(string $username, string $password): void
    {
        $user = $this->repository->getByUsername($username);
        if ($user && password_verify($password, $user->password)) {
            $_SESSION['username'] = $username;
            header('Location: index.php');
            exit();
        }

        $_SESSION['message'] = 'Wrong Login Data!';
        
        header('Location: login.php');
        exit();
    }

    public function logout(): void
    {
        session_destroy();
        header('Location: login.php');
        exit();
    }

    public function isLoggedIn(): bool
    {
        return isset($_SESSION['username']);
    }

    public function showLogin(): void
    {
        $message = null;
        if (isset($_SESSION['message'])) {
            $message = $_SESSION['message'];
            unset($_SESSION['message']);
        }

        require 'views/login.php';
    }
}