<?php

namespace App\Controller;

use App\Entity\Employe;

class EmployeController extends Controller
{

     public function index(array $data = [])
     {
          $employes = $this->manager->getEntity(Employe::class)->findAll($data);
          return $this->twig->display('employes/index.html.twig', [
               'employes' => $employes,
               'data' => $data
          ]);
     }

}