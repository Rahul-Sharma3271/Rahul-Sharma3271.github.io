<?php
    include_once "res/content/main.php";
    $name = $_GET['name'];
    $search = mysqli_query($conn,"SELECT * FROM hcard WHERE name = '$name'");
    $data = mysqli_fetch_assoc($search);
?>
<div class="cards">
    <div class="card">
        <div class="card-img"><img class="w-100 p-3" style="max-width:500px;" src="res/images/<?php echo $data['image'];?>" alt=""></div>
        <div class="card-body">
            <div class="card-title"><h2><?php echo $data['name'];?></h2></div>
            <p><?php echo $data['subject'];?></p>
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
        document.getElementById("demo").innerHTML = "< ?php echo $_GET["name"];  ?>";
    }
</script>
</body>

</html>