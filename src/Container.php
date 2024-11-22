<?php

namespace App;

use Services\Routing;

class Container 
{

     public function getController(string $className)
     {
          return new $className(Manager::getInstance(), Routing::get());
     }

}