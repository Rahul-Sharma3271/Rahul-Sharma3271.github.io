<?php

	//require('conn.php');
	require('bstrap.php');
	require('nbar.php');
	require('font.php');
	require('topbtn.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		
	</style>
</head>
<body>
	<div class="w-100 d-block" style="background-color: red; height: 450px; "> 
	<img id="c" src="icons\logo.png" style="height: 450px; width:100%; margin: 0; border:3px ridge #060042; box-shadow: 10px 10px 20px #060042;">
	</div>
	<!-- /*<div class="c"style="width: 450px;display: inline-block; ">*/ -->
	<?php
		require('card.php');
		// require('hcard.php');
	?>
	</div>
	<?php
		require('footer.php');
	?>
</body>
</html>