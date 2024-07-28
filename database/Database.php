<?php

class Database
{
    private $connection = null;

    /**
     * Establishes a connection to the database using PDO. Parameters as supported by PDO.
     * 
     * @throws PDOException if cannot connect to the database.
     */
    public function __construct($dbhost = "", $dbname = "", $username = "", $password = "")
    {
        $this->connection = new PDO("mysql:host={$dbhost};dbname={$dbname};charset=utf8mb4;", $username, $password);
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }

    /**
     * Executes a database statement using PDO.
     * 
     * @param $statement string The SQL statement to execute in a PDO-supported format.
     * @param $parameters array An associative array of parameters to bind to the query.
     * 
     * @throws PDOException
     */
    public function executeStatement($statement = "", $parameters = []): PDOStatement|false
    {
        $stmt = $this->connection->prepare($statement);
        $stmt->execute($parameters);
        return $stmt;
    }

    /**
     * Returns the last inserted ID from the database.
     * 
     * @return string
     */
    public function getLastInsertId(): string
    {
        return $this->connection->lastInsertId();
    }
}

$db = new Database(
    "127.0.0.1", // host name
    "cgrd_task",  // database name
    "root",      // username
    ""           // password
);