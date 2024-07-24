<?php
require_once 'controllers/EntryController.php';

$controller = new EntryController();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $controller->create($title, $description);
}

$controller->index();