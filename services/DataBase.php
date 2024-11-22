<?php

namespace Services;

class DataBase
{

     private $conn;

     public function __construct()
     {
          try {
               $this->conn = new \PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=".DB_CHARSET, DB_USER, DB_PASS);     
               $this->conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
          }
          catch(\PDOException $e){
               echo "Erreur de connexion à la base de données : " . $e->getMessage();
          }
     }

     public function getConn(): \PDO
     {
          return $this->conn;
     }

}