<?php

namespace App\Controller\User;

use Tool\Controller;
use App\Entity\User;
use App\EntityManager\UserManager;

class RegisterController extends Controller
{

    public function __construct()
    {
        
    } 

    /**
     * Inscription d'un utilisateur 
     */
    public function register()
    {

        $user = new User();

        // User register data
        $user->setLastname('Mr Test')
            ->setFirstname('user')
            ->setEmail('admin@test.fr')
            ->setPassword('test')
            ->setRoles(['admin','user']);

        // On vérifie si l'adresse email n'existe pas déjà
        $users = $this->getTable(User::class)->search(['email' => ['=','']])->getOne();

        // Insert user in database 
        $this->create($user);

        //  return $this->view('user/register.html.twig', []);

    }



    

}

