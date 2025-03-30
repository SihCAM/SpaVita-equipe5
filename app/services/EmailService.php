<?php
namespace App\Services;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/../lib/phpmailer/src/Exception.php';
require_once __DIR__ . '/../lib/phpmailer/src/PHPMailer.php';
require_once __DIR__ . '/../lib/phpmailer/src/SMTP.php';

class EmailService {
    public static function envoyerEmail($to, $subject, $bodyHtml, $bodyText = '') {
        $mail = new PHPMailer(true);

        try {
            // Serveur SMTP de o2switch
            $mail->isSMTP();
            $mail->Host = 'mail.nathansaccol.fr';
            $mail->SMTPAuth = true;
            $mail->Username = 'no-reply@nathansaccol.fr';
            $mail->Password = '2ulvDoHWg4zq';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // SSL
            $mail->Port = 465;

            // Expéditeur
            $mail->setFrom('no-reply@nathansaccol.fr', 'SpaVita');
            $mail->addAddress($to);

            // Contenu du mail
            $mail->isHTML(true);
            $mail->Subject = "=?UTF-8?B?" . base64_encode($subject) . "?=";
            $mail->Body    = $bodyHtml;
            $mail->AltBody = $bodyText ?: strip_tags($bodyHtml);

            $mail->send();
            return true;
        } catch (Exception $e) {
            error_log("Erreur lors de l'envoi de l'e-mail : {$mail->ErrorInfo}");
            return false;
        }
    }
}