<?php
require_once 'src/PHPMailer.php';
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );
    $mail->SMTPDebug = 0;
    $mail->isSMTP();
    $mail->CharSet = 'UTF-8';
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true; 
    $mail->Username   = 'huongngoc.developer@gmail.com';
    $mail->Password   = 'huong111@@@';
    $mail->SMTPSecure = 'tls';   // or ssl  
    $mail->Port       = 587;  // 465  

    $mail->setFrom('huongngoc.developer@gmail.com', 'SHOP0205');
    $mail->addAddress('duongvanthuong240598@gmail.com', 'Joe User');   
    $mail->addAddress('huongngoc.developer@gmail.com', 'Me');   

    $mail->addReplyTo('huongngoc.developer@gmail.com', 'SHOP0205');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    // Attachments
    $mail->addAttachment('../../temp/a.JPG'); 

    // Content
    $mail->isHTML(true);   
    $mail->Subject = 'SHOP0205 XÁC NHẬN ĐƠN HÀNG DHxxxxx';
    $total = 2000000;
    $mail->Body    = "
        This is the HTML message body <b>in bold!</b>
        <p style='color:red'>Test color</p>
        <p>$total</p>
        <img src='https://cdn.tgdd.vn/Products/Images/42/167535/TimerThumb/xiaomi-redmi-note-7-hpbd.jpg'>
    ";
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}