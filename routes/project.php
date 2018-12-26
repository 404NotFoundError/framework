<?php 

/**** PROJECT ROUTE HERE ****/

// Managment of projects

$route->create(['GET'], '/project/manage', 'Project\ProjectManageController@manage')
      ->name('manage-of-project')
      ->description('Template gestion des projetcs')
      ->middlewares(['auth']);