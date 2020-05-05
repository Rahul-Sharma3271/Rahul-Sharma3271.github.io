<?php
require('font.php');
  $conn=mysqli_connect('localhost','root','','iti');
  $sql="SELECT * from hcard";
  $res=mysqli_query($conn,$sql);
?>
<!DOCTYPE html> 
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
  body{
    margin-left: 30%;
  }
  /*.row:after{
     content: "";
  display: table;
  clear: both;
  }*/
.col {
width: 450px; box-shadow: 10px 10px 20px #060042; 
    
}

.image {
  display: block;
  width: 100%;
  height: auto;
}

.overlay {
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  background-image: linear-gradient(rgba(0,0,0,.4),rgba(0,0,0,.4));
  overflow: hidden;
  width: 0;
  height: 100%;
  transition: .5s ease;
}

.col:hover .overlay {
  width: 100%;
}

.text {
  color: white;
  font-size: 20px;
  position: absolute;
  top: 50%;
  left: 50%;
  -webkit-transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
  white-space: nowrap;
}
</style>
</head>
<body>

<?php


    while ($row=mysqli_fetch_assoc($res)){
    //Let Condition Truue
// for($i=1;$i<10;$i++){
?>
<!-- <div class="row"> -->
<div  class="col p-0">

  <img src="hcard/<?php echo $row['image']; ?>" style="width: 450px; height: 450px; display: inline-block;" alt="Avatar" class="image"><!-- echo name of image -->
  <div class="overlay" style="">
    <div class="text"> 
      <h2 style="text-align: center"><?php echo $row['name']; ?></h2>
      <p style="text-align: center"><?php echo $row['title']; ?></p>
      <p style="text-align: center"><?php echo $row['email']; ?></p>
      <form action="ac.php" method="POST">
        <input type="submit" name="" value="View-More" style="margin-left: 90px;">
        <?php 
              $_SESSION['cid'] = $row['image'];
        ?>
      </form>
      
    </div>
  </div>
</div>
<br>
<br>
<?php
        }
 ?>


 <div>
  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
</div>
 </body>
</html>
 