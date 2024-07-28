<?php

require_once 'models/User.php';
require_once 'repositories/UserRepository.php';

$user = new User(null, 'admin', 'test');

$repository = new UserRepository();
$repository->save($user);