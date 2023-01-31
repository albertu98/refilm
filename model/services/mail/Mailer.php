<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function

//Load Composer's autoloader
    use PHPMailer\PHPMailer\PHPMailer;

    require '../vendor/autoload.php';

    class Mailer extends \PHPMailer\PHPMailer\PHPMailer
    {
        function mailServerSetup()
        {
            try {
                //Server settings
                $this->SMTPDebug = 0;                      //Enable verbose debug output
                $this->isSMTP();                                            //Send using SMTP
                $this->Host = 'smtp.gmail.com';                             //Set the SMTP server to send through
                $this->SMTPAuth = true;                                     //Enable SMTP authentication
                $this->Username = 'mailerphptest7@gmail.com';               //SMTP username
                $this->Password = 'ggueddhkwilkpruu';                       //SMTP password
                $this->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                $this->Port = 465;                                          //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$this->ErrorInfo}";
            }

        }

        function addRec($to, $cc, $bcc)
        {
            foreach ($to as $addr) {
                $this->addAddress($addr);
            }
            foreach ($cc as $addr) {
                $this->addCC($addr);
            }
            foreach ($bcc as $addr) {
                $this->addBCC($addr);
            }
        }

        function addAtt($att)
        {
            foreach ($att as $at) {
                $this->addAttachment($at);
            }
        }

        function addVerifyContent($user)
        {
            $this->isHTML(true);                                  //Set email format to HTML
            $this->Subject = 'Verificació email';
            $content = '<h1> Hi!' . $user->getFullName() . "</h1>";
            $content .= '<p>We just need to verify your email address before you can access REFILM. </p>';
            $content .= '<p>Verify your email address http://localhost/controller/verifyController.php?idUser=' . $user->getIdUser() . '&token=' . $user->getToken();
            $this->Body = $content;
        }
    }