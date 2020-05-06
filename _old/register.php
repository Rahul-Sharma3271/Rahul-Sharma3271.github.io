<?php
require ('conn.php');
require ('font.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>register</title>
</head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<style type="text/css">
	#a{
		padding-right: 30%;
		padding-left: 33%;
		padding-top: 7%;
		/*padding-bottom: 10%;*/
	}
	#b{
  
	  /*background-image: linear-gradient(rgba(0,0,0,.4),rgba(0,0,0,.4)),  url("icons/P_PREVIEW.png");*/
	  
	  width: 80%;
	  height: 500px;
	  border: 7px solid black;
	  border-radius: 30%;
	  box-shadow: 17px -17px 50px black;
	  /*padding: 10%;*/
	  /*margin: 20px;*/
	  font-size: 20px;
	  padding-top: 0;
	}
	 
	#btn{
		height:30px;
		/*align-self: center;*/
	  	cursor: pointer; 
	}
	body{
		margin:0;
	}
	#lef{
		float: left;
		margin-left: 10%;

	}
	#rig{
		float: right;
		margin-right: 28%;

	}
	#f{
		padding-left: 15%;
	}
	img{
		margin-left: 80px;
		margin-top: 0;
	}
	h1{
		margin-top: 0;
		padding: 0; 
	}


.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

@media screen and (max-width: 600px) {
  .col-25, .col-75 {
    width: 100%;
    margin-top: 0;
  }



</style>
<body>
		<div class="container-fluid p-0">
			<div class="row">
				<div class="col-lg-sm col-sm-1">
					<div id="a">	
					<div id="b"> 
						<form action="registerdb.php" method="POST" id="f">
							<br><br><br>
						<h1><img src="icons/rregister.png" class="float-left" width="150px" height="100px"> <!-- Register --> </h1>
						Username:&nbsp;<input class="input-lg" type="text" name="uname" placeholder="Enter username"><br><br><br><br>
						Password:&nbsp;<input type="password" name="pwd" placeholder="Enter password"><br><br><br>
						<!-- <p>Password-2:<input type="password" name="pwd" placeholder="Re-Enter password"><br> -->
						<input id="lef" type="submit" name="" value="REGISTER" id="btn">
						<input id="rig" type="submit" name="" value="CANCEL" id="btn">
					</form>
						</div>
					</div>
				</div>
			</div>
		</div>
</body>
</html>

