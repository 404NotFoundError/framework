<?php

namespace App\Controller\User;

use Tool\Controller;
use App\Entity\User;
use App\EntityManager\UserManager;

class UserController extends Controller
{

    public function manage()
    {

        $users = $this->getTable(User::class)->getAll();

        return $this->view('/users/manage.html.twig', [
            'users' => $users,
            'roles' => User::getRolesTypes()
        ]);

    }



}

