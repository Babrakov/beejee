<?php

require dirname(__DIR__) . '/vendor/autoload.php';
session_start();
new Core\Database();

$router = new Core\Router();

$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('login', ['controller' => 'Home', 'action' => 'login']);
$router->add('auth', ['controller' => 'Home', 'action' => 'auth']);
$router->add('logout', ['controller' => 'Home', 'action' => 'logout']);

$router->add('tasks', ['controller' => 'Tasks', 'action' => 'index']);
$router->add('tasks/create', ['controller' => 'Tasks', 'action' => 'create']);
$router->add('tasks/edit', ['controller' => 'Tasks', 'action' => 'edit']);
$router->add('tasks/store', ['controller' => 'Tasks', 'action' => 'store']);
$router->add('tasks/update', ['controller' => 'Tasks', 'action' => 'update']);

$router->dispatch($_SERVER['QUERY_STRING']);
