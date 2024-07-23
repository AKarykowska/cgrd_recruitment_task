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

    // TODO: methods for creating, updating, and deleting entries
}