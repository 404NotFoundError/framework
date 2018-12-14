<?php

/*** User Routes ***/

// Login
$route->create(['GET', 'POST'], '/login', 'User\LoginController@login')
      ->name('Connection page')
      ->description('Login to app')
      ->middleware([]);

$route->create(['POST'], '/login-post', 'User\LoginController@postLogin')
      ->name('Connection form treatment');

// Registration 
$route->create(['GET'], '/user/register', 'User\RegisterController@register')
      ->name('Inscription')
      ->description('Formulaire d\'inscription');
