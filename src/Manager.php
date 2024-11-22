<?php

namespace App;

use Services\DataBase;

class Manager
{

     private static $_instance;
     private static $_db;
     
     public function getInstance()
     {
          if (self::$_instance == null) self::$_instance = new self();
          return self::$_instance;
     }

     private function getDb()
     {
          if (self::$_db == null) self::$_db = new DataBase();
          return self::$_db;
     }

     public function getEntity(string $className)
     {
          return new $className($this->getDb());
     }


}