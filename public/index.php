<?php

// Inclusion des dépendances
require '../vendor/autoload.php';
require '../src/functions.php';
require '../autoload.php';
require '../config.php';

use App\Core\PDOFactory;
use App\Core\Database;

$path = $_SERVER['PATH_INFO'] ?? '/';

// Routing
$routes = [
    '/' => [
        'class' => 'App\\Controller\\HomeController',
        'method' => 'index'
    ],
    '/conducteur' => [
        'class' => 'App\\Controller\\ConducteurController',
        'method' => 'index'
    ],
    '/conducteur/new' => [
        'class' => 'App\\Controller\\ConducteurController',
        'method' => 'addConducteur'
    ],
    '/conducteur/edit' => [
        'class' => 'App\\Controller\\EditConducteurController',
        'method' => 'index'
    ],
    '/conducteur/remove' => [
        'class' => 'App\\Controller\\RemoveConducteurController',
        'method' => 'index'
    ],
    '/vehicule' => [
        'class' => 'App\\Controller\\VehiculeController',
        'method' => 'index'
    ],
    '/vehicule/new' => [
        'class' => 'App\\Controller\\VehiculeController',
        'method' => 'addVehicule'
    ],
    '/vehicule/edit' => [
        'class' => 'App\\Controller\\EditVehiculeController',
        'method' => 'index'
    ],
    '/vehicule/remove' => [
        'class' => 'App\\Controller\\RemoveVehiculeController',
        'method' => 'index'
    ],
    '/association' => [
        'class' => 'App\\Controller\\AssociationController',
        'method' => 'index'
    ],
    '/association/new' => [
        'class' => 'App\\Controller\\AssociationController',
        'method' => 'addAssociation'
    ]
];

// Si le path existe dans le tableau de routes... 
if (array_key_exists($path, $routes)) {

    // ... alors on inclut le fichier PHP correspondant
    // require '../src/controllers/' . $routes[$path];
    $pdo = PDOFactory::get();

    $database = new Database($pdo);

    // Instanciation de la classe de contrôleur
    $controller = new $routes[$path]['class']($database);

    // Récupération de la méthode associée à l'action
    $method = $routes[$path]['method'];

    // Exécution de cette méthode sur l'objet contrôleur
    //$controller->$method();
    call_user_func([$controller, $method]);
} else {

    // Sinon on fait une erreur 404
    http_response_code(404);

    render('404');
}

