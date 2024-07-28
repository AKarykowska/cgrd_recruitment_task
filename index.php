<?php
require_once 'controllers/EntryController.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once 'controllers/UserController.php';

$entryController = new EntryController();
$userController = new UserController();

if (!$userController->isLoggedIn()) {
    header('Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['logout'])) {
    $userController->logout();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $entryController->create($title, $description);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) {
    $id = $_POST['delete'];
    $entryController->delete($id);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $id = $_POST['id'];
    $entryController->update($title, $description, $id);
}

$entryController->index();