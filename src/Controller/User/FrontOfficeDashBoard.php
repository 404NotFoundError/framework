<?php 

namespace App\Controller\User;

use Tool\Controller;
use App\Entity\User;
use App\EntityManager\UserManager;

class FrontOfficeDashBoard extends Controller 
{

    public function dashboard()
    {
        app_debug('<h1> This is client dashboard </h1>');
    }
    
}
