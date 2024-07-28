<?php

require_once 'database/Database.php';
require_once 'models/Entry.php';

class EntryRepository
{
    public function get(int $id): Entry
    {
        global $db;
        $query = "SELECT * FROM entries WHERE id = :id";
        $parameters = [':id' => $id];
        $stmt = $db->executeStatement($query, $parameters);
        $row = $stmt->fetch();
        return new Entry($row['id'], $row['title'], $row['description']);
    }

    public function getAll(): array
    {
        global $db;
        $query = "SELECT * FROM entries";
        $stmt = $db->executeStatement($query);
        
        $entries = [];
        while ($row = $stmt->fetch()) {
            $entry = new Entry($row['id'], $row['title'], $row['description']);
            $entries[] = $entry;
        }

        return $entries;
    }

    public function save(Entry $entry): void
    {
        if ($entry->id) {
            $this->update($entry);
        } else {
            $this->insert($entry);
        }
    }

    public function delete(Entry $entry): void
    {
        global $db;
        $query = "DELETE FROM entries WHERE id = :id";
        $parameters = [':id' => $entry->id];
        $db->executeStatement($query, $parameters);
    }

    private function insert(Entry $entry): void
    {
        global $db;
        $query = "INSERT INTO entries (title, description) VALUES (:title, :description)";
        $parameters = [
            ':title' => $entry->title,
            ':description' => $entry->description,
        ];
        $db->executeStatement($query, $parameters);
        $entry->id = $db->getLastInsertId();
    }

    private function update(Entry $entry): void
    {
        global $db;
        $query = "UPDATE entries SET title = :title, description = :description WHERE id = :id";
        $parameters = [
            ':title' => $entry->title,
            ':description' => $entry->description,
            ':id' => $entry->id,
        ];
        $db->executeStatement($query, $parameters);
    }
}