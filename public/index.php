<?php

require_once __DIR__ . '/../app/core/Router.php'; // Usa caminho absoluto
require_once __DIR__ .'/../vendor/autoload.php';


$url = $_GET['url'] ?? '';

$router = new Router();
$router->dispatch($url);
