<?php 

namespace App\Controller\User;

use Tool\Controller;
use App\Entity\User;
use App\EntityManager\UserManager;

class BackOfficeDashBoard extends Controller 
{

    public function dashboard()
    {
        app_debug('<h1> This is admin dashborad </h1>');
    }
    
}
