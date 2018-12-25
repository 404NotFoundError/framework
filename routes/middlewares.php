<?php

/** DEFINED YOUR MIDDLEWARES HERE **/


define('APP_MIDDLEWARES',[

   // Vérifie si un utilisateur est authentifier
  'auth' => 'SecurityMiddleware@isAuth'

]);
