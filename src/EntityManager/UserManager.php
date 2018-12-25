<?php 

namespace App\EntityManager;

use App\Entity\User;

/**
 * UserManager Class
 */
class UserManager 
{

    use \Tool\Mysql\MysqlEntityManager;

    // Renvoie la liste de tous les utilisateurs
    public static function getAllUsers() : array
    {
        $userList = [];
        $users = $this->getTable(User::class)->getAll();
        // Pour chaque utilisateur on récupère le role qui nous intérêsse.
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
        return $userList;
    }

    /**
     * Réccupère la liste des projets d'un utilisateur
     * @param object\User
     */
    public function getProject(User $user)
    {

    }


}