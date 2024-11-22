<?php

namespace App\Entity;

class Employe extends Entity
{

     public function findAll()
     {
          $sql = "SELECT * FROM employees WHERE id > :id";
          $query = $this->db->getConn()->prepare($sql);
          $id = 0;
          $query->bindValue(':id', $id, \PDO::PARAM_INT);
          $query->execute();
          return $query->fetchAll(\PDO::FETCH_OBJ);
     }

}

?>