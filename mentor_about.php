<?php
    include_once "res/content/main.php";
    $name = $_GET['name'];
    $search = mysqli_query($conn,"SELECT * FROM hcard WHERE name = '$name'");
    $data = mysqli_fetch_assoc($search);
?>
<div class="cards">
    <div class="card">
        
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
        document.getElementById("demo").innerHTML = "< ?php echo $_GET["name"];  ?>";
    }
</script>
</body>

</html>