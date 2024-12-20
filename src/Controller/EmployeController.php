<?php

namespace App\Controller;

use App\Entity\Employe;

class EmployeController extends Controller
{

     public function index(array $data = [])
     {
          $limit = $data['limit'] ?? 10;
          $total = $this->manager->getEntity(Employe::class)->count($data);
          $page = $data['page'] ?? 1;
          $offset = ($page - 1) * $limit;
          $maxPages = ceil($total / $limit);
          $employes = $this->manager->getEntity(Employe::class)->findAll($limit, $offset, $data);
          return $this->twig->display('employes/index.html.twig', [
               'employes' => $employes,
               'data' => $data,
               'total' => $total,
               'data' => $data,
               'limit' => $limit,
               'count' => count($employes),
               'maxPages' => $maxPages,
               'tris' => ['nom', 'prenom', 'email', 'addresse'],
          ]);
     }

     public function create()
     {
          return $this->twig->display('employes/create.html.twig');
     }

     public function store(array $data = [])
     {
          $execute = $this->manager->getEntity(Employe::class)->create($data);
          return $this->redirect('employes.index');
     }

     public function edit(int $id)
     {
          $employe = $this->manager->getEntity(Employe::class)->find($id);
          return $this->twig->display('employes/edit.html.twig', [
               'employe' => $employe,
          ]);
     }

     public function update(int $id, array $data = [])
     {
          $execute = $this->manager->getEntity(Employe::class)->update($id, $data);
          return $this->redirect('employes.index');
     }

     public function delete(int $id)
     {
          $delete = $this->manager->getEntity(Employe::class)->delete($id);
          return $this->redirect('employes.index');
     }

}