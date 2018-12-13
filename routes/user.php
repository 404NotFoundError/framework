<?php

/*** User Routes ***/

// Login
$route->create('GET', '/login', 'UserController@login')
      ->name('Connection')
      ->description('Login to app');

// Registration 
$route->create('GET', '/user/register', 'UserController@register')
      ->name('Inscription')
      ->description('Formulaire d\'inscription');

// Profil 
$route->create('GET', '/user/profil/{id}', 'UserController@profil')
      ->name('Inscription')
      ->description('Profile de l\'utilisatuer');

// Forgot Password 
$route->create('GET', '/user/reset-password', 'UserController@passworForget')
      ->name('Inscription')
      ->description('Profile de l\'utilisatuer');


