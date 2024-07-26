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

    public function deleteEntry($id) {
        $query = "DELETE FROM entries WHERE id = :id";
        $parameters = [ ':id' => $id ];
        $this->db->executeStatement($query, $parameters);
    }

    public function updateEntry($id, $title, $description)
    {
        $query = "UPDATE entries SET title = :title, description = :description WHERE id = :id";
        $parameters = [
            ':title' => $title,
            ':description' => $description,
            ':id' => $id
        ];
        $this->db->executeStatement($query, $parameters);
    }
}