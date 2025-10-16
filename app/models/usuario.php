<?php
namespace App\Models;

use App\Core\Model;
class Usuario extends Model {
   public function getUserData(){
        return [
        'nome' => 'Jasom Rocha',
        'idade' => 28,
        'email' => 'jasom@gmail.com'
        ];
   }

   public function createUser($nome, $idade, $email){
      $sql = 'INSERT INTO usuarios (nome, idade, email) VALUES (:nome, :idade, :email)';
      $params = [
         'nome' => $nome, 
         'idade' => $idade,
         'email' => $email  
      ];      
      return $this->db->execute($sql, $params);

   }

   public function getAllUsers(){
      return $this->db->fetchAll('SELECT * FROM usuarios');
   }

   public function getUserById($id){
      $sql = 'SELECT * FROM usuarios WHERE id=:id';
      $params = ['id' => $id];
      return $this->db->fetch($sql, $params);
   }

   public function getTotalDeUsuarios(){
      return $this->db->fetch('SELECT COUNT(*) as count FROM usuarios')['count'];
   }
}