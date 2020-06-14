
	<?php 

		require ('res/content/conn.php');
		if (isset($_GET['status'])) {
			echo $_GET['status'];
		}

	 
		session_start();
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$uname = $_POST['username'];
			$pwd = $_POST['password'];
			// echo "ooo";
			$sql = "SELECT * FROM mentors WHERE username='$uname' AND password='$pwd'";

			$result = mysqli_query($conn, $sql); 
			$status = mysqli_num_rows($result); //true for 1, false for 0 or 2
			
				if ($status == 1) {
					$_SESSION['login_user'] = $uname;
					// echo "DOnee";
					//header('Location: member.php');
					echo"Login Success";			
				}
				else {
					echo $error = "Your Login Name or Password is invalid";
					echo"Failed";
					//header('Location: client.php');
				}
		}


?>
