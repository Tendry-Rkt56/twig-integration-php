<?php

namespace App\Controller;

class HomeController extends Controller
{

     public function home()
     {
          return $this->twig->display('home/home.html.twig');
     }

}