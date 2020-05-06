<?php
		session_start();
	require('conn.php');
	require('font.php');
	require('nbar.php');
	require('topbtn.php');

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style type="text/css">
		body{
			margin: 0;
			font-size: 18px;
		}
		td,th{
			padding: 5px;
		}
		#p{
			width: 100%;
			margin-left: /*25px*/ auto;
			margin-top: 3%;
			margin-bottom: 6%;
			border-color: #060042;
			text-align: center;
			border-spacing: 0;
		}
	</style>
</head>
<body>

	<div class="row">
		<div class="col-lg col-sm">
			<table border="8px" id="p">
		<tr>
			<th><b><i>SUBJECT</i></b></th>
			<th><b><i>MENTORS</i></b></th>
			<!-- <th><b><i>DETAILS</i></b></th> -->
		</tr>
		<tr>
				<?php 
					$sql="SELECT * from `staff` ";
					$res=mysqli_query($conn,$sql);
					while ($row=mysqli_fetch_assoc($res)){
				?>
			<td>
					<?php
						echo $row['subject'];
					?>
			</td>
			<td>
				<a href="about.php?name=<?php echo $row["name"];?>" id="demo">
				<button onclick="myFunction()"><?php echo $row["name"]?>
					</button>
				</a>
			</td>
		</tr>
				<?php
					}
				?>
	</table>
	<?php
		require('footer.php');
	?>	
		</div>
	</div>
</body>
</html>