<?php
class Conexion extends PDO{
    protected string $dbHost = 'localhost';
    protected string $dbUsername = "root";
    protected string $dbPassword = "";
    protected string $dbName = "blog2";

    public function __construct(){
        try{
            parent::__construct("mysql:host=$this->dbHost;dbname=$this->dbName", $this->dbUsername, $this->dbPassword);
            $this->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            die("Error al conectar " . $e->getMessage());
        }
    }
}
