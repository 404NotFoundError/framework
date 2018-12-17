<?php 

namespace Tool\Security;

/**
 * XXS
 * CRSF
 * SESSION FAILURES
 * CRLF
 */
class FailureSecurityBundle 
{

   /**
    * Filtrage de toutes les possibilié d'entré de donnée dans l'application
    */
   public static function filterEntry() : void
   {
      $_GET     = \Helper\Validator\Validation::filterVar($_GET);
      $_POST    = \Helper\Validator\Validation::filterVar($_POST);
      $_COOKIE  = \Helper\Validator\Validation::filterVar($_COOKIE);
      $_SESSION = \Helper\Validator\Validation::filterVar($_SESSION);
      $_ENV     = \Helper\Validator\Validation::filterVar($_ENV);
      $_SERVER  = \Helper\Validator\Validation::filterVar($_SERVER);
      $_REQUEST = \Helper\Validator\Validation::filterVar($_REQUEST);
   }
   
   /**
    * Génération de automatique de token en cas de besoin
    */
   public static function generateToken() : void
   {
      if (!isset($_SESSION['token'])) {
         $_SESSION['token'] = hash('sha512', time() + rand(122, 10000) * 1.5 . "trop cool" . rand(130, 900) / 3 . "le token");
      }
   }

   /**
    * Génération de ticket pour la protection contre le vol de session
    * @param string $url, l'url de redirection si les tickets sont invalides
    * Je vérifie si l'utilisaeur n
    */
   public static function generateTicket(string $url) : void
   {

      // unset($_SESSION['ticket']);
      // unset($_COOKIE['ticket']); die;

      // Génération d'un ticket de session.
      // if (!isset($_SESSION['ticket'])) {
      //    $ticket = session_id().microtime().rand(0,9999999999);
      //    $ticket = hash('sha512', $ticket);
      //    setcookie('ticket', $ticket, time() + (60 * 20));
      //    $_SESSION['ticket'] = $ticket;
      //    header("Location: " . $_SERVER['REQUEST_URI']);
      //    exit();
      // } elseif ($_SESSION['ticket'] === $_COOKIE['ticket']) {
      //    $ticket = session_id().microtime().rand(0,9999999999);
      //    $ticket = hash('sha512', $ticket);
      //    $_COOKIE['ticket']  = $ticket;
      //    $_SESSION['ticket'] = $ticket;
      // } else {
      //    setcookie('ticket', $ticket, time());
      //    unset($_SESSION['ticket']);
      //    header("Location: " . $url);
      //    exit();
      // }

      // if ($_SESSION['ticket'] === $_COOKIE['ticket']) {
      //    echo "same";
      // } else {
      //    echo "different";
      // }
      
      // app_debug([
      //    $_SESSION['ticket'],
      //    $_COOKIE['ticket']
      // ]);

   }
    


}
