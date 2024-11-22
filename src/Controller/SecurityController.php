<?php

namespace App\Controller;

class SecurityController extends Controller
{

     public function login()
     {
          return $this->twig->display('security/login.html.twig');
     }

}