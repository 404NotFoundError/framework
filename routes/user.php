<?php

/*** User Routes ***/

// Default Home
$route->create(['GET'], '/', 'HomeController@index')
      ->name('home-page')
      ->description('Acceuil')
      ->middlewares([]);

// Login
$route->create(['GET', 'POST'], '/login', 'User\LoginController@login')
      ->name('login-page')
      ->description('Connexion')
      ->middlewares([]);

// Password forgot 
$route->create(['GET', 'POST'], '/user/password/forgot', 'User\PasswordResetController@forgotPassword')
      ->name('password-token')
      ->description('Génération de token pour mot de passe oublier')
      ->middlewares([]);

// Password Update with token
$route->create(['GET', 'POST'], '/user/password/update/{email}/{token}', 'User\PasswordResetController@generatePassword')
      ->name('update-password-token')
      ->description('Mise à jour mot de passe oublié')
      ->middlewares([]);

// BackOffice Dashboard
$route->create(['GET'], '/dash/backoffice', 'User\BackOfficeDashboard@dashboard')
      ->name('home-backOffice')
      ->description(' Acceuil backoffice')
      ->middlewares(['auth']);

// FrontOffice Dashboard
$route->create(['GET'], '/dash/frontoffice', 'User\FrontOfficeDashBoard@dashboard')
      ->name('home-frontOffice')
      ->description('acceuil frontoffice')
      ->middlewares([]);

// Manage Users
$route->create(['GET', 'POST'], '/user/manage', 'User\UserController@manage')
      ->name('user-mange-page')
      ->description('Gestion des utilisateurs')
      ->middlewares([]);

// Api User
$route->create(['POST'], '/user/manage/{id}', 'User\UserController@findUser')
      ->name('api-get-user')
      ->description('Réccupération d\'un utilisateur à l\'aide d\'une api')
      ->middlewares([]);

// Api Search User
$route->create(['GET'], '/user/search/{username}', 'User\UserController@searchUser')
      ->name('')
      ->description('Gestion des utilisateurs')
      ->middlewares([]);
