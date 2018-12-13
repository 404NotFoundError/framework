<?php

namespace App\Entity;

use Tool\Entity\EntityInterface;

class Message implements EntityInterface
{
  
  use \Tool\Entity\EntityBundle;

  /**
   * @var int
   */
  private $id;

  /**
   * @var string
   */
  private $fullname;

  /**
   * @var string
   */
  private $email;

  /**
   * @var int
   */
  private $phone;

  /**
   * @var string
   */
  private $message;

  public function getId()
  {
    return $this->id;
  }

  public function getfullName()
  {
    return $this->fullname;
  }

  public function setFullName(string $fullname)
  {
    $this->fullname = $fullname;
    return $this;
  }

  public function getEmail()
  {
    return $this->email;
  }

  public function setEmail(string $email)
  {
    $this->email = $email;
    return $this;
  }

  public function getPhone()
  {
    return $this->phone;
  }

  public function setPhone(int $phone)
  {
    $this->phone = $phone;
    return $this;
  }

  public function getMessage()
  {
    return $this->message;
  }

  public function setMessage(string $message)
  {
    $this->message = $message;
    return $this;
  }


}
