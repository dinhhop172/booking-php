<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require '../../vendor/autoload.php';
    
    class SendMail {

        public function sendtoemail($email, $name, $body)
        {
            $mail = new PHPMailer(true);
                       
            try {
                $mail->SMTPDebug = 0;
                $mail->isSMTP();                                           
                $mail->Host       = 'smtp.gmail.com';                   
                $mail->SMTPAuth   = true;                                   
                $mail->Username   = 'kayleight1702@gmail.com';                     
                $mail->Password   = 'bwzneolalwwhkekl';                             
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;          
                $mail->Port       = 587;                            
                $mail->SMTPSecure = 'tls';

                $mail->setFrom('from@example.com', 'Mailer');
                $mail->addAddress($email, $name);
                $mail->isHTML(true);
                
                $mail->Subject = 'Email verification';
                $mail->Body    = $body;
            
                $mail->send();
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        }
    }
?>