<?php

function asset(string $path)
{
     $chemin = '/'.ltrim($path, '/');
     return $chemin;
}