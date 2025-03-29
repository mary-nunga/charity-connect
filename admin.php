<?php
session_start();
include('db_connection.php');
if((!isset($_SESSION['username']) || $_SESSION['username'] !== 'admin') && (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin'))
{
	header("Location:login.php");
	exit();
}
$sql="SELECT * FROM donations";
$result=mysqli_query($con,$sql);
$sql="SELECT * FROM users";
$rs=mysqli_query($con,$sql);
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="icon" type="image/x-icon" href="images/favicon.ico">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<title>Admin Page</title>
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
			height: 250px;
			
			
		}
		#div2{
			
			text-align: center;
			float: right;
			margin-top: 100px;
			margin-left: 60px;
			margin-bottom: 10px;
			align-content: center;
			padding-right: 150px;
			width: 1200px;
			height: 100px;
			
				
		}
		#div3{
			
			text-align: center;
			float: right;
			margin-top: 400px;
			margin-left: 60px;
			margin-bottom: 50px;
			padding-bottom: 50px;
			align-content: center;
			padding-right: 150px;
			width: 1200px;
			height: 500px;
			
			
		}
	
		#div5{
			
			padding-left: 5px;
			background-color: white;
			clear: both;
			margin-top: 300px;
			padding-bottom: 20px;
			
		}
		#div6{
			
     		background-color: whitesmoke;
			padding-left: 10px;
			margin-top: 10px;
			padding-bottom: 20px;
			padding-top: 10px;
			clear: both;
		}
	</style>
</head>

<body>
	<div class="container-fluid">
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
		 
				<a href="admin.php" class=" btn btn-secondary" ><strong>Dashboard</strong></a>
		 		<a href="manageprofile.php" class=" btn btn-secondary"><strong>Manage Donation Profiles</strong></a>
		 <a href="manageusers.php" class=" btn btn-secondary"><strong>Manage Users</strong></a>
		        <a href="adminuserprofile.php" class=" btn btn-secondary"><strong>My Profile</strong></a>
		       
	 </div>
		
	<div id="div2">
		<p>
			<label><strong>WELCOME ADMIN</strong></label>
			<h2>RECENT DONATIONS</h2>
		
		</p>
		   <table style="background-color: whitesmoke" width="145%" border="1" align="center" class=" table table-sm table-bordered p-5 table-striped table-hover ">
		       <tbody>
			       <tr>
				 <th width="9%">Donation ID</th>
	             <th width="14%">Receipient Name</th>
                 <th width="12%">Amount Donated</th>
				 <th width="14%">Payment Method</th>
                 <th width="14%">Donor</th>
				 <th width="14%">Date Donated</th>
			 
			 </tr>
			 
				 <?php
				 while($rows=$result->fetch_assoc()){
					 ?>
				 
				 
				 <tr>
					 
				 <td><?php echo $rows ['Donation_id']?></td>
				 <td><?php echo $rows ['Receipient_name']?></td>
				 <td><?php echo $rows ['Amount_donated']?></td>
				 <td><?php echo $rows ['Payment_method']?></td>
				 <td><?php echo $rows ['Donor']?></td>
				 <td><?php echo $rows ['Date']?></td>
			 
			 </tr>
			 <?php
				 }
		 ?>
			
		</tbody>
		</table>
	
	</div>
	

		</tbody>
		</table>
	</div>
</div>	
	<div id="div6">

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