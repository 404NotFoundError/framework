<?php

namespace Tool;

use Helper\Validator\Validation;
use Tool\Security\FailureSecurityBundle;

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
   * Render new twig view.
   * @param string $template, The template we want load.
   * @param array $parameters, The parameters.
   */
  protected function view(string $template, array $parameters)
  {
      // On ajoute la liste des erreurs
      $parameters['error'] = $this->errors;
      // On ajoute la liste des données POST et GET échapper.
      $parameters['post'] = $_POST;
      $parameters['get']  = $_GET;
      // On renvoie le jeton de l'utilisateur pour qu'il puisse être utiliser en dans les formuliares.
      if (isset($_SESSION['token'])) {
        $parameters['user']['token'] = $_SESSION['token'];
      }
      // Require twig classes.
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
