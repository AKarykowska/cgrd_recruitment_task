<?php

require_once 'models/Entry.php';
require_once 'repositories/EntryRepository.php';

class EntryController 
{
    private $repository;

    public function __construct() 
    {
        $this->repository = new EntryRepository();
    }

    public function index(): void
    {
        $message = null;
        if (isset($_SESSION['message'])) {
            $message = $_SESSION['message'];
            unset($_SESSION['message']);
        }
        $entries = $this->repository->getAll();
        require 'views/index.php';
    }

    public function create(string $title, string $description): void
    {
        $entry = new Entry(null, $title, $description);
        $this->repository->save($entry);

        $_SESSION['message'] = 'News was successfully created!';

        header('Location: index.php');
        exit();
    }

    public function delete(int $id): void
    {
        $entry = $this->repository->get($id);
        $this->repository->delete($entry);
    
        $_SESSION['message'] = 'News was deleted!';
    
        header('Location: index.php');
        exit();
    }

    public function update(int $id, string $title, string $description): void
    {
        $entry = $this->repository->get($id);
        $entry->title = $title;
        $entry->description = $description;
        $this->repository->save($entry);

        $_SESSION['message'] = "News was successfully changed!";

        header('Location: index.php');
        exit();
    }
}