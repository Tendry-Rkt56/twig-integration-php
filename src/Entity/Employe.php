<?php

namespace App\Entity;

class Employe extends Entity
{

     public function findAll(int $limit, int $offset, array $data = [])
     {
          $sql = "SELECT * FROM employees WHERE id > :id";
          if (isset($data['search'])) {
               $colonne = $data['colonne'] ?? 'nom';
               $sql .= " AND $colonne LIKE :search";
          }
          $sql .= " LIMIT $limit offset $offset";
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

     public function count(array $data = [])
     {
          $sql = "SELECT count(*) FROM employees WHERE id > :id";
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
          return $query->fetchColumn();
          
     }

     public function create(array $data = [])
     {
          $sql = "INSERT INTO employees (nom, prenom, email, phone, address, poste, hire_date, salaire) VALUES (:nom, :prenom, :email, :phone, :address, :poste, :hire_date, :salaire)";

          $query = $this->db->getConn()->prepare($sql);

          // Lier les paramètres comme avant
          $query->bindValue(':nom', $data['nom'], \PDO::PARAM_STR);
          $query->bindValue(':prenom', $data['prenom'], \PDO::PARAM_STR);
          $query->bindValue(':email', $data['email'], \PDO::PARAM_STR);
          $query->bindValue(':phone', $data['phone'], \PDO::PARAM_STR);
          $query->bindValue(':address', $data['address'], \PDO::PARAM_STR);
          $query->bindValue(':poste', $data['poste'], \PDO::PARAM_STR);
          $query->bindValue(':hire_date', $data['hire_date'], \PDO::PARAM_STR);
          $query->bindValue(':salaire', $data['salaire'], \PDO::PARAM_INT);

          return $query->execute();

     }

     public function find(int $id)
     {
          $sql = "SELECT * FROM employees WHERE id = :id";
          $query = $this->db->getConn()->prepare($sql);
          $query->bindValue(':id', $id, \PDO::PARAM_INT);
          $query->execute();
          return $query->fetch(\PDO::FETCH_OBJ);
     }

     public function update(int $id, array $data = [])
     {
          $sql = "UPDATE employees SET nom = :nom, prenom = :prenom, email = :email, phone = :phone, address = :address, poste = :poste, salaire = :salaire WHERE id = :id";
          $query = $this->db->getConn()->prepare($sql);
          $query->bindValue(':nom', $data['nom'], \PDO::PARAM_STR);
          $query->bindValue(':prenom', $data['prenom'], \PDO::PARAM_STR);
          $query->bindValue(':email', $data['email'], \PDO::PARAM_STR);
          $query->bindValue(':phone', $data['phone'], \PDO::PARAM_STR);
          $query->bindValue(':address', $data['address'], \PDO::PARAM_STR);
          $query->bindValue(':poste', $data['poste'], \PDO::PARAM_STR);
          $query->bindValue(':salaire', $data['salaire'], \PDO::PARAM_INT);
          $query->bindValue(':id', $id, \PDO::PARAM_INT);

          return $query->execute();
     }
}

?>