<?php include_once "res/content/main.php"; ?>
<style>
    .profile-card {
        margin: 20px 10%;
        padding: 20px;
        border: 1px solid #666;
        display: flex;
        flex-wrap: wrap;
    }

    .profile-img {
        width: 100px;
        margin: 0 20px 20px 0;
        min-height: 120px;
        border: 1px solid #333;
    }
    table{
        margin: 20px 10%;
        width: 80%;
        border:1px solid #000;
    }
    th{
        border:1px solid #fff;
        padding: 6px;
        color: #fff;
        background-color: green;
        text-align: center;
    }
    td{
        border:1px solid #444;
        padding: 8px;
    }
</style>
<div class="profile-card">
    	<?php
    		$sql= "SELECT * from studentsignup";
    		$res= mysqli_query($conn, $sql);
    		while ($row = mysqli_fetch_assoc($res)) {
    	?>
    <div>
        <img src="<?php echo $row['image'];//url to image from backend ?>" alt="Profile Picture" class="profile-img"><br>
        <button class="btn btn-success btn-sm" onclick="//backend here">Change Photo</button>
    </div>
    <div>
        <h3><?php echo $row['name']; //name ?></h3>
        Username: <?php echo $row['username'];//username ?><br>
        Email: <?php echo $row['email'];//Email ?>
        Contact No. <?php echo $row['contact'];//Phone ?>
    </div>
    <?php
    	}
    ?>
</div>
<div>
    <table>
        <th>SNo.</th>
        <th>Test</th>
        <th>Score</th>
        <th>Date</th>
        <?php
            //Samele test
            for($x=1;$x<=10;$x++){
            //
        ?>
        <tr>
            <td><?php echo $x.".";//sno?></td>
            <td><?php echo "Sample Test";//test_name?></td>
            <td><?php echo rand(0,10)."/10";//score?></td>
            <td><?php echo rand(1,31)."-".rand(1,12)."-".rand(2000,2020);//date?></td>
        </tr>
            <?php } ?>
    </table>
</div>

<?php include_once "res/content/footer.php"; ?>
</body>

</html>