<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Mail
{
    public static function send($fromMail, $title, $message)
    {
        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'websitepvh@gmail.com';
            $mail->Password   = 'bvvkzmzfocnftmys';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port       = 465;

            //Recipients
            $mail->setFrom('websitepvh@gmail.com', 'ShopQuanAo24h');
            $mail->addAddress($fromMail, "Người dùng");
            // $mail->addAddress('ellen@example.com');               
            // $mail->addReplyTo('info@example.com', 'Information');

            // Mail để xem lại những gì đã gửi( gửi 1 bản sao vào mail này)
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');


            // ĐÍnh kèm file
            // $mail->addAttachment('/var/tmp/file.tar.gz');         
            // Đường dẫn hình ảnh
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    

            //Content
            $mail->isHTML(true);
            $mail->Subject = $title;
            $mail->Body    = $message;
            // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
