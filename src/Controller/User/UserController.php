<?php

namespace App\Controller\User;

use Tool\Controller;
use App\Entity\User;
use App\EntityManager\UserManager;

class UserController extends Controller
{
    // Retourne l apage de gestionde sutilisateurs
    public function manage()
    {
        $users = $this->getTable(User::class)->getAll();
        return $this->view('/users/manage.html.twig', [
            'users' => $users,
            'roles' => User::getRolesTypes()
        ]);
    }

    public function searchUser()
    {
        $userList = [];

        if (isset($this->params['username'])) {

            $username = '%' . $this->params['username'] . '%';
            
            $users = $this->getTable(User::class)->search([
                'lastname'  => ['LIKE', $username, 'OR'],
                'firstname' => ['LIKE', $username]
            ])->get();

            foreach ($users as $key => $value) {
                $user['id']        =  $value->getId();
                $user['lastname']  =  $value->getLastname();
                $user['firstname'] =  $value->getFirstname();
                $user['email']     =  $value->getEmail();
                $user['roles']     =  $value->getRoles();
                array_push($userList, $user);
            }

            echo json_encode($userList);

        } else {
            http_response_code(404);
        }
        
    }



}

