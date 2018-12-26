<?php

session_start();

define('APP_BASE', __dir__ . '/../');

require_once __dir__ . '/../vendor/autoload.php';

require_once __dir__ . '/../config.php';

// Modules de dévelopement 
if(APP_MODE === 'dev') {
    // On active le mode display error
    ini_set('display_errors', 'on');
    // On reccupère tout les outils de dev du framework
    $functions = glob(__dir__ . '/../tools/Functions/*php');
    // On inclus tous les outils de dev du framewwork
    foreach ($functions as $key => $function) { require_once $function; }
}

// Gestion de la langue par défaut de l'application
if (!isset($_COOKIE['lang'])) {
    setcookie("lang", APP_LANG , time()+3600 * 24 * 7 * 4 * 50000);
}

// Securitu Faillure Manage
Tool\Security\FailureSecurityBundle::generateToken();
Tool\Security\FailureSecurityBundle::filterEntry();
Tool\Security\FailureSecurityBundle::generateTicket(DEFAULT_ROOT);

// Récupération de la liste des middlewares de l'application
require_once __dir__ . '/../routes/middlewares.php';

// Activation du Router
$route = new Tool\Route\Router();

// Récupération de la liste des routes
$routesFilesList = glob(__dir__ . '/../routes/*php');
foreach ($routesFilesList as $key => $file) { require_once $file; }

// Activation du système de routage
$app = new Tool\Route\RouteLoader($route->getRoutes());
