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
        app_debug('This home page go to /login for log');

        return $this->view('home.html.twig', []);
    }




}
