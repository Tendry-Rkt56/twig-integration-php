<?php

namespace Services;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Twig\TwigFunction;

class TwigSingleton
{
     private static ?Environment $twig = null;

     private function __construct() {} // Empêche l'instanciation directe

     /**
      * @return Environment
      */
     public static function getInstance(): Environment
     {
          if (self::$twig === null) {
               $loader = new FilesystemLoader(ROOT . '/../templates');
               self::$twig = new Environment($loader);
          }

          return self::$twig;
     }
}