<?php 

namespace App\Controller;

use Tool\Controller;

class HomeController extends Controller 
{
    
    /**
     * Retourne la page d'acceuil de l'application
     */
    public function index()
    {
        app_debug('Hello, this is a default homePage.');
    }




}
