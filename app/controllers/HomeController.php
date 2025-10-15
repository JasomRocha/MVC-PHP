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
}