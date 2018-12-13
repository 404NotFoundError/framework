<?php

namespace Tool\Security;

/**
 * UserInterface
 */
interface UserInterface
{

   public function getEmail();

   public function setEmail(string $email);

   public function getPassword();
   
   public function setPassword(string $password);
   
   public function getRoles();

   public function setRoles(array $roles);
   
   
}
