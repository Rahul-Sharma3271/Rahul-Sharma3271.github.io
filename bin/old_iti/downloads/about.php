<?php
	// session_start();

	// 	if (isset($_SESSION['name'])) {
	// 		header('location: home.php');
	// 		exit();
	// 	}

	// 	$name = $_SESSION['name'];
	// 	// $url = "index.php ? name =" . $name;
		// echo $_SESSION["var"];

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<div id="demo"></div>
<button onclick="myFunction()">Show recieved name</button>
<script>
	function myFunction() {
		document.getElementById("demo").innerHTML = "<?php echo $_GET["name"];  ?>";
	}
</script>


</body>
</html>