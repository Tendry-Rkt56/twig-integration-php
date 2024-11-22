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
               'maxPages' => $maxPages
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

}