<?php

class User 
{
    public int|null $id;
    public string $username;
    public string $password;

    public function __construct(int|null $id, string $username, string $password) 
    {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
    }
}