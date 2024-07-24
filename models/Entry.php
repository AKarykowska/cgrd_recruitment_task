<?php
require_once 'database/Database.php';

class Entry {
    private $db;

    public function __construct() {
        global $db;
        $this->db = $db;
    }

    public function getAllEntries() {
        $query = "SELECT * FROM entries";
        $stmt = $this->db->executeStatement($query);
        return $stmt->fetchAll();
    }

    public function createEntry($title, $description) {
        $query = "INSERT INTO entries (title, description) VALUES (:title, :description)";
        $parameters = [
            ':title' => $title,
            ':description' => $description
        ];
        $this->db->executeStatement($query, $parameters);
    }

    // TODO: methods for creating, updating, and deleting entries
}