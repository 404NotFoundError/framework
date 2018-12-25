<?php

namespace App\Middleware;

use App\Entity\User;
use Tool\Mysql\MysqlEntityManagerClass;

/**
 * Security system
 */
class SecurityMiddleware
{

   use \Tool\Mysql\MysqlEntityManager;

   public function __construct()
   {
      return $this;
   }

   // Si l'utilisateur n'est pas connecter on le redirige 
   public function isAuth()
   {
      if (!isset($_SESSION['user'])) {
         header('Location: /login');
         exit();
      } else {
          return true;
      }
   }
   
   // Austorisation d'accès à un type d'utilisatuer
   public static function allowedAccess(array $roles, $redirect = null)
   {
      
      $auth = new SecurityMiddleware;
      $auth->isAuth();

      $entityManager = new MysqlEntityManagerClass;
      $user = $entityManager->getTable(User::class)->search([
         'id' => ['=', $_SESSION['user']]
      ])->getOne();

      foreach ($user->getRoles() as $key => $role) {
         if ($user && in_array($role, $roles)) {
            return true;
         }
      }

      if (!is_null($redirect)) {
         header('Location: '. $redirect);
      } else {
         header('Location: /login');
      }
      
      exit();

   }

   // Interdiction d'accèrs à un type d'utilisateur
   public static function deniedAccess(array $roles)
   {
      $this->isAuth();
   }





}
