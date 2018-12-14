<?php

namespace App\Controller\User;

use Tool\Controller;
use App\Entity\User;
use App\EntityManager\UserManager;
use Helper\Validator\Validation;

/**
 * Gestion de la connecter de l'utilisateur 
 * LoginController Class
 */
class LoginController extends Controller
{

  // Log a user 
  public function login()
  {
    $this->postLogin();
    return $this->view('/defaults/models/login.html.twig', []);
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
           // Génération de token pour l'utilisateur
           $user->generateToken();
           // Redirection de l'utilisateur
           if (in_array(['admin'], $user->getRoles())) {
            echo "c'est un admin";
           }elseif (in_array(['dev'], $user->getRoles())){
            echo "c'est un dev";
           }else{
            echo "Vous êtes bien connecter";
           }
           
         }else{
           $this->setErrors('form',  'Email ou mot de passe incorect');
         }
      }
      // SI LES DONNÉES NE SONT PAS VALIDE
      else{
        $this->setErrors('input', $this->controlPostData());
      }
    }


  }

  /**
   * Validation des données post envoyer depuis le client.
   * @return array\list-of-erros
   */
  private function controlPostData()
  {

    // Filtrage des données
     $_POST = Validation::filterVar($_POST);
     // Validation des données 
     $validation = new Validation([
       'email'    => [$_POST['email'], 'required|email'],
       'password' => [$_POST['password'], 'required']
     ]);

     return $validation->errors;
     
  }




}
