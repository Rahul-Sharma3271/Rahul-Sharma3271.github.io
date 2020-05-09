<?php
include_once "res/content/main.php"; 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$uname = $_POST['username'];
	$pwd = $_POST['password'];

	$sql= "insert into `registerdb` ( `username`, `password`) values( '$uname', '$pwd')";
$res=mysqli_query($conn,$sql);
	if (!$res) {
		?>
		<div class="alert alert-danger" role="alert"> <?php echo"retry!"; ?> </div>
	<?php
	}
	else{
		?>
		<div class="alert alert-success" role="alert">
		 <!-- echo "Record Entered"; -->
<?php
	header("Location: registerdb.php? status= Record Entered..");
	}
}
?>
</div>


</body>
</html>