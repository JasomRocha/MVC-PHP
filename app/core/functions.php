<?php 
namespace App\Core;
function dd(...$vars){
    echo '<pre style="background-color: #f5f5f5;
    color: #212529;
    padding: 10px;
    marging: 10px;
    border-radius: 5px;
    font-family: monospace;">';
    echo "<strong> Debug Output: </strong><br>";
    foreach ($vars as $var){
         echo '<pre style="background-color: #d1d1d1;
    color: #212529;
    padding: 10px;
    marging: 10px;
    border-radius: 5px;
    font-family: monospace;">';
        var_dump($var);
        echo'</pre>';
    }
    $backtrace = debug_backtrace()[0];

    echo '<br><br><strong> Arquivo: </strong>' . $backtrace['file'] . '<br>';
        echo '<br><br><strong> Linha: </strong>' . $backtrace['line'] . '<br>';
    echo'</pre>';
    die();
}

function config($key, $default = null){
    $config = require_once __DIR__ . '/../config/config.php';
    return $config[$key] ?? $default;
}