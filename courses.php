<?php
	include_once "res/content/main.php";
	session_start();
?>

<div class="m-4">
	<table style="border:8px solid #060042;" class="table w-100 my-4 text-center">
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
				<?php echo $row['subject']; ?>
			</td>
			<td>
				<a class="btn btn-success" href="mentor_about.php?name=<?php echo $row["name"];?>">
					<?php echo $row["name"]?>
				</a>
			</td>
		</tr>
		<?php } ?>
	</table>
</div>

<?php
	include_once "res/content/footer.php";
?>

</body>

</html>