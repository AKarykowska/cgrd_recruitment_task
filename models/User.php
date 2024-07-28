<?php
require_once 'database/Database.php';

class User {
    private $db;

    public function __construct() {
        global $db;
        $this->db = $db;
    }

    public function createUser($username, $password) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO users (username, password) VALUES (:username, :password)";
        $parameters = [
            ':username' => $username,
            ':password' => $hashedPassword
        ];
        $this->db->executeStatement($query, $parameters);
    }

    public function verifyPassword($username, $password) {
        $query = "SELECT password FROM users WHERE username = :username";
        $parameters = [ ':username' => $username ];
        $stmt = $this->db->executeStatement($query, $parameters);
        $user = $stmt->fetch();

        if ($user) {
            return password_verify($password, $user['password']);
        }

        return false;
    }
}