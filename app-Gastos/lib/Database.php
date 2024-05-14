<?php
/**como estamos utilizando autoload de compouser, se necesita un namespace */
namespace andino\gastos\lib;

use PDO;
use PDOException;


class Database{
    
    private string $host;
    private string $user;
    private string $password;
    private string $db;

    private string $charset;

    public function __construct(){
        $this->host = 'localhost';
        $this->user = 'gastos';
        $this->password = 'root';
        $this->db = 'root';
        $this->charset = 'utf8m411';
    }
    public function connect(){
        try{
            //conexion a la base de datos
            $connection = "mysql:host=".$this->host.";dbname=".$this->db.";charset=".$this->charset;
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];
            //creamos una instancia de PDO
            $pdo = new PDO($connection, $this->user, $this->password, $options);
            //retornamos la instancia de PDO
            return $pdo;
        }catch(PDOException $e){
            print_r('ERROR EN LA CONEXION DE BBDD: ' . $e->getMessage());
        }
        
    }    

}