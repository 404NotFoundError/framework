<?php

namespace App\Entity;

use Tool\Entity\EntityInterface;
use Tool\Security\UserInterface;

/**
 * User Class
 */
class User implements EntityInterface, UserInterface
{
  
  use \Tool\Entity\EntityBundle;
  use \Tool\Security\UserSecurityBundle;

  /**
   * @var int
   */
  private $id;

  /**
   * @var string
   */
  private $lastname;

  /**
   * @var string
   */
  private $firstname;

  /**
   * @var string
   */
  private $email;

  /**
   * @var string
   */
  private $password;

  /**
   * @var array
   */
  private $roles;

  public function getId()
  {
    return $this->id;
  }

  public function getLastname()
  {
    return $this->lastname;
  }

  /**
   * @var string\User-lastname
   */
  public function setLastname(string $lastname)
  {
    $this->lastname = $lastname;
    return $this;
  }

  public function getFirstame()
  {
    return $this->firstname;
  }

  /**
   * @var string\User-firstname
   */
  public function setFirstname(string $firstname)
  {
    $this->firstname = $firstname;
    return  $this;
  }
  
  public function getEmail()
  {
    return $this->email;
  }

  /**
   * @var string\User-email
   */
  public function setEmail(string $email)
  {
    $this->email = $email;
    return $this;
  }

  public function getPassword()
  {
    return $this->password;
  }

  /**
   * @var string\User-password 
   */
  public function setPassword(string $password)
  {
    $this->password = $this->passwordCrypt($password);
    return $this;
  }

  public function getRoles()
  {
    return  unserialize($this->roles);
  }

  /**
   * @var array\User-roles 
   */
  public function setRoles(array $roles)
  {
    $this->roles = serialize($roles);
    return $this;
  }

  // Retorune la liste des roles de l'application
  public static function getRolesTypes() : array
  {
      // Roles has h
      foreach (array_keys(ROLES) as $key => $role) {
          if (!is_numeric($role)) {
              $roles[] = $role;
          }
      }

      // simple roel
      foreach (ROLES as $key => $role) {
          if (!is_array($role)) {
              $roles[] = $role;
          }
      }

      return $roles;
  }


}
