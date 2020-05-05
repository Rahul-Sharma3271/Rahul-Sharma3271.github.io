<?php
	require('conn.php');
	require('bstrap.php');
	if ($conn)
		echo "conn says YES!!";
	else
		echo "check conn";
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>lin</title>
</head>
    <meta name="viewport" content="width=device-width, initial-scale=1">

<style type="text/css">
		body {
			margin: 0;
			font-size: 18px;
		}
		form {
			padding: 100px;
			width: 80%;
			max-width: 800px;
			border: 5px red groove;
		}
	  .container {
            padding: 0 20px;
        }
</style>
<body>

	<div class="container">
		<form >
			<label for="uname">Username:</label>
			<input type="text" name="uname" placeholder="Enter Your Username"><br><br><br>
			<label for="pwd">Password:</label>
			<input type="password" name="pwd" placeholder="Setup-Password"><br><br><br>
			<input type="submit" name="" value="Log-In" id="btn">
			<input type="submit" style="margin-left: 90px;" name="" value="Reset" id="btn"><br><br>
			<label>Did you just </label><a href="f_pwd.php"> Forgot-Pssword </a><label>?</label>
		</form>
	</div>

</body>
</html>