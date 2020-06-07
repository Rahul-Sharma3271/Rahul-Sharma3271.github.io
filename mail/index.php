<?php
include_once "../res/content/conn.php";
require '../res/phpmailer/PHPMailerAutoload.php';
// include('db.php');
if (isset($_POST["email"]) && (!empty($_POST["email"]))) {
   $email = $_POST["email"];
   $email = filter_var($email, FILTER_SANITIZE_EMAIL);
   $email = filter_var($email, FILTER_VALIDATE_EMAIL);
   $error="";
   
      $expFormat = mktime(
         date("H"),
         date("i"),
         date("s"),
         date("m"),
         date("d") + 1,
         date("Y")
      );
      $expDate = date("Y-m-d H:i:s", $expFormat);
      $key = md5(2418 * 2);
      $addKey = substr(md5(uniqid(rand(), 1)), 3, 10);
      $key = $key . $addKey;
      // Insert Temp Table
      mysqli_query($conn, "INSERT INTO `password_reset` (`email`, `key`, `expDate`) VALUES ('" . $email . "', '" . $key . "', '" . $expDate . "');");
      $output = '<p>Dear user,</p>';
      $output .= '<p>Please click on the following link to reset your password.</p>';
      $output .= '<p>-------------------------------------------------------------</p>';
      $output .= '<p><a href="mail/index.php?key=' . $key . '&email=' . $email . '&action=reset" target="_blank">res/content/f-password.php?key=' . $key . '&email=' . $email . '&action=reset</a></p>';
      $output .= '<p>-------------------------------------------------------------</p>';
      $output .= '<p>Please be sure to copy the entire link into your browser. The link will expire after 1 day for security reason.</p>';
      $output .= '<p>If you did not request this forgotten password email, no action is needed, your password will not be reset. However, you may want to log into your account and change your security password as someone may have guessed it.</p>';
      $output .= '<p>Thanks,</p>';
      $output .= '<p>ITI Team</p>';
      $body = $output;
      $subject = "Password Recovery - ITI.com";

      $email_to = $email;
      $mail = new PHPMailer();
      $mail->IsSMTP();
      $mail->Host = "smtp.gmail.com"; // Enter your host here
      $mail->Port = 587;
      $mail->SMTPSecure = 'tls';
      $mail->SMTPAuth = true;
      $mail->SMTPDebug = 1;
      $mail->Username = "rahul11sharma1999@gmail.com"; // Enter your email here
      $mail->Password = "zhbptmmevowzaffr"; //Enter your password here
      $mail->IsHTML(true);
      $mail->setFrom("rahul11sharma1999@gmail.com", "ITI-Manager");
      $mail->Subject = $subject;
      $mail->Body = $body;
      $mail->addAddress($email_to);
      if (!$mail->Send()) {
         echo "Mailer Error: " . $mail->ErrorInfo;
      } else {
         echo "<div class='error'><p>An email has been sent to you with instructions on how to reset your password.</p></div><br /><br /><br />";
      }
   }


