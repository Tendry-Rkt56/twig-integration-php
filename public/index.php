<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
define('ROOT', __DIR__);
require_once '../vendor/autoload.php';
require_once '../config/Constante.php';
require_once '../vendor/altorouter/altorouter/AltoRouter.php';
require_once '../src/Bootstrap.php';
require_once '../config/Router.php';
