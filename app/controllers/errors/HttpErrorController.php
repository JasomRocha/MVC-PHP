<?php
namespace App\Controllers\Errors;
use  App\Core\Controller;
class HttpErrorController extends Controller{
    public function notFound($params = []){
        http_response_code(404);
        return $this->view('Erros/404'); 
    }

    public function forbidden($params = []){
        http_response_code(403);
        return $this->view('Erros/403'); 
    }

    public function internalError($params = []){
        http_response_code(500);
        return $this->view('Erros/500'); 
    }
}