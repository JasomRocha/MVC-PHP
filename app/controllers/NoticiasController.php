<?php
require_once __DIR__ ."/../core/Controller.php";
class NoticiasController extends Controller{
    public function index(){
        $this->view('noticias/index');
        return;
    }
}