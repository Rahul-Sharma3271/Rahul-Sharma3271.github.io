<?php
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
.container {
    position: relative;
    width: 50%;
    display: inline-block;
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

.container:hover .overlay {
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
<div  class="container container-fluid p-0" >

  <img src="hcard/<?php echo $row['image']; ?>" alt="Avatar" class="image"><!-- echo name of image -->
  <div class="overlay">
    <div class="text"> 
    	<h2 style="text-align: center"><?php echo $row['name']; ?></h2>
    	<p style="text-align: center"><?php echo $row['title']; ?></p>
    	<p style="text-align: center"><?php echo $row['email']; ?></p>
    	
    </div>
  </div>
</div>
<br>
<br>
<?php
        }
      ?>
</body>
</html>
