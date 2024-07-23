<?php
require_once 'models/Entry.php';

class EntryController {
    private $model;

    public function __construct() {
        $this->model = new Entry();
    }

    public function index() {
        $entries = $this->model->getAllEntries();
        require 'views/index.php';
    }

    // TODO: methods for creating, updating, and deleting entries
}