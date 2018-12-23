<?php 

namespace App\Controller\User;

use Tool\Controller;
use App\Entity\User;
use App\EntityManager\UserManager;
use Helper\Validator\Validation;

class PasswordResetController extends Controller 
{

    // Gestion de mot de passe oublier
    public function forgotPassword()
    {   
        // Gestion de la soumission du formuliare 
        if (isset($_POST['tokenGen'])) { $this->generateToken(); } 
        // Rendu du template 
        $this->view('/users/passwordForgot.html.twig', []);
    }

    // Génération de token pour reset le mot de passe 
    private function generateToken()
    {
        // Validation des données
        $validation = new Validation([
            'email' => [ $_POST['email'], 'required|email']
        ]);
        // Si on a des erreurs on renvoie la liste des erreurs
        if (!empty($validation->errors)) {
            $this->setError('input', $validation->errors);
        // Si on a pas d'erreur on vérifie que l'adresse email existe réellement
        } else {
            $user = $this->getTable(User::class)->search(['email' => ['=', $_POST['email']]])->getOne();
            // Si l'adresse email email on génére un token et on l'envoyer en mail
            if (!empty($user)) {
                // On génère un token pour mettre à jour le mot de passe
                $token = rand(10000000000, 99999999999999);
                $token = md5($token);
                $token = $token . '---' . date('Y-m-d--H:i:s');
                $user->setPasswordToken($token);
                $this->getTable(User::class)->update($user);
                $this->setSuccess('form', ' Vous allez recevoir sur votre adresse email un lien pour générer un nouveau mot de passe. Ce ne sera plus valide 5 minutes après l\'envoie de l\'email');
                // Envoie de l'email pour gener un code 
                $link = $_SERVER['HTTP_HOST'] . '/user/password/update/' . $user->getEmail() . '/' . $user->getPasswordToken();
                $mail = new \Helper\Mail\Mailer(
                    $user->getEmail(),
                    'Mise à jour de mot de passe',
                    '<!DOCTYPE html>
                    <html lang="fr">
                    <head>
                        <meta charset="UTF-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <meta http-equiv="X-UA-Compatible" content="text/html">
                        <title>Mise à jour de mot de passe</title>
                    </head>
                    <body> '.

                    'Mme / Mr ' . $user->getLastname() . ', une demande de mise à jour de mot via le proccéder' .
                    '<i> mot de passe oublier </i> a été effectué avec votre compte. Si vous êtes l\'auteur de' .
                    ' de cette demande, veuillez vous rendre sur le lien ci dessous adin de finaliser l\'opération' .
                    '<strong> '. $link .' </strong>
                        
                    </body>
                    </html>',
                    true
                );

            // Si le token l'adresse email n'existe pas on renvoie un erreur    
            } else {
                $this->setError('input', ['email' => 'Cette adresse e-mail n\' existe cette pas dans nos répertoires. Merci de vérifier l\'orthographe !']);
            }
        }
    }

    // Génération d'un mot de passe avec un token
    public function generatePassword()
    {
        // On vérifie que l'adresse email existe 
        $user      = $this->getTable(User::class)->search(['email' => ['=', $this->params['email']]])->getOne();
        $tokenDate = explode('---', $user->getPasswordToken());
        $tokenDate = str_replace('--', ' ', $tokenDate[1]);
        $tokenDate = new \DateTime($tokenDate); 
        $now       = new \DateTime(date('Y-m-d H:i:s')); 
        $interval  = $tokenDate->diff($now);
        
        // Si tout est coorect on perme à l'utilisateur de modifier sont mot de passe
        if ($user && $user->getPasswordToken() === $this->params['token'] && $interval->i < 5) {

            if (isset($_POST['submit'])) {

                // Validation des données
                $validation = new Validation([
                    'password'       => [$_POST['password'], 'required'],
                    'passwordUpdate' => [$_POST['passwordUpdate'], 'required']
                ]);

                // Si on a aucune erreur lors de la validation 
                if (empty($validation->errors)) {
                    if ($_POST['passwordUpdate'] === $_POST['password']) {
                        // Cryptage du mot de passe
                        $password = $user->passwordCrypt($_POST['password']);
                        $user->setPassword($password);
                        $this->getTable(User::class)->update($user);
                        // Redirction de l'utilisateur pour la connexion.
                        header('Location: /login');
                        exit();

                    } else {
                        $this->setError('input', ['passwordUpdate' => 'Le mot de passe n\'est pas identique au premier.']);
                    }
                // Si les données ne sont pas valides ont renvoie une liste d'erreur.
                } else {
                    $this->setError('input', $validation->errors);
                }
               
            }

            return $this->view('/users/passwordUpdateToken.html.twig', []);
        
        // Si les conditions ne sont pas valide on renvoie une erreur 404
        } else {
            return http_response_code(404);
        }
        

    }


    /**
     * Modification de mot de passe.
     */
    public function updatePassword()
    {

    }



}
