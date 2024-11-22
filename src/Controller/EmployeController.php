<?php

namespace App\Controller;

use App\Entity\Employe;

class EmployeController extends Controller
{

     public function index()
     {
          $employes = $this->manager->getEntity(Employe::class)->findAll();
          return $this->twig->display('employes/index.html.twig', [
               'employes' => $employes
          ]);
     }

}