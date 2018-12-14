<?php

/** DEFINED YOUR MIDDLEWARES HERE **/
/*
  Pourquoi j'utilise des middlewares dans cette applications ?
  - De façon générale sur un site web, ont besoin d'effectuer certaines
    action avant de laisser un utilsateur accerdé à une route donné. L'
    authentification illustre parfaitemeent cela. Concretement ont aura
    besoin de vériifer si un utilisateur est connecter avant de le laisser
    acheter un article par exemplde dans le cadre un site e-commerce.
    Les midllewares peut être accessible partout dans le code, mais pour 
    les utilisés dans les routes, il faudra les définir dans la constante
    ci-dessous.
*/

define('APP_MIDDLEWARES',[

  'auth' => 'SecurityMiddleware@index'

]);
