<?php
include('db_connection.php');
login();
session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="icon" type="image/x-icon" href="images/favicon.ico">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<style>
	body{
		background-image: url("images/2.png");
		background-repeat: no-repeat;
		background-attachment: fixed;
		background-size: 100%;
	}
	#div2{
		float: right;
		border-radius: 50px;
		width: 450px;
		height: 350px;
		margin-top: 200px;
		font-size: 20px;
		color: black;
		background-color: whitesmoke;
		margin-right: 150px;
		text-align: center;
		
		
	}
	</style>
	
<title>Login page</title>
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
				<a class="nav-link"  href="contact.php">Contact</a>
				</li>
			
			</ul>
			</div>
		</nav>
	
	<div id="div2">
		<form method="post">
		<h2 style="text-align: center"><strong>LOGIN</strong></h2>
			<label for="username" style="padding-top: 30px">Username: </label>
			<input type="text" id="username" name="username" placeholder="Enter a username"><br>
			<label for="password" style="padding-top: 30px">Password: </label>
			<input type="password" id="password" name="password" placeholder="Enter a password"><br>
			<input type="submit" id="submit" name="submit" value=" Login" class="btn btn-dark btn-lg" style="margin-top: 30px"><br>
			
			<p style="padding-top: 50px"> Don't have an account? <a href="register.php"> Sign Up!</a></a></p>
			
  
		</form>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>