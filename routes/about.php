<?php 

/**** ABOUT PAGES ****/

// About 
$route->create(['GET'], '/about', 'AboutController@about')
      ->name('About-page')
      ->description('À propos de l\'entité')
      ->middlewares([]);

// Legal notice 
$route->create(['GET'], '/about/legal-notice', 'AboutController@legalNotice')
      ->name('Notice-page')
      ->description('Mentions légales')
      ->middlewares([]);

// Policy Privacy
$route->create(['GET'], '/about/policy-privacy', 'AboutController@policyPrivacy')
      ->name('Policy-page')
      ->description('Politique te confidentialié')
      ->middlewares([]);


