<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader(gọi file)
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

function send_mail($sent_to_email,$sent_to_fullname,$subject,$content,$option=array()){
    global $config;
    $config_email=$config['email'];
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug =0;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = $config_email['smtp_host'];                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = $config_email['smtp_user'];                     // SMTP username
        $mail->Password   = $config_email['smtp_pass'];                               // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = $config_email['smtp_port'];                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
        $mail->CharSet = 'UTF-8';
        
        if(!empty($option)){
            //Recipients(người nhận)
        $mail->setFrom($config_email['smtp_user'], $config_email['smtp_fullname']);//gửi từ...,tên người gửi
        $mail->addAddress($sent_to_email, $sent_to_fullname);     // Add a recipient(mail người nhận,tên người nhận)
        // $mail->addAddress('ellen@example.com');               // Name is optional
        $mail->addReplyTo($config_email['smtp_user'], $config_email['smtp_fullname']);//(phản hồi thì liên hệ với)
        // $mail->addCC($option['addCC']);
        // $mail->addBCC($option['addBCC']);
    
        // Attachments(đính kèm)
        // $mail->addAttachment($option['add_file']);         // Add attachments(đính kẹp 1tệp)
        // $mail->addAttachment($option['add_file'], $option['add_rename_file']);    // Optional name(sửa tên của tệp)
        }
        
    
        // Content(nội dung)
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $subject;//tiêu đề thư
        $mail->Body    = $content;//nội dung thư
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
        $mail->send();
       return true;
    } catch (Exception $e) {
        return "Email không được gửi. Chi tiết lỗi: {$mail->ErrorInfo}";
    }
}
// Instantiation and passing `true` enables exceptions
