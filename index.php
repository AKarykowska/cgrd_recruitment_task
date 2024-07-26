<?php
require_once 'controllers/EntryController.php';

$controller = new EntryController();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $controller->create($title, $description);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) {
    $id = $_POST['delete'];
    $controller->delete($id);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $id = $_POST['id'];
    $controller->update($title, $description, $id);
}

$controller->index();