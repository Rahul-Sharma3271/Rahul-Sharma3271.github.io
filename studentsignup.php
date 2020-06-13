<?php
include_once "res/content/main.php"; 
	$conn = mysqli_connect('localhost','root','','iti') or die('TRY TO RECONNECT!');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$uname = $_POST['username'];
	$name = $_POST['name'];
	$email= $_POST['email'];
	$contact = $_POST['contact'];
	$pwd = $_POST['password'];

	$sql= "INSERT into `studentsignup` ( `username`,`name`,`email`,`contact`, `password`) values( '$uname', '$name', '$email', '$contact', $pwd')";
	$res = mysqli_query($conn,$sql);
	if (!$res) {?>
		<div class="alert alert-danger" role="alert"> <?php echo"retry!"; ?> </div><?php
	}
	else{?>
		<div class="alert alert-success" role="alert">
		 <?php echo "Record Entered"; ?></div><?php
		//header("Location: registerdb.php?status=Record Entered..");
	}
}
?>
</div>


</body>
</html>