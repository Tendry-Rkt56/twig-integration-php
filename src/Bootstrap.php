<?php

use Services\TwigSingleton;

$twig = TwigSingleton::getInstance();

$twig->addFunction(new \Twig\TwigFunction('asset', 'asset'));
$twig->addFunction(new \Twig\TwigFunction('path', 'path'));