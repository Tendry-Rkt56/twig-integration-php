<?php

namespace App\Controller;

use App\Manager;
use Services\Routing;
use Services\TwigSingleton;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class Controller
{

     protected $twig;
     protected $manager;
     protected $router;

     public function __construct()
     {

          $this->twig = TwigSingleton::getInstance();

          $this->manager = Manager::getInstance();
          $this->router = Routing::get();

          if (session_status() == PHP_SESSION_NONE) session_start();

     }

     protected function redirect(string $routeName, array $parameters = [])
     {
          header("Location: ".$this->router->generate($routeName, $parameters));
          exit;
     }

}