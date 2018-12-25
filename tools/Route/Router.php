<?php

namespace Tool\Route;

use Exception;

/**
 * Router Class
 */
class Router
{

  /**
   * List of routes
   * @var array, $routes
   */
  private $routes = [];

  /**
   *
   * @var string, $method
   */
  private $method;

  /**
   *
   * @var int, $offset
   */
  private $offset;

  /**
   * Create new route
   * @var string, $method
   * @var string, $path
   * @var string, $action
   * @return Router
   */
  public function create(array $method, string $path, string $action)
  {
    /** save path in route list **/
    $this->save($method, $path);
    /** recover controller and action **/
    $this->getControllerAndAction($action);

    return $this;
  }

  /**
   * Save a path a list route id path does not exist
   * @var string, $method
   * @var string, $newRoute
   */
  private function save($method, $newRoute)
  {

    // app_debug($this->routes);
    // app_debug($method, 1);

    /* Si on est en mode dev on vérifie si la route n'existe pas déjà */
    if (APP_MODE === 'dev') {

      foreach ($this->routes as $key => $value) {
        if ($value['path'] === $newRoute) die('The route  <strong>"' . $newRoute . '"</strong> already exist');
      }

    };

    /* Si le chemin n'existe pas dans la liste des routes */
    $index = count($this->routes);
    $this->method = $method;
    $this->routes[$index]['methods'] = $this->method;
    $this->routes[$index]['path'] = $newRoute;
    /* Le chemin de la route actuel est */
    $this->offset = $index;

    /* On retorune l'instance */
    return $this;

  }

  /**
   * Definition du controller et de la méthode pour une route
   * @var string, $action
   */
  private function getControllerAndAction(string $action)
  {
     $data = explode('@', $action);
     if (isset($data[1])) {
       $this->routes[$this->offset]['controller'] = $data[0];
       $this->routes[$this->offset]['action'] = $data[1];
     }else {
       die('<strong> "' . $action . '" </strong> is not a correct format, Try like this <strong> controllerName@methodName <strong>.');
     }
  }

  /**
   * Nommé une route
   * @param string $name
   * @return Router
   */
  public function name(string $name)
  {
    $this->routes[$this->offset]['name'] = $name;
    return $this;
  }

  /**
   * Décrire le contenue d'une route
   * @param string $name
   * @return Router
   */
  public function description(string $description)
  {
    $this->routes[$this->offset]['description'] = $description;
    return $this;
  }

  /**
   * Définitipn de la liste des middleware à utiliser
   * @param array, $middlewares
   * @return Router
   */
  public function middlewares(array $middlewares)
  {
    $this->routes[$this->offset]['middlewares'] = $middlewares;
    return $this;
  }

  /**
   * Retourne la liste des routes
   * @return Router
   */
  public function getRoutes()
  {
    return $this->routes;
  }



}
