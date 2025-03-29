<?php
session_start();
//checks if user is logged in if not it takes to login page

if(!isset($_SESSION['username'])){
	header("Location: login.php");
	exit();
}
include('db_connection.php');
//to see data in the db in a table first show username session
if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
	//then use select query to get data from db	
	$sql= "SELECT * FROM donations WHERE Donor= '$username'";
	//this runs the query and stores the output in db
	$result = mysqli_query($con,$sql);
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="icon" type="image/x-icon" href="images/favicon.ico">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<title>Home Page</title>
	<style>
		body{
			padding-top: 10px;
			background-color: cadetblue;
			background-size: 100%;
		}
		label{
			font-size: 40px;
		}
		nav{
			background-color: white;		
		}
		
		
		#div1{
			float: left;
			margin-top: 100px;
			margin-right: 30px;
			margin-left: 20px;
			margin-bottom: 500px;
			width: 180px;
			border: solid;
			border-radius: 10px;
			height: 300px;

		}
		#div2{
			
			text-align: center;
			float: right;
			margin-top: 40px;
			margin-left: 60px;
			margin-bottom: 40px;
			align-content: center;
			padding-right: 150px;
			width: 1200px;
			height: 100px;
			
				
		}
		#div3{
			float: right;
			padding-bottom: 20px;
			
			
		}
		#div4{
			padding-left: 5px;
			background-color: white;
			clear: both;
			margin-top: 40px;
			padding-bottom: 20px;
			
		}
		#welcome{
			margin-top: 80px;
			text-align: center;
			color: whitesmoke;
			font-family: 'Brush Script MT', cursive;
			font-size: 70px;
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
		
     <div id="div1" class="btn-group-vertical">
				<a href="home.php" class=" btn btn-secondary" ><strong>Dashboard</strong></a>
				<a href="profile.php" class=" btn btn-secondary"><strong>My Profile</strong></a>
				
	 </div>
	

<!--	this basically shows a welcome message with the users username-->
	<h2 id="welcome"><strong>WELCOME, <?php echo $_SESSION['username'];?>!</strong></h2>
	<div id="div2">
	
		<p>
		  <label><strong>MY DONATIONS</strong></label>
	    </p>
		<div id="div3">
		<a href="profileview.php" class=" btn btn-dark" ><strong>New Donation</strong></a>
		</div>
		
		<table style="background-color: whitesmoke" width="145%" border="1" align="center" class=" table table-sm table-bordered p-5 table-striped table-hover ">
		 <tbody>
			 <tr>
				 <th width="9%">Donation ID</th>
	             <th width="14%">Receipient Name</th>
                 <th width="12%">Amount Donated</th>
                 <th width="14%">Payment Method</th>
			 
			 </tr>
<!--here is where we put data from db in each row/column			 -->
			<?php
				 while($rows=$result->fetch_assoc()){
					?>
				 <tr>
<!--the data in quotes are the column names in db					 -->
					 <td><?php echo $rows['Donation_id'];?></td>
					 <td><?php echo $rows['Receipient_name'];?></td>
					 <td><?php echo $rows['Amount_donated'];?></td>
					 <td><?php echo $rows['Payment_method'];?></td>
			 
			    </tr>
			 <?php
				 }
				 ?>
			 </tr>

		</tbody>
		</table>
	</div>
	

	<div id="div4">
			<hr>
		<footer id="contact">
	<h3>Contact Us</h3>
	<p>Email: <a href="mailto:support@charityconnect.com">support@charityconnect.com</a></p>
	<p>Phone: +29394042040</p>
	<p>Adress: 123 Giving Street, Hope City</p>
	</footer>
	
	</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>