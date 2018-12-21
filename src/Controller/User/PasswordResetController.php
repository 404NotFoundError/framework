<?php 

namespace App\Controller\User;

use Tool\Controller;
use App\Entity\User;
use App\EntityManager\UserManager;
use Helper\Validator\Validation;

class PasswordResetController extends Controller 
{
    
    /**
     * Gestion de mot de passe oublier
     */
    public function forgotPassword()
    {
        // Soumission du formulaire
        if (isset($_POST['submit'])) {
            // Validation des données
            $validation = new Validation([
                'email' => [ $_POST['email'], 'required|email']
            ]);
            // Si on a des erreurs on renvoie la liste des erreurs
            if (!empty($validation->errors)) {
                $this->setErrors('input', $validation->errors);
            // Si on a pas d'erreur on vérifie que l'adresse email existe réellement
            } else {
                $email = $this->getTable(User::class)->search(['email' => ['=', $_POST['email']]])->getOne();
                // Si l'adresse email email on génére un token et on l'envoyer en mail
                if (!empty($email)) {
                    $this->setErrors('success', ' Vous aller recevoir sur votre adresse email un token d\'une validité de 5 minutes de générer un nouveau mot de passe.');
                // Si le token l'adresse email n'existe pas on renvoie un erreur    
                } else {
                    $this->setErrors('input', ['email' => 'Cette adresse e-mail n\' existe cette pas dans nos répertoires. Merci de vérifier l\'orthographe !']);
                }
            }


        }
        // Rendu du template 
        $this->view('/users/passwordForgot.html.twig', [

        ]);
    }

    /**
     * Modification de mot de passe.
     */
    public function updatePassword()
    {

    }



}
