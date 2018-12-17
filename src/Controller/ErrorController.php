<?php

namespace App\Controller;

use Tool\Controller;

class ErrorController extends Controller 
{
    //
    public function error401()
    {
        return $this->view('/defaults/errors/401.html.twig', []);
    }

    //
    public function error404()
    {
        return $this->view('/defaults/errors/404.html.twig', []);
    }

    //
    public function error500()
    {
        return $this->view('/defaults/errors/500.html.twig', []);
    }


    
}
