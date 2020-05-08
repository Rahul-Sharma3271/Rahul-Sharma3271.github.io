<?php
	$sql = "SELECT * from hcard";
	$res = mysqli_query($conn,$sql);
?>

<div class="cards">

	<?php
		while($row = mysqli_fetch_assoc($res)){
	?>

	<div class="flip-card">

		<div class="flip-card-inner">

			<div class="flip-card-front">
				<img src="res/images/<?php echo $row['image']; ?>">
			</div>

			<div class="flip-card-back">
				<h2 style="text-align: center"><?php echo $row['name']; ?></h2>
				<p style="text-align: center"><?php echo $row['title']; ?></p>
				<p style="text-align: center"><?php echo $row['email']; ?></p>
			</div>

		</div>

	</div>

	<?php
		}
	?>

</div>