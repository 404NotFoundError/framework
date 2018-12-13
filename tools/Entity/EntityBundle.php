<?php

namespace Tool\Entity;

/**
 *
 */
trait EntityBundle
{

  /**
   * Renvoie la liste des propriéter de classe
   * @return array
   */
  public function getProperties()
  {
    return array_keys(get_class_vars(__CLASS__));
  }

  /**
   * Renvoie un tableau de la liste des valeur d'un objet
   * @return array
   */
  public function getValues()
  {

    $properties = $this->getProperties();

    foreach ($properties as $key => $property) {
      $values[$property] = $this->{$property};
    }

    return $values;

  }

}
