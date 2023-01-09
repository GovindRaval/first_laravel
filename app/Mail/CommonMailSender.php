<?php

namespace App\Mail;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class CommonMailSender
{

    public function sendMail($from, $to, $subject, $message, $isMultipleRecipient = false, $ccEmail = [], $bccEmail = [])
    {
        require 'vendor/autoload.php'; // load Composer's autoloader
        $mail = new PHPMailer(true); // Passing `true` enables exceptions
        try
        {
            $mail->CharSet    = 'UTF-8';
            $mail->Encoding   = 'quoted-printable';
            /*
             *  Server settings
             */
            $mail->SMTPDebug  = 0; // Enable verbose debug output
            $mail->isSMTP(); // Set mailer to use SMTP
            $mail->Host       = 'mail.testrel.com'; // Specify main and backup SMTP servers
            $mail->SMTPAuth   = true; // Enable SMTP authentication
            $mail->Username   = 'test@testrel.com'; // SMTP username
            $mail->Password   = 'C$,XUazx{_fT'; // SMTP password
            $mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
            $mail->Port       = 587; // TCP port to connect to
            /*
             * Recipients
             */
            $mail->setFrom($from['email'], $from['name']);
            if ($isMultipleRecipient)
            {
                foreach ($to as $value)
                {
                    $mail->addAddress($value['email'], $value['name']); // Add a recipient, Name is optional
                }
            }
            else
            {
                $mail->addAddress($to['email'], $to['name']); // Add a recipient, Name is optional
            }
            //$mail->addReplyTo('your-email@gmail.com', 'Mailer');
            //$mail->addCC('his-her-email@gmail.com');
            //$mail->addBCC('his-her-email@gmail.com');
            if ($ccEmail && isset($ccEmail['email']))
            {
                $mail->addCC($ccEmail['email']);
            }
            if ($bccEmail && isset($bccEmail['email']))
            {
                $mail->addBCC($bccEmail['email']);
            }

            /*
             * Attachments (optional)
             */
            // $mail->addAttachment('/var/tmp/file.tar.gz');// Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');// Optional name
            /*
             * Content
             */
            $mail->isHTML(true); // Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = $message; // message
            if ($mail->send())
            {
                $status  = true;
                $message = "Mail sent successfully";
            }
            else
            {
                $status  = false;
                $message = "Mail not sent! Something went wrong";
            }
        }
        catch (Exception $e)
        {
            $status  = false;
            $message = $e->errorMessage();
        }
        
        return [
            'status'  => $status,
            'message' => $message
        ];
    }

}
