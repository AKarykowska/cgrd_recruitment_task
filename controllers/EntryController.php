<?php
require_once 'models/Entry.php';

class EntryController {
    private $model;

    public function __construct() {
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
        $this->model->createEntry($title, $description);

        $_SESSION['message'] = 'News was successfully created!';

        header('Location: index.php');
        exit();
    }

    public function delete($id) {
        $this->model->deleteEntry($id);
    
        $_SESSION['message'] = 'News was deleted!';
    
        header('Location: index.php');
        exit();
    }

    public function update($title, $description, $id) {
        $this->model->updateEntry($id, $title, $description);

        $_SESSION['message'] = "News was successfully changed!";

        header('Location: index.php');
        exit();
    }
}