<?php

use Services\Routing;

function path(string $routeName, array $context = [])
{
     return Routing::get()->generate($routeName, $context);
}