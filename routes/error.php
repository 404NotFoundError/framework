<?php 

/**** ERRORS ROUTES  ****/

// 401 Error
$route->create(['GET'], '/error/401', 'ErrorController@error401')
      ->name('401-page')
      ->description('')
      ->middlewares([]);

// 404 Error
$route->create(['GET'], '/error/404', 'ErrorController@error404')
      ->name('404-page')
      ->description('Page introuvable')
      ->middlewares([]);

// 500 Error
$route->create(['GET'], '/error/500', 'ErrorController@error500')
      ->name('500-page')
      ->description('Page introuvable')
      ->middlewares([]);

