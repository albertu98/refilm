<?php
    include_once "mail/Mailer.php";

    class MailService
    {

        public static function sendVerificationEmail($user)
        {
            $mail = new Mailer(true);
            $mail->mailServerSetup();
            $mail->addRec(array($user->getEmail()), array(), array());
            $mail->addVerifyContent($user);
            $mail->send();
            $mail->smtpClose();
        }
    }