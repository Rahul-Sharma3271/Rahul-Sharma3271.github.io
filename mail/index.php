<?php
/* include('db.php');
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
      $output .= '<p><a href="http://localhost/Github/Rahul-Sharma3271.github.io/res/content/f-password.php?key=' . $key . '&email=' . $email . '&action=reset" target="_blank">http://localhost/Github/Github/Rahul-Sharma3271.github.io/res/content/f-password.php?key=' . $key . '&email=' . $email . '&action=reset</a></p>';
      $output .= '<p>-------------------------------------------------------------</p>';
      $output .= '<p>Please be sure to copy the entire link into your browser. The link will expire after 1 day for security reason.</p>';
      $output .= '<p>If you did not request this forgotten password email, no action is needed, your password will not be reset. However, you may want to log into your account and change your security password as someone may have guessed it.</p>';
      */
?>
<?php
//-----------------Munish's new code-------------------------

if (isset($_GET["action"])) {
	session_id("otp");
	session_start();
	$act = $_GET["action"];
	if ($act == "send-otp" && isset($_POST["email"])) {
		$_SESSION["otp"] = $otp = rand(100000, 999999);
		require_once '../res/phpmailer/PHPMailerAutoload.php';
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
		$mail->Subject = "Password Recovery - ITI.com";
		$mail->Body = 'Dear user,<br>Your OTP is:<h2>' . $otp . '</h2>Thanks,<br>ITI Team';
		$mail->addAddress($_POST["email"]);
		if (!$mail->Send()) {
			echo "Mailer Error: " . $mail->ErrorInfo;
		} else {
			header("location: ?action=submit-otp");
		}
	} else if ($act == "submit-otp" && isset($_SESSION['otp'])) {
		if (array_key_exists("otp-submit", $_POST)) {
			if ($_POST["otp"] == $_SESSION["otp"]) { ?>
				<b>Great! Correct otp..</b><br>
				Now ask Rahul Sharma to add some queries to modify the database.. <br>
				<a href="tmp.php">Go Back</a>
			<?php
				session_destroy();

				//Rahul Ji Add something to do here when otp is correct


			} else { ?>
				<b>Incorrect OTP.. Try Again</b>
		<?php
			}
		}
		echo "<div class='error'><p>An email has been sent to you with OTP to reset password.</p></div><br>";
		?>
		<form action="" method="post">
			Enter the otp: <br>
			<input type="number" name="otp">
			<button type="submit" name="otp-submit">Next</button>
		</form>
<?php
	} else {
		header(("location: tmp.php"));
	}
} else {
	header("location: tmp.php");
}
?>