<?php
require('conn.php');
require('bstrap.php');
require('font.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		#color{
		background-color:#060042;
	}
	#txt,#navbarDropdown{
		color: green;
		justify-content: center;
		text-align: center;
		font-size: 18px; 
	}
	.nav-item{
		width: 100px;
	}
	li {
		list-style-type: none;
		text-align: center;
		}
	button{
		font-variant: small-caps;
	}
	a{
		color: white!important;
	}
	.dropdown-toggle:focus{
		color: white;
		background-color: #060042!important;
	}
	a:active ,.dropdown-item{
		color: black!important;
		background-color: green;
	}
	#brand{
		width: 50px;
		margin: 0;
	}
	#toggle{
		background-image: url(icons/toggle.png);
	}
	</style>
</head>
<body>


<nav class="navbar navbar-expand-lg " id="color">
  <a class="navbar-brand" href="home.php" id="logo"><img src="icons\brand.png" id="brand"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon" id="toggle"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	<ul class="navbar-nav m-auto nav-tabs nav-fill">
      <li class="nav-item active">
        <a class="nav-link" href="home.php"  id="txt">HOME <span class="sr-only"></span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="courses.php" id="txt">COURSES</a>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link" href="#"  id="txt">CENTERS</a>
      </li> -->
      <li class="nav-item">
        <a class="nav-link" href="staff.php" id="txt">SATFF</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="feedback.php"  id="txt">FEEDBACK</a>
      </li>
      <!-- <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          CENTERS
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">STAFF</a>
          <a class="dropdown-item" href="#">FEEDBACK</a>
          <div class="dropdown-divider"></div>
          
        </div>
      </li> -->
    </ul>
    <!-- <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form> -->
  </div>
</nav>
	
</div>

</body>
</html>