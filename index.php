<?php

require_once 'router.php';


$router = new Router();

session_start();

$router->get('/','view');

$router->post('/store','create');

$router->post('/edit','edit');

$router->get('/list','list');

$router->put('/update','update');

$router->delete('/delete','delete');

$router->routes($_SERVER['REQUEST_URI'],$_SERVER['REQUEST_METHOD']);