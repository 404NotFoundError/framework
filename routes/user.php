<?php

/*** User Routes ***/

// Connection
$route->create('GET', '/login', 'UserController@login')
      ->name('Login')
      ->description('Login to app');
