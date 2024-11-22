<?php

namespace App\Controller;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class Controller
{

     private $loader;
     protected $twig;
     public function __construct()
     {
          $this->loader = new FilesystemLoader(ROOT .'/../templates');
          $this->twig = new Environment($this->loader);

          if (session_status() == PHP_SESSION_NONE) session_start();

     }

}