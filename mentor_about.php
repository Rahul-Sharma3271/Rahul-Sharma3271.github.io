<?php
include_once "res/content/main.php";
$name = $_GET['name'];
$search = mysqli_query($conn, "SELECT * FROM hcard WHERE name = '$name'");
$data = mysqli_fetch_assoc($search);
?>
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

    table {
        margin: 20px 10%;
        width: 80%;
        border: 1px solid #000;
    }

    th {
        border: 1px solid #fff;
        padding: 6px;
        color: #fff;
        background-color: green;
        text-align: center;
    }

    td {
        border: 1px solid #444;
        padding: 8px;
    }
</style>
<div class="p-4">
    <button class="btn btn-success" onclick="show(['analytics'])">Analytics</button>
    <button class="btn btn-success" onclick="show(['update-students'])">Update Students</button>
</div>
<div id="analytics" class="p-4 view">
    <h4>Analytics</h4>
    <div>
        <table>
            <th>SNo.</th>
            <th>Test</th>
            <th>Score</th>
            <th>Date</th>
            <th>Action</th>
            <?php
            //Samele test
            for ($x = 1; $x <= 10; $x++) {
                //
            ?>
                <tr>
                    <td><?php echo $x . "."; //sno
                        ?></td>
                    <td><?php echo "Sample Test"; //test_name
                        ?></td>
                    <td><?php echo rand(0, 10) . "/10"; //score
                        ?></td>
                    <td><?php echo rand(1, 31) . "-" . rand(1, 12) . "-" . rand(2000, 2020); //date
                        ?></td>
                    <td>
                        <button class="btn btn-primary float-right" onclick="//backend action">Update Results</button>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>
<div id="update-students" class="p-4 view">
    <h4>Update Students</h4>
    <button class="btn btn-primary" style="margin-left:10%;">Add More Students</button>
    <div>
        <table>
            <th>ID</th>
            <th>Name</th>
            <th>Username</th>
            <th>Action</th>
            <?php
            //Samele test
            for ($x = 1; $x <= 10; $x++) {
                //
            ?>
                <tr>
                    <td><?php echo $x; //id
                        ?></td>
                    <td><?php echo "Name"; //name
                        ?></td>
                    <td><?php echo "username"; //username
                        ?></td>
                    <td>
                    <button class="btn btn-danger float-right" onclick="//backend action">Remove</button>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>
<script>
    function hide() {
        let x = document.getElementsByClassName("view");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
    }
    hide();

    function show(ids) {
        hide();
        let x = document.getElementsByClassName("view");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        for (j = 0; j < ids.length; j++) {
            document.getElementById(ids[j]).style.display = "";
        }
    }
</script>

<div class="cards">
    <div class="card">
        <div class="card-img"><img class="w-100 p-3" style="max-width:500px;max-height: 500px;" src="res/images/<?php echo $data['image']; ?>" alt=""></div>
        <div class="card-body">
            <div class="card-title">
                <h2><?php echo $data['name']; ?></h2>
            </div>
            <div style="max-width: 460px;">
                <p><?php echo $data['about']; ?></p>
            </div>
        </div>
        <div>
            <input type="submit" name="contact" id="lft" style="float: left; margin-left:15px;padding: 3px;margin-bottom: 15px;background-color: lightgreen;" value="<?php echo $data['contact']; ?>">
            <input type="submit" style="float: right;margin-right: 15px;padding: 3px;margin-bottom: 15px;background-color: lightgreen;" name="email" value="<?php echo $data['email']; ?>">
        </div>
    </div>
    <!--
    < ?php
        $row["name"]= $_GET['name'];
        $sname = $row ["name"];

        $sql = "SELECT * from hcard";
        $res = mysqli_query($conn,$sql);
        while ($row= mysqli_fetch_assoc($res)) {
            while($sname==$row["name"]) {
    ?>
        <div class="flip-card">
        <div class="flip-card-front">
            <img src="res/images/< ?php echo $row['image']; ?>">
        </div>  
            <div class="flip-card-back">
                <h2 style="text-align: center">< ?php echo $row["name"]; ?></h2>
                <h2 style="text-align: center">< ?php echo $row["subject"];?></h2>
    < ?php        break;
        }
    }
    ?>
    -->
</div>


<?php
include_once "res/content/footer.php";
?>


<script>
    function myFunction() {
        document.getElementById("demo").innerHTML = "< ?php echo $_GET[\"name\"];  ?>";
    }
</script>
</body>

</html>