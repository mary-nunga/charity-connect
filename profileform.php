<?php
session_start();
include('db_connection.php');


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    profile();
}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="icon" type="image/x-icon" href="images/favicon.ico">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<style>
	body{
		background-image: url("images/donate.png");
		background-repeat: no-repeat;
		background-attachment: fixed;
		background-size: cover;
	}
	#div2{
		float: left;
		border-radius: 50px;
		width: 450px;
		height: 500px;
		margin-top: 140px;
		font-size: 20px;
		color: black;
		background-color: whitesmoke;
		margin-left: 150px;
		text-align: center;
		
	}
	#div3{
		clear: both;
		text-align: center;
		margin-top: 50px;
		margin-bottom: 20px;
	}
	select{
		width: 250px;
	}
	#date{
		padding-right: 100px;
	}
	
	</style>
	
<title>Profile Addition page</title>
</head>

<body>
	<nav class="navbar navbar-expand-sm bg-light navbar-light fixed-top">
	<div id="div1" class="container-fluid">
		<img src="images/logo.jpg" width="67" height="46" class="navbar-brand">
		<ul class="navbar-nav">
			<li class="nav-item">
				<a class="nav-link" href="index.php">Home</a>
				</li>
			<li class="nav-item">
				<a  class="nav-link" href="aboutus.php">About Us</a>
				</li>
			<li class="nav-item">
				<a class="nav-link"  href="#contact">Contact</a>
				</li>
			
			</ul>
			</div>
		</nav>
	
	<div id="div2">
		<form method="post" enctype="multipart/form-data">
		<h2 style="text-align: center"><strong>PROFILE ADDITION FORM</strong></h2>
		<p style="text-align: center">&nbsp;</p>
			<p>
				
			 <label for="name" style="padding-right: 70px"> Name: </label>
			  <input type="text" id="name" name="name" placeholder="Enter the name">
		  </p>
		  <p><br>
			  
			  <label for="title" style="padding-right: 90px"> Title: </label>
			  <input type="text" id="title" name="title" placeholder="Enter the name"><br>
			  
		  </p>
			<p><br>
			  <label for="story" style="padding-right: 30px">Description: </label>
			  <textarea name="story" id="story"></textarea>
		  </p>
			<p><br>
			  <label for="image" style="padding-left: 20px">Image: </label>
			  <input type="file" id="image" name="image">
			  
			  <input type="submit" id="submit" name="submit" value="Submit" class="btn btn-dark btn-lg" style="margin-top: 30px">
				
		  </p>
			<div id="div3"><a href="manageprofile.php" class="btn btn-dark btn-lg">Back</a></div>
			
			</form>
	</div>
	
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
	
</body>
</html>