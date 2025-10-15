<?php

namespace App\Core;
use Exception;
// Controlador pai, classe que já trata os caminhos para as views
class Controller{
    protected function view($view, $viewData = []){
        $viewFile = __DIR__ . '/../views/' . $view . '.php';
        extract($viewData);
        if(!file_exists($viewFile)){
            throw new Exception('View não encontrada');
        }
        require_once $viewFile;
    }
}