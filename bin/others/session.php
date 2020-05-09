<?php
	// session_start();

	// if (isset($_SESSION['username'])) {
	// 	$url = "about.php";
	// 	header(string: 'location : ' . url);
	// 	exit();
	// }
	// else if (isset($_POST['name'])) {
	// 	$name = $_POST['name'];
	// 	$_SESSION['name'] = $name;
	// 	$url = "about.php";
	// 	header(string: 'location: '. url);
	// 	exit();
	// }
?>




<?php

	if (isset($_SESSION['username'])) {
		$url = "about.php";
		header("location :"  . url);
		exit();
	}
	else if (isset($_POST['name'])) {
		$name = $_POST['name'];
		$_SESSION['name'] = $name;
		$url = "about.php";
		header('location: '. url);
		exit();
	}
		// session_destroy();
		// unset_session($_SESSION['name']);