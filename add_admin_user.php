<?php
require_once 'models/User.php';

$user = new User();
$user->createUser('admin', 'test');