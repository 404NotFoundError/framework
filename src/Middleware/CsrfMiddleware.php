<?php

namespace App\Middleware;

/**
 * TokenMiddleware Class
 */
class CrsfMiddleware
{

    public function __construct()
    {

    }

    /**
     * Génère un jeton de manière aléatoire.
     * @return string,
     */
    public function generateToken()
    {
      return time() * rand(200, 1000);
    }





}
