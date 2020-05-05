<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<?php
	print_r($_POST);
if (isset($_REQUEST['uname']) && ($_REQUEST['pwd'])) {
echo $_REQUEST['uname'];
echo $_REQUEST['pwd'];
}

?>

</body>
</html>