<?php

namespace App\Entity;

class Employe extends Entity
{

     public function findAll(array $data = [])
     {
          $sql = "SELECT * FROM employees WHERE id > :id";
          if (isset($data['search'])) {
               $sql .= " AND nom LIKE :search";
          }
          $query = $this->db->getConn()->prepare($sql);
          $id = 0;
          $query->bindValue(':id', $id, \PDO::PARAM_INT);
          if (isset($data['search'])) {
               $search = '%'.$data['search'].'%';
               $query->bindValue(':search', $search, \PDO::PARAM_STR);
          }
          $query->execute();
          return $query->fetchAll(\PDO::FETCH_OBJ);
     }

}

?>