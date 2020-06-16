<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php include_once "res/com/main.html"; ?>
	<title>Courses - Invention to Inovation</title>
</head>

<body>
	<?php
	include_once "res/com/header.html";
	include_once "res/com/conn.php";
	$result = mysqli_query($conn, "SELECT * FROM `courses`");
	?>
	<br>
	<h3 class="text-center">All Courses</h3>
	<div style="margin:10px 10%;">
	<table>
		<th>Course</th>
		<th>Teacher Name</th>
	<?php while ($row = mysqli_fetch_assoc($result)) { ?>
		<tr>
			<td><?php echo $row["name"];?></td>
			<td><?php echo $row["teacher"];?></td>
		</tr>
	<?php } ?>
	</table>
	</div>
	<?php include_once "res/com/footer.html"; ?>
</body>

</html>