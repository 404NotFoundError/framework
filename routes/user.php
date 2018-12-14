<?php

/*** User Routes ***/

// Login
$route->create('GET', '/login', 'User\LoginController@login')
      ->name('Connection')
      ->description('Login to app');

// Registration 
$route->create('GET', '/user/register', 'User\RegisterController@register')
      ->name('Inscription')
      ->description('Formulaire d\'inscription');
