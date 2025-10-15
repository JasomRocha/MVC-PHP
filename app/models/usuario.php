<?php
namespace App\Models;
class Usuario{
   public function getUserData(){
        return [
        'nome' => 'Jasom Rocha',
        'idade' => 28,
        'email' => 'jasom@gmail.com'
        ];
   }

}