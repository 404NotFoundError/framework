<?php

namespace App\Controller;

use Tool\Controller;
use App\Entity\User;
use App\EntityManager\UserManager;
use Helper\Validator\Validation;

/**
 * UserController Class
 */
class UserController extends Controller
{

  // Log a user 
  public function login()
  {

    // $_POST['email'] = "hgodwill@live.fr";
    // $_POST['password'] = "text";
    // $_POST['test'] = "<script> alert('hello word') </script>";
    // $_POST['submit'] = "submit";

    // A LA SOUMISSION DU FORMULIARE 
    if (isset($_POST['submit'])){

      // Filtrage des données
      $_POST = Validation::filterVar($_POST);
      // Validation des données 
      $validation = new Validation([
        'email'    => [$_POST['email'], 'required|email'],
        'password' => [$_POST['password'], 'required']
      ]);
      // SI LES DONNÉES SONT VALIDES
      if (empty($validation->errors))
      {
         // On vérifie si l'addresse email est valide et que cette dernière correspond à l'email 
         $user = $this->getTable(User::class)->search(['email' => ['=', $_POST['email']]])->getOne();
        
         if ($user && $user->isEqualPassword($_POST['password'])) {
           // Gestion de la redirection de l'utilisateur 
           // Le cas ou c'est un admin 
           if (in_array(['admin'], $user->getRoles())) {
            echo "c'est un admin";
           }elseif (in_array(['dev'], $user->getRoles())){
            echo "c'est un dev";
           }else{
            echo "c'est un utilisateur simple";
           }
           
         }else{
           $this->errors['email'] = 'Email ou mot de passe incorect';
         }
      }
      // SI LES DONNÉES NE SONT PAS VALIDE
      else
      {
        app_debug($validation->result, 1);
      }

    }

    return $this->view('user/login.html.twig', [
      'errors' => (object) $this->errors
    ]);

  }

  // Register a user 
  public function register()
  {
     $user = new User();

     // User register data
     $user->setLastname('Mr Test')
          ->setFirstname('user')
          ->setEmail('test@test.fr')
          ->setPassword('test')
          ->setRoles(['user']);

     // On vérifie si l'adresse email n'existe pas déjà
     $users = $this->getTable(User::class)->search(['email' => ['=','']])->getOne();

     // Insert user in database 
     $this->create($user);

    //  return $this->view('user/register.html.twig', []);

  }

  // User Profi // User Home page 
  public function profil()
  {

  }

  // Passwor reset 
  public function passworForget()
  {

  }




}
