<?php

require_once __DIR__ . '/../app/core/Router.php'; // Usa caminho absoluto


$url = $_GET['url'] ?? '';

$router = new Router();
$router->dispatch($url);
