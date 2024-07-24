<?php
require_once 'models/Entry.php';

class EntryController {
    private $model;

    public function __construct() {
        session_start();
        $this->model = new Entry();
    }

    public function index() {
        $message = null;
        if (isset($_SESSION['message'])) {
            $message = $_SESSION['message'];
            unset($_SESSION['message']);
        }
        $entries = $this->model->getAllEntries();
        require 'views/index.php';
    }

    public function create($title, $description) {
        $entry = new Entry();
        $entry->createEntry($title, $description);

        $_SESSION['message'] = 'News was successfully created!';

        header('Location: index.php');
        exit();
    }

    // TODO: methods for updating, and deleting entries
}