<?php

/*** User Routes ***/

// Default Home
$route->create(['GET'], '/', 'HomeController@index')
      ->name('home-page')
      ->description('Acceuil')
      ->middleware([]);

// Login
$route->create(['GET', 'POST'], '/login', 'User\LoginController@login')
      ->name('login-page')
      ->description('Connexion')
      ->middleware([]);

// Password forgot 
$route->create(['GET', 'POST'], '/user/password/forgot', 'User\PasswordResetController@forgotPassword')
      ->name('')
      ->description('Génération de token pour mot de passe oublier')
      ->middleware([]);

// Password Update with token
$route->create(['GET', 'POST'], '/user/password/update/{email}/{token}', 'User\PasswordResetController@generatePassword')
      ->name('')
      ->description('Mise à jour mot de passe oublié')
      ->middleware([]);

// BackOffice Dashboard
$route->create(['GET'], '/dash/backoffice', 'User\BackOfficeDashboard@dashboard')
      ->name('')
      ->description(' Acceuil backoffice')
      ->middleware([]);

// FrontOffice Dashboard
$route->create(['GET'], '/dash/frontoffice', 'User\FrontOfficeDashBoard@dashboard')
      ->name('')
      ->description('acceuil frontoffice')
      ->middleware([]);

// User Manage
$route->create(['GET', 'POST'], '/user/manage', 'User\UserController@manage')
      ->name('login-page')
      ->description('Gestion des utilisateurs')
      ->middleware([]);

//
$route->create(['GET'], '/user/manage/{id}', 'User\UserController@findUser')
      ->name('login-page')
      ->description('Gestion des utilisateurs')
      ->middleware([]);

// Search User
$route->create(['GET'], '/user/search/{username}', 'User\UserController@searchUser')
      ->name('')
      ->description('Gestion des utilisateurs')
      ->middleware([]);
