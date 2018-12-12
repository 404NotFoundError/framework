<?php

session_start();

define('APP_BASE', __dir__ . '/../');

require_once __dir__ . '/../vendor/autoload.php';

require_once __dir__ . '/../config.php';

if(APP_MODE === 'dev') ini_set('display_errors', 'on');

require_once __dir__ . '/../routes/middlewares.php';

$functions = glob(__dir__ . '/../tools/Functions/*php');

foreach ($functions as $key => $function) { require_once $function; }

$route = new Tool\Route\Router();

/** get routes file **/
$routesFilesList = glob(__dir__ . '/../routes/*php');

/** require route file **/
foreach ($routesFilesList as $key => $file) { require_once $file; }

/** Load routes **/
$app = new Tool\Route\RouteLoader($route->getRoutes());
