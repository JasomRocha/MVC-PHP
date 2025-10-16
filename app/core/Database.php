<?php
namespace App\Core;
use PDO;
use Exception;
use PDOException;

class Database{

    private function __construct(){
        self::connect();
    }
    private static $connection = null; 
    
    private static $instancie = null;

    public static function getINstance(){
        if(self::$instancie == null){ 
            self::$instancie = new self();
        } 
        return self::$instancie;
    }

    public function connect(){
        $dataBaseConfig = config('database');

        

        $dsn = "mysql:host={$dataBaseConfig['host']};dbname={$dataBaseConfig['dbname']};charset={$dataBaseConfig['charset']}";
        
        $options =[
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ];

        try{
            self::$connection = new PDO($dsn, $dataBaseConfig['username'], $dataBaseConfig['password'], $options);
        }catch(PDOException $e){
            throw new Exception("Database connection refused due to: " . $e->getMessage(), 1);
        }
        return false;
    }

    // Retorna um unico resultado na consulta
    public function fetch($sql, $params = []): array{
        $stmt = $this->query($sql, $params);
        return $stmt->fetch();
    }

    public function fetchAll($sql, $params = []): array{
        $stmt = $this->query($sql, $params);
        return $stmt->fetchAll();
    }
    
    public function execute($sql, $params = []):int{
         $stmt = $this->query($sql, $params);
        return $stmt->rowCount();
    }
    
    public function lastInsertId($sql, $params = []){
        return $this->connection->lastInsertId();
    }

    public function rowCount($sql, $params = []): int{
        return $this->connection->rowCount();
    }

    public function query($sql, $params = []){
        try{
            $stmt = self::$connection->prepare( $sql );
            $stmt->execute($params);
            return $stmt;
        }catch(PDOException $e){
            throw new Exception("Erro de consulta no banco de dados: " . $e->getMessage());
        }
    }
}