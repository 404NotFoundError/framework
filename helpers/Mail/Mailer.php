<?php 

namespace Helper\Mail;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

/**
 * Gestion des envoies de mail
 */
class Mailer 
{

    public function __construct($recipients, string $subject, string $content, bool $format = null)
    {

        $mail = new PHPMailer();                              

        $mail->SMTPDebug = 0;                                 // Enable verbose debug output
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
        // Si la connexion néccessite une autentification
        if (APP_SMTP_AUTH === true) {
            $mail->SMTPAuth = true;                           // Enable SMTP authentication
            $mail->Username = APP_SMTP_USERNAME;              // SMTP username
            $mail->Password = APP_SMTP_PASSWORD;              // SMTP password
        }
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = APP_SMTP_PORT;                          // TCP port to connect to
        $mail->isHTML($format);                               // Set email format to HTML
        $mail->setFrom(APP_MAIL, APP_NAME);                   // Recipients

        // Sujet
        $mail->Subject = $subject;

        // On rajoute la liste des destinataires
        if (is_array($recipients)) {
            foreach ($recipients as $key => $recipient) {
                $mail->addAddress($recipient);
            }
        } else {
            $mail->addAddress($recipients);
        }

        // Le contenu du mail
        $mail->Body = $content;

        // Envoie du mail
        $mail->send();

        // Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
       
     }

    
    
}
