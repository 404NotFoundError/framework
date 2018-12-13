<?php

namespace Tool\Cache;

/**
 *
 */
class CacheSystem
{

  public function __construct(string $dirname, int $duration)
  {

    return $this;
  }

  /**
   * Renvoie le contenue d'une page.
   * @return string
   */
  public function read()
  {

  }

  /**
   * Mise en cache
   * @return bool
   */
  public function write()
  {

  }

  /**
   * Supprimer un contenu du cache
   * @return bool
   */
  public function delete()
  {

  }

  /**
   * Néttoie tout le cache
   * @return bool
   */
  public function clear()
  {

  }



}
