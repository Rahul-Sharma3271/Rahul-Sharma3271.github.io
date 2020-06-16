<?php
function send_mail($mail_to,$mail_subject,$mail_body,$dir=""){
    require_once $dir.'res/mail/PHPMailerAutoload.php';
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 587;
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth = true;
    $mail->Username = "rahul11sharma1999@gmail.com";
    $mail->Password = "zhbptmmevowzaffr";
    $mail->IsHTML(true);
    $mail->setFrom("rahul11sharma1999@gmail.com", "ITI-Manager");
    $mail->Subject = $mail_subject;
    $mail->Body = $mail_body;
    $mail->addAddress($mail_to);
    if ($mail->Send())
        return true;
    else
        return false;
}
?>