<?php 

namespace App\Controller\User;

use Tool\Controller;
use App\Entity\User;
use App\EntityManager\UserManager;
use App\Middleware\SecurityMiddleware;

class BackOfficeDashBoard extends Controller 
{

    public function __construct()
    {
        SecurityMiddleware::allowedAccess(['admin']);
    }

    public function dashboard()
    {
        app_debug('<h1> This is admin dashborad </h1>');
    }
    
}
