<?php
namespace App\Controllers;
use App\Core\Controller;
use App\Core\Database;
use App\Models\Usuario;
use function App\Core\dd;
use PDO;
use function App\Core\config;



class HomeController extends Controller{
    public function index(){
        $usuario = new Usuario();
        $data = $usuario->getUserData(); // vai receber um array

        // echo 'Criando novo usuario... <br>';
        // $usuarioCriado = $usuario->createUser('Jasao1234', 28, 'jasom21423@gmail.com');
        // echo 'usuario criado com sucesso, retorno: ' . $usuarioCriado . '<br><br>';
        
        //dd(config('database'));

        $usuarios = $usuario->getAllUsers();
        $usuario1 = $usuario->getUserById(1);
        $totalDeUsuarios = $usuario->getTotalDeUsuarios();
        echo 'Usuario com o ID 1:' . $usuario1['nome'] . '<br>';
        echo '<br>';
        echo 'Total de usuarios cadastrados no BD:' . $totalDeUsuarios . '<br>';
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