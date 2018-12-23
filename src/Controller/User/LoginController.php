<?php

namespace App\Controller\User;

use Tool\Controller;
use App\Entity\User;
use App\EntityManager\UserManager;
use Helper\Validator\Validation;

/**
 * Gestion de la connection de l'utilisateur 
 */
class LoginController extends Controller
{

  // Log a user 
  public function login()
  {
    $this->postLogin();
    // Rendue de la vue
    return $this->view('/users/login.html.twig', []);
  }

  // Traitement du formuliare de connectetion
  private function postLogin()
  {
    // A LA SOUMISSION DU FORMULIARE 
    if (isset($_POST['submit'])){
      // SI LES DONNÉES SONT VALIDES
      if (empty($this->controlPostData())){
         // On vérifie si l'addresse email est valide et que cette dernière correspond à l'email 
         $user = $this->getTable(User::class)->search(['email' => ['=', $_POST['email']]])->getOne();

         if ($user && $user->isEqualPassword($_POST['password'])) {
           // Redirection de l'utilisateur
           if (in_array('admin', $user->getRoles())) {
            header('Location: /dash/backoffice');
            exit();
           }else{
            header('Location: /dash/frontoffice');
            exit();
           }
         }else{
           $this->setError('form',  'Email et (ou) mot de passe incorrect');
         }
      }
      // SI LES DONNÉES NE SONT PAS VALIDE
      else{
        $this->setError('input', $this->controlPostData());
      }
    }

  }

  /**
   * Validation des données post envoyer depuis le client.
   * @return array\list-of-erros
   */
  private function controlPostData()
  {
     // Validation des données 
     $validation = new Validation([
       'email'    => [$_POST['email'], 'required|email'],
       'password' => [$_POST['password'], 'required']
     ]);
     return $validation->errors;
  }




}
