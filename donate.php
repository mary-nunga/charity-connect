<?php
include('db_connection.php');
donate();
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
	
<title>Donation page</title>
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
		<form method="post">
		<h2 style="text-align: center"><strong>DONATION FORM</strong></h2>
			<label for="username" style="padding-top: 30px"> Receipient Name: </label>
			<input type="text" id="name" name="name" placeholder="Enter the recepients name"><br>
			<label for="amount" style="padding-top: 30px">Donation Amount: </label>
			<input type="number" id="amount" name="amount" placeholder="Enter amount"><br>
			<label for="payment_method" style="padding-top: 30px">Payment Method : </label>
			<select name="payment-method" id="payment-method" >
				<option>Select</option>
				<option>MPESA</option>
				<option>Card</option>
				<option>Paypal</option>
				
			</select><br>
			<label id="date" for="date" style="padding-top: 30px">Date: </label>
			<input type="date" name="date" id="date"><br>
			<input type="submit" id="submit" name="submit" value=" Donate" class="btn btn-dark btn-lg" style="margin-top: 30px"><br>
			<div id="div3"><a href="profileview.php" class="btn btn-dark btn-lg">Back</a></div>
			
			</form>
	</div>
	
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
	
</body>
</html>