<?php
// Pegando parametros da URL e definindo qual o controlador que será chamado
namespace App\Core;
require_once __DIR__ . '/functions.php';
use App\Controllers\HomeController;
use App\Models\Usuario;
use App\Controllers\errors\HttpErrorController;
use function App\core\dd;
use Exception;


class Router {
    public function dispatch($url) {
      try{
       $url = trim($url, '/');
       $parts =$url ? explode('/', $url) : [];

       $controllerName = ($parts[0] ?? 'home'); // Se nao vier nada no queryParam coloca Home
       
       $controllerName = 'App\Controllers\\' . ucfirst($controllerName) . 'Controller'; // Concatena com Controller
       
       if(!class_exists($controllerName)){
            throw new Exception('404');
       } 

        $controller = new $controllerName();

        $actionName = $parts[1] ?? 'index';

        //dd($actionName, $controllerName, $parts, $url);

      if(!method_exists($controllerName, $actionName)){
         throw new Exception('404');
      }
       
      // Exemplo de verificação de permissão (403)
      if ($controllerName === 'HomeController' && $actionName === 'editar') {
         throw new Exception('403');
      }

      $params = array_slice($parts, 2);    
      //$controller->$actionName();
      call_user_func_array([$controller, $actionName], $params);

      }catch(Exception $e){
         $errorController = new HttpErrorController();

         switch ($e->getMessage()) {
            case '404':
               $errorController->notFound();
                  break;
            case '403':
               $errorController->forbidden();
               break;
            default:
               $errorController->internalError($e);
               break;
         }
      }
   }
}   