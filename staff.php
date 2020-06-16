<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php include_once "res/com/main.html"; ?>
	<title>Staff - Invention to Inovation</title>
</head>

<body>
	<?php include_once "res/com/header.html";
	include_once "res/com/conn.php";
	$result = mysqli_query($conn,"SELECT * FROM `teachers` WHERE `approved`=1");
	?>
	<br>
	<h3 style="text-align: center;">All Verified Teachers</h3>
	<div class="cards">

		<?php
		while ($row = mysqli_fetch_assoc($result)) {
		?>

			<div class="flip-card" style="max-width:90vw;max-height:90vw;">
				<div class="flip-card-inner">
					<div class="flip-card-front">
						<div style="background-image: url('teachers/images/<?php echo $row['username']; ?>.jpg');max-width:90vw;max-height:90vw;"></div>
					</div>
					<div class="flip-card-back">
						<h2 style="text-align: center"><?php echo $row['name']; ?></h2>
						<p style="text-align: center"><?php echo $row['email']; ?></p>
					</div>
				</div>
			</div>
		<?php
		}
		?>
	</div>
	<?php include_once "res/com/footer.html"; ?>
</body>

</html>