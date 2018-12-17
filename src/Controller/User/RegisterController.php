<?php

namespace App\Controller\User;

use Tool\Controller;
use App\Entity\User;
use App\EntityManager\UserManager;

class RegisterController extends Controller
{

    /**
     * Inscription d'un utilisateur 
     */
    public function register()
    {

        $user = new User();

        // User register data
        $user->setLastname('Mr Dev')
             ->setFirstname('dec')
             ->setEmail('dev@test.fr')
             ->setPassword('admin')
             ->setRoles(['dev']);

        // On vérifie si l'adresse email n'existe pas déjà
        $users = $this->getTable(User::class)->search(['email' => ['=','']])->getOne();
            
        // Insert user in database 
        $this->create($user);
        
        //  return $this->view('user/register.html.twig', []);

    }



    

}

