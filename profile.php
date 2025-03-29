<?php
include("db_connection.php");
session_start();

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="icon" type="image/x-icon" href="images/profile.png">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<title>Profile Page</title>
<style>
	body{
		background-color: cadetblue;
	}
	nav{
			background-color: whitesmoke;
	}
	h1{
		text-align: center;
	}
	
	#div1{
		margin-top: 170px;
		font-size: 30px;
		background-color: whitesmoke;
		padding: 30px;
		
	}
	#div2{
		clear: both;
		text-align: center;
		margin-top: 50px;
		margin-bottom: 20px;
	}
	#div3{
		background-color: whitesmoke;
		padding-bottom: 30px;
		padding-left: 20px;
	}
	
	</style>
</head>

<body>
		<nav class="navbar navbar-expand-sm navbar-light fixed-top">
	         <div class="container-fluid">
		         <img src="images/logo.jpg" width="67" height="46" class="navbar-brand">
	                  <ul class="navbar-nav">
			               <li class="nav-item">
				              <a class="nav-link" href="index.php"><strong>Home</strong></a>
				           </li>
			               <li class="nav-item">
				              <a  class="nav-link" href="aboutus.php"><strong>About Us</strong></a>
				           </li>
			               <li class="nav-item">
				               <a class="nav-link"  href="#contact"><strong>Contact</strong></a>
				           </li>
			              
		               </ul>
	          </div>
      </nav>
		
	<div id="div1">
		<h1><img src="images/profile.png" alt="User Profile"> </h1>
		<h2 id="welcome"><strong>WELCOME, <?php echo $_SESSION['username'];?>!</strong></h2>
	       <hr>
		<div id="div2"><a href="logout.php" class="btn btn-dark btn-lg">Logout</a></div>
				
	
	</div>
	<div id="div2"><a href="home.php" class="btn btn-dark btn-lg">Back</a></div>
	<div id="div3">
			<hr>
		<footer id="contact">
	<h3>Contact Us</h3>
	<p>Email: <a href="mailto:support@charityconnect.com">support@charityconnect.com</a></p>
	<p>Phone: +29394042040</p>
	<p>Adress: 123 Giving Street, Hope City</p>
	</footer>
	
	</div>
</body>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
	</script>
	
</html>