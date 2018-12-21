<?php

/*** User Routes ***/

// Default Home
$route->create(['GET'], '/', 'HomeController@index')
      ->name('home-page')
      ->description('Page d\'acceuil de site pour visiteur')
      ->middleware([]);

// Login
$route->create(['GET', 'POST'], '/login', 'User\LoginController@login')
      ->name('login-page')
      ->description('Page de connection de l\'application')
      ->middleware([]);

// User Manage
$route->create(['GET', 'POST'], '/user/manage', 'User\UserController@manage')
      ->name('login-page')
      ->description('Gestion des utilisateurs')
      ->middleware([]);
