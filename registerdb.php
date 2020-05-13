<?php
include_once "res/content/main.php"; 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$uname = $_POST['username'];
	$pwd = $_POST['password'];
	$email= $_POST['email'];

	$sql= "INSERT into `registerdb` ( `uname`, `password`,`email`) values( '$uname', '$pwd','$email')";
	$res=mysqli_query($conn,$sql);
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