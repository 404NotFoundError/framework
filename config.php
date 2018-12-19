<?php

/** YOUR APP CONFIGURATION HERE **/

/*******************
 APPLICATION CONFIG
*******************/

define('APP_MODE', 'dev');
define('APP_NAME', 'framework');
define('APP_FOLDER_NAME', 'portfolio');
define('APP_KEY', '');
define('APP_HOST', 'http://www.local.adebayo.me:8888');
define('APP_MAIL', 'hountondjigodwill@gmail.com');
define('APP_SMTP', 'smtp.gmail.com');
define('APP_SMTP_PORT', 465);
define('APP_SMTP_PASS', '');

/********************
   DATABASE CONFIG
********************/

define('DB_DRIVER', 'pdo_mysql');
define('DB_HOST', 'localhost');
define('DB_NAME', 'adebayo');
define('DB_USER', 'root');
define('DB_PASS', 'root');
define('DB_PORT', 3306);
define('DB_CHARSET', 'Utf8');

// ROLES 
define('ROLES', [
   'super-admin' => ['sup-admin', 'manager'],
   'admin'       => ['dev'],
   'manager', 
   'dev'         => ['vip', 'firm', 'particular', 'user', 'visitor'],
   'vip'        =>  ['firm'],
   'firm',        
   'particular',
   'user',
   'visitor'
]);

/***************************
   SECURITY CONFIGURATION
****************************/

define('DEFAULT_ROOT', '/');
