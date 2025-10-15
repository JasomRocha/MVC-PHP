<?php
// Pegando parametros da URL e definindo qual o controlador que será chamado

require_once __DIR__ . '/../controllers/HomeController.php';
require_once __DIR__ . '/../controllers/NoticiasController.php';
require_once __DIR__ . '/../controllers/NotFoundController.php';
class Router {
    public function dispatch($url) {
       $url = trim($url, '/');
       $parts =$url ? explode('/', $url) : [];

       $controllerName = $parts[0] ?? 'Home'; // Se nao vier nada no queryParam coloca Home
       $controllerName = ucfirst($controllerName) . 'Controller'; // Concatena com Controller
       
       if(class_exists($controllerName)){
            $controller = new $controllerName();
            $controller->index();
       } else{
            $controller = new NotFoundController();
            $controller->index();
       } 
    }

}