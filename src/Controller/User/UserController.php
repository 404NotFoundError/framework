<?php

namespace App\Controller\User;

use Tool\Controller;
use App\Entity\User;
use App\EntityManager\UserManager;
use App\Middleware\SecurityMiddleware;

class UserController extends Controller
{
    // Retourne la page de gestionde sutilisateurs
    public function manage()
    {
        $entityManager = new UserManager();
        $users = $entityManager->getAllUsers();

        // Rendu du template
        return $this->view('/users/manage.html.twig', [
            'users' => $users,
            'roles' => User::getRolesTypes()
        ]);
    }

    // Renvoie la liste des utilisateurs
    public function findUsers()
    {
        // SecurityMiddleware::allowedAccess(['admin']);
        $entityManager = new UserManager();
        $users = $entityManager->getAllUsers();
        echo json_encode($users);
    }

    // Retourne un utilisateur
    public function findUser()
    {
        $userList = [];

        if (isset($this->params['id'])) {

            $id = $this->params['id'];
            
            $user = $this->getTable(User::class)->search([
                'id'  => ['=', $id]
            ])->getOne();

            $data['id'] = $user->getId();
            $data['lastname'] = $user->getLastname();
            $data['firstname'] = $user->getFirstname();
            $data['phone'] = $user->getPhone();
            $data['roles'] = $user->getRoles();
            $data['address'] = $user->getAddress();
            $data['cp'] = $user->getCodePostal();
            $data['city'] = $user->getCity();
            $data['country'] = $user->getCountry();

            echo json_encode($data);

        } else {
            http_response_code(404);
        }
        
    }

    public function searchUser()
    {
        $userList = [];

        if (isset($this->params['username'])) {

            $username = '%' . $this->params['username'] . '%';
            
            $users = $this->getTable(User::class)->search([
                'lastname'  => ['LIKE', $username, 'OR'],
                'firstname' => ['LIKE', $username, 'OR'],
                'email'     => ['LIKE', $username]
            ])->get();

            foreach ($users as $key => $value) {
                $user['id']        =  $value->getId();
                $user['lastname']  =  $value->getLastname();
                $user['firstname'] =  $value->getFirstname();
                $user['email']     =  $value->getEmail();
                $user['phone']     =  $value->getPhone();
                $user['roles']     =  $value->getRoles();
                $user['cp']        =  $value->getCodePostal();
                $user['address']   =  $value->getAddress();
                $user['city']      =  $value->getCity();
                $user['country']   =  $value->getCountry();
                array_push($userList, $user);
            }

            echo json_encode($userList);

        } else {
            http_response_code(404);
        }
        
    }


}

