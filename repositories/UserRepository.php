<?php

require_once 'database/Database.php';
require_once 'models/User.php';

class UserRepository
{
    public function getByUsername(string $username): User|null
    {
        global $db;
        $query = "SELECT * FROM users WHERE username = :username";
        $parameters = [':username' => $username];
        $stmt = $db->executeStatement($query, $parameters);
        $row = $stmt->fetch();

        if (!$row) {
            return null;
        }

        return new User($row['id'], $row['username'], $row['password']);
    }

    public function save(User $user): void
    {
        global $db;
        $hashedPassword = password_hash($user->password, PASSWORD_DEFAULT);
        $query = "INSERT INTO users (username, password) VALUES (:username, :password)";
        $parameters = [
            ':username' => $user->username,
            ':password' => $hashedPassword,
        ];
        $db->executeStatement($query, $parameters);
        $user->id = $db->getLastInsertId();
    }
}