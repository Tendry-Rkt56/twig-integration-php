<?php

use App\Container;
use App\Controller\EmployeController;
use Services\Routing;

$router = Routing::get();

$container = new Container();

$router->map('GET', '/admin/employes', fn () => $container->getController(EmployeController::class)->index($_GET), 'employes.index');
$router->map('GET', '/admin/employes/create', fn () => $container->getController(EmployeController::class)->create(), 'employes.create');
$router->map('POST', '/admin/employes/create', fn () => $container->getController(EmployeController::class)->store($_POST), 'employes.store');


$match = $router->match();
if ($match !== null) {
     if (is_callable($match['target'])){
         call_user_func_array($match['target'], $match['params']);
     }
}