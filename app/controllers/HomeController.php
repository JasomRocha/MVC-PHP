<?php
namespace App\Controllers;
use App\Core\Controller;
use App\Models\Usuario;



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