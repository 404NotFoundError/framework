<?php

namespace Tool\Security;

use App\Entity\User;

/**
 * SecurityBundle Trait
 */
trait SecurityBundle
{
    /**
     * Crypt les mots de passes
     * @param string $password 
     */
    public function passwordCrypt(string $password)
    {
        return password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);
    }

    /**
     * Vérifie le hashage d'un mot de passe. 
     * @param string, $password
     * @param string, $hash
     * @return bool
     */
    public function isEqualPassword(string $password)
    {
        if (password_verify($password, $this->password))
        {
            return true;
        }
        else 
        {
            return false;
        }
    }

    /**
     * Génération de token pour un utilisateur lors de sa connection 
     * Protection contre la faille crsf 
     */
    public function generateToken()
    {   

        if (!isset($_COOKIE['user_token'])) {
            $token = time() * rand(1, 9999); 
            setcookie('user_token', $token, time() + 60 * 60 * 24 * 7 * 4);
        } 
              
    }

    /**
     * Vérifie qu'un utilisateur est bien authentifier 
     * @return bool 
     */
    public function authentification()
    {
        if (isset($_COOKIE['user_token'])) 
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    /**
     * Refuse l'accès si l'utilateur ne possède pas des roles renseigner  
     * @param array $roles  
     */
    public function deniedAccess(array $roles)
    {
        // On vérifie d'abord si l'utilisateur est connecter 

    }



}
