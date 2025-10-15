<?php

require_once __DIR__ ."/../core/Controller.php";
require_once __DIR__ ."/../models/usuario.php";

class HomeController extends Controller{
    public function index(){
        $usuario = new Usuario();
        $data = $usuario->getUserData(); // vai receber um array
        $this->view('home/index', $data); // passamos o array pra o controller pai que já espera um array
        return;
    }
    public function contact(){
        $usuario = new Usuario();
        $data = $usuario->getUserData(); // vai receber um array
        $this->view('home/contact', $data);
    }
    public function editar($params = []){
        return $this->view('noticias/noticia', ['id_noticia'=> $params]);
    }
}