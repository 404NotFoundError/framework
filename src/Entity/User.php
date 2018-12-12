<?php

namespace App\Entity;

use Tool\Entity\EntityInterface;
use Tool\Entity\UserInterface;

/**
 * User Class
 */
class User implements EntityInterface, UserInterface
{

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

  public function setLastname(string $lastname)
  {
    return $this->lastname;
  }

  public function getFirstame()
  {
    return $this->firstname;
  }

  public function setFirstname(string $firstname)
  {
    return $this->firstname;
  }

  public function getEmail()
  {
    return $this->email;
  }

  public function setEmail(string $email)
  {
    return $this->email = $email;
  }

  public function getPassword()
  {
    return $this->password;
  }

  public function setPassword(string $password)
  {
    return $this->password = $password;
  }

  public function getRoles()
  {
    return $this->roles;
  }

  public function setRoles(array $roles)
  {
    return $this->roles = $roles;
  }


}
