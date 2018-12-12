<?php

namespace App\Controller;

use Tool\Controller;

/**
 * UserController Class
 */
class UserController extends Controller
{

  public function login()
  {

      
     return $this->view('user/login.html.twig', [

     ]);
  }

  public function register()
  {

  }

  public function profil()
  {

  }

  public function passworForget()
  {

  }




}
