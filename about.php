<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<div id="demo"></div>
<!-- <button onclick="myFunction()">Show recieved name</button> -->

<?php
		echo $row["name"]= $_GET['name'];
?>
<script>
	function myFunction() {
		document.getElementById("demo").innerHTML = "<?php echo $_GET["name"];  ?>";
	}
</script>
</body>
</html>
<!-- <?php 
// 	$sql="SELECT * from teachers where";