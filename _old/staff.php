<?php
require ('conn.php');
require ('topbtn.php');
require ('font.php');
require ('nbar.php');
$sql= "SELECT * from hcard";
$res= mysqli_query($conn,$sql); 
?>



<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
/*body {*/
/*  font-family: Arial, Helvetica, sans-serif;
}
*/
.flip-card {
  background-color: transparent;
  width: 450px;
  height: 450px;/*
  border:8px solid #060042;
  border-radius: 10px;*/
  perspective: 1000px;
  position: relative;
  display: inline-block;
  margin: 5%;

}

.flip-card-inner {
  position: relative;
  width: 100%;
  height: 100%;
  text-align: center;
  transition: transform 0.6s;
  transform-style: preserve-3d;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
}

.flip-card:hover .flip-card-inner {
  transform: rotateY(180deg);
}

.flip-card-front, .flip-card-back {
  position: absolute;
  width: 100%;
  height: 100%;
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
}

.flip-card-front {
  background-color: #060042;
  color: black;
}

.flip-card-back {
  /*background-color: #2980b9;*/
  background-color:#060042;
  color: white;
  transform: rotateY(180deg);
  text-align: center;
  padding-top: 35%;
}
</style>
</head>
<body>
  &nbsp;
  &nbsp;
  &nbsp;
<?php
    while ($row=mysqli_fetch_assoc($res)) {
?>

<!-- <div class="col-lg-3"> -->
<div class="flip-card" style="box-shadow: 10px 10px 20px #060042;">
  <div class="flip-card-inner">
    <div class="flip-card-front">
      <img src="hcardc/<?php echo $row['image']; ?>" alt="Avatar" style="width:450px;height:450px;">
    </div>
    <div class="flip-card-back">
     
<h2 style="text-align: center"><?php echo $row['name']; ?></h2>
      <p style="text-align: center"><?php echo $row['title']; ?></p>
      <h5 style="text-align: center"><?php echo $row['email']; ?></h5>

    </div>
  </div>
</div>

<!-- </div> -->

  &nbsp;
  &nbsp;
  &nbsp;
<?php 
    }
?>
</body>
</html>