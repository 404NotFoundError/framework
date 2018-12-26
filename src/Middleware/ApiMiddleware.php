<?php 

namespace App\Middleware;

class ApiMiddleware  
{

    private $referer,
            $uri;

    // On vérifie si l'hote préccédente correspond à celle du site
    public function __construct()
    {
        if (isset($_SERVER["HTTP_REFERER"]) && preg_match('#^'. APP_SERVER .'#', $_SERVER["HTTP_REFERER"])) {
            $this->referer = $_SERVER["HTTP_REFERER"];
            $this->uri = $_SERVER['REQUEST_URI'];
            return $this;
        } else {
            return http_response_code(404);
        }
    }

    // Vérification du token de session
    /***** Paramètres *****/
    // Vérification du role ?
    // Autentification ?
    public function getMethod()
    {
        app_debug($_SESSION['token']);
    }

    //
    public function postMethod()
    {

    }

    
}
