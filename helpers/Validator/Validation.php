<?php

namespace Helper\Validator;

/**
 * Validator Class
 */
class Validation
{

  use ValidationConstraints;

  /**
   * Renvoie la liste des erreurs pour la validationd es données.
   * @var array, $errors
   */
  public $errors = [];

  /**
   * Validation de données.
   * @param array, $data, exemple : ['email' => [$_POST['email'], 'email'], 'password' => [$_POST['password'], 'required|integer']]
   * @return object\Validation-result 
   * 
   */
  public function __construct(array $data)
  {
     $response = [];
     // On réccupère la liste des contraintes pour chaque entrée.
     foreach ($data as $key => $value) {

       $contraints = explode('|', $value[1]);
       // On exécute la fonction pour vérifier chaque contrainte.
       foreach ($contraints as $key_contraints => $value_contraints) {
         // On la donnée n'est pas valider on renvoie une erreur
         if ($this->$value_contraints($value[0]) !== true){ $response[$key][$key_contraints] = $this->$value_contraints($value[0]);}
       }
       
     }
     // On retorune le résultat sous forme de tableau.
     return $this->errors = $response;
  }


  /**
   * Filtre les entrées
   * @param array $variables,
   */
  public static function filterVar(array $variables)
  {
     foreach ($variables as $key => $value) {
       $data[$key] = filter_var($value, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
     }
     return $data;
  }

  













}
