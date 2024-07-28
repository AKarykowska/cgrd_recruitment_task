<?php

class Entry 
{
    public int|null $id;
    public string $title;
    public string $description;

    public function __construct(int|null $id, string $title, string $description) 
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
    }
}