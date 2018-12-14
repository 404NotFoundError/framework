<?php

namespace Tool;

use Helper\Validator\Validation;

/**
 * Mother of Controllers.
 */
class Controller
{

  use \Tool\Mysql\MysqlEntityManager;
  
  /**
   * List of parameters
   * @var array, $params
   */
  protected $params = [];
  
  /**
   * List of errors
   * @var array, $errors
   */
  protected $errors = [];

  /**
   * Add new errors in error list
   * @var string $key, Error name
   * @var string-array $message, Error description
   */
  protected function setErrors(string $key, $value)
  {
    return $this->errors[$key] = $value;
  }
  
  /**
   * Renvoie une liste de paramètre pour les utilisateurs
   * @var array\Request-parameters
   */
  public function setParams(array $params)
  {
    foreach ($params as $key => $param) {
      $params[$key] = filter_var($param, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }
    
    return $this->params[] = $params;
  }

  /**
   * Filtre toutes les données post et get et les renvoies dans un tableau
   * Cette fonction à étét cerrer pour garder les contenu des formuliare dans leurs champs après la soumission
   * @return array
   */
  protected function filterPostGetData()
  {

    $data = [];

    $_POST = Validation::filterVar($_POST);
    $_GET  = Validation::filterVar($_GET);
    
    foreach ($_POST as $key => $value) { $data[$key] = $value; }
    foreach ($_GET as $key => $value) { $data[$key] = $value; }
    
    return $data;

  }

  /**
   * Render new twig view.
   * @param string $template, The template we want load.
   * @param array $parameters, The parameters.
   */
  protected function view(string $template, array $parameters)
  {
      // On ajoute la liste des erreurs
      $parameters['error'] = $this->errors;
      // On ajoute la liste des données POST et GET échapper.
      $parameters['input'] = $this->filterPostGetData();
      // Load twig classes.
      require_once '../vendor/twig/twig/lib/Twig/Loader/Filesystem.php';
      require_once '../vendor/twig/twig/lib/Twig/Environment.php';
      // Default path of templates
      $templates_path =   __dir__ . '/../templates/';
      $loader = new \Twig_Loader_Filesystem($templates_path);
      $twig = new \Twig_Environment($loader, array(
        'cache' => false, // or path to cache folder.
      ));
      // Render
      echo $twig->render($template, $parameters);
  }



}
