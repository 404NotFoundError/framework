<?php

namespace Helper;

/**
 * Validator Class
 */
class Validator
{

  use ValidationConstraints;

  /**
   * Filtre les entrées
   * @param array $variables,
   */
  public function filterVar(array $variables)
  {
     foreach ($variables as $key => $value) {
       $data[$key] = filter_var($value, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
     }
     return $data;
  }

  /**
   * Validation de données.
   * @param array, $data
   * @return array, $response le résultat
   */
  public function validateData(array $data)
  {
     $response = [];
     // On réccupère la liste des contraintes pour chaque entré.
     foreach ($data as $key => $value) {
       $contraints = explode('|', $value[1]);
       // On exécute la fonction pour vérifier chaque contrainte.
       foreach ($contraints as $key_contraints => $value_contraints) {
         // On la donnée n'est pas valider on renvoie une erreur
         if ($this->$value_contraints($value[0]) !== true) $response[$key][$key_contraints] = $this->$value_contraints($value[0]);
       }
     }
     // On retorune le résultat sous forme de tableau.
     return $response;
  }














}
