<?php

// Enregistrement de la fonction autoload() en tant que fonction d'autoloading
// PHP exécutera la fonction autoload() à chaque fois qu'il va chercher une classe inconnue
/*
spl_autoload_register('autoload');

function autoload($classname)
{
    require './class/' . $classname . '.php';
}
*/

require '../src/Core/Autoloader.php';

// Appel de la méthode statique register() sur la classe Autoloader
// Vocabulaire : opérateur de résolution de portée ::
Autoloader::register();