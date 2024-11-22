<?php

use Services\TwigSingleton;

$twig = TwigSingleton::getInstance();

if (session_status() == PHP_SESSION_NONE) session_start();

$twig->addFunction(new \Twig\TwigFunction('asset', 'asset'));
$twig->addFunction(new \Twig\TwigFunction('path', 'path'));

$twig->addGlobal('flashes', $_SESSION);
$twig->addFunction(new \Twig\TwigFunction('remove', function ($key) {
     if (isset($_SESSION[$key])) unset($_SESSION[$key]);
}));