<?php

use App\Container;
use App\Controller\EmployeController;
use Services\Routing;

$router = Routing::get();

$container = new Container();

$router->map('GET', '/admin/employes', fn () => $container->getController(EmployeController::class)->index($_GET), 'employes.index');
$router->map('GET', '/admin/employes/create', fn () => $container->getController(EmployeController::class)->create(), 'employes.create');
$router->map('POST', '/admin/employes/create', fn () => $container->getController(EmployeController::class)->store($_POST), 'employes.store');
$router->map('GET', '/admin/employes/[i:id]-[*:slug]', fn ($id, $slug) => $container->getController(EmployeController::class)->edit($id), 'employes.edit');
$router->map('POST', '/admin/employes/[i:id]-[*:slug]', fn ($id, $slug) => $container->getController(EmployeController::class)->update($id, $_POST), 'employes.update');
$router->map('POST', '/admin/employes/delete/[i:id]', fn ($id) => $container->getController(EmployeController::class)->delete($id), 'employes.delete');


$match = $router->match();
if ($match !== null) {
     if (is_callable($match['target'])){
         call_user_func_array($match['target'], $match['params']);
     }
}