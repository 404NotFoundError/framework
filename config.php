<?php

// APPLICATION CONFIG
define('APP_MODE', 'dev');
define('APP_NAME', 'ADIDA');
define('APP_KEY', '');
define('APP_SERVER', 'http://www.local.room.ovh');
define('APP_LANG', 'fr');

// MAIL CONFIG
define('APP_MAIL', 'hbb.develop@gmail.com');
define('APP_SMTP', 'smtp.gmail.com');
define('APP_SMTP_PORT', 587);
define('APP_SMTP_AUTH', true);
define('APP_SMTP_USERNAME', 'hbb.develop@gmail.com');
define('APP_SMTP_PASSWORD', 'N2cobusy');
define('APP_SMTP_PASS', 'N2cobusy');

// DATABASE CONFIG
define('DB_DRIVER', 'pdo_mysql');
define('DB_HOST', 'localhost');
define('DB_NAME', 'adebayo');
define('DB_USER', 'root');
define('DB_PASS', 'root');
define('DB_PORT', 3306);
define('DB_CHARSET', 'Utf8');

// ROLES CONFIG
define('ROLES', [
   'super-admin' => ['sup-admin', 'manager'],
   'admin'       => ['dev'],
   'manager', 
   'dev'         => ['vip', 'firm', 'particular', 'user', 'visitor'],
   'vip'         => ['firm'],
   'firm',        
   'particular',
   'user',
   'visitor'
]);

// SECURITY CONFIG
define('DEFAULT_ROOT', '/');
