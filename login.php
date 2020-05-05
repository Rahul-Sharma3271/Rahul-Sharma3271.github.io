<?php
require ('conn.php');
require ('font.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>login</title>
</head>

<meta name="viewport" content="width=device-width, initial-scale=1">


<style type="text/css">
	#a{
		padding-right: 30%;
		padding-left: 33%;
		padding-top: 7%;
		/*padding-bottom: 7%;*/
	}
	#b{			
  							/*box*/
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
	#fp{
		margin: 3%;
		margin-left: 75px;
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

}

</style>
<body>
		<div class="container-fluid p-0">
			<!-- <div class="d-sm-lg-flex"> -->
			<div class="row">
				<div class="col-lg">
				<div class="col">
					<div id="a">	
					<div id="b">
						<form action="logindb.php" method="POST"  id="f">
							<!-- <legend><img src="icons/login.png"></legend> -->
							<br><br><br>
						<!-- <p id="i"> -->
							<h1><img src="icons/login.png" class="float-left" width="150px" height="100px"> <!-- Login --> </h1>
						Username:&nbsp;<input type="text" name="uname" placeholder="Enter username"><br><br><br><br>
						Password:&nbsp;<input type="password" name="pwd" placeholder="Enter password"><br><br><br>
						<!--   <p>Password-2:<input type="password" name="pwd" placeholder="Re-Enter password"><br> -->
					
						<input class="d-inline-flex-sm" id="lef" type="submit" name="" value="LOGIN" id="btn">
						<input class="d-inline-flex-sm" id="rig" type="submit" name="" value="CANCEL" id="btn">
						<input class="d-inline-flex-sm" id="fp" type="submit" name="" value="FORGET-PASSWORD" id="btn">
					
					<!-- </p> -->
					</form>
				</div>
				</div>
			</div>
		<!-- </div> -->
		</div>
	</div>

</body>
</html>

