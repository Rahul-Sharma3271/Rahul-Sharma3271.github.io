<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<style type="text/css">
	#color{
		background-color:#060042;
	}
	#txt,#navbarDropdown{
		color: green;
	}
	.nav-item{
		width: 100px;
	}
	li {
		list-style-type: none;
		text-align: center;
		}
	#logo,button{
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
</style>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<body>


	<div class="col-lg">
		<nav class="navbar navbar-expand-lg  navbar-dark fixed-top"  id="color">
			<a class="navbar-brand" href="#" id="logo"><img src="icons\brand.png" id="brand"></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<div class="navbar-toggler-icon"></div>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav m-auto nav-tabs nav-fill">
					<li class="nav-item active">
						<?php
							// $conn=mysqli_connect('localhost','root','','iti');
							require ('conn.php');
							$sql="SELECT * from navbar ORDER BY `nid` ASC"; 
							$res= mysqli_query($conn,$sql);
							while ($row=mysqli_fetch_assoc($res)) {//how to pass the element at index 1 directly from the associative array?
						?>
					</li>

					<li class="nav-item">
						<a class="nav-link" href="#" id="txt"><span>
							<?php echo $row['navitem']; ?>
						</span>
						<span class="sr-only"> </span>
					</a>
					</li>

					<?php
						}
					?>

				</ul>				
			</div>




	<form class="form-inline my-2 my-lg-0">
		<input class="form-control mr-sm-2 w-50" type="search" placeholder="Search" aria-label="Search">
		<button class="btn btn-secondary my-0 my-sm-0" type="submit">Navigate</button>
	</form>

		</nav>
	</div>



</body>
</html>