<?php
session_start();
include('db_connection.php');

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) {
    delete(); // ✅ Only call when delete button is clicked
}
//checks if user clickee the edit button and store that user's id to open up only that row
$edit_id=isset($_POST['edit']) ? $_POST['id'] : null;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    edit(); // ✅ Only call when delete button is clicked
}

$sql="SELECT * FROM users";
$rs=mysqli_query($con,$sql);
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="icon" type="image/x-icon" href="images/favicon.ico">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<title>Admin User Page</title>
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
			
			text-align: center;
			float: right;
			margin-top: 100px;
			margin-left: 50px;
			margin-bottom: 10px;
			align-content: center;
			padding-right: 150px;
			width: 1300px;
			height: 600px;
	}
		
		#div2{
			
     		background-color: whitesmoke;
			padding-left: 10px;
			margin-top: 10px;
			padding-bottom: 20px;
			padding-top: 10px;
			clear: both;
			
		}
		#div3{
		clear: both;
		text-align: center;
		margin-top: 50px;
		margin-bottom: 20px;
	}
		
		form{
			float: left;
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
		
   
<div id="div1" class="table-responsive">
		
		<h1><strong>USERS</strong></h1>
		
	<table style="background-color: whitesmoke" width="145%" border="1" align="center" class=" table table-sm table-bordered p-5 table-striped table-hover ">
		<tbody>
			<tr>
				<th width="16%">User ID</th>
				<th width="22%">First Name</th>
				<th width="12%">Last Name</th>
				<th width="22%">Username</th>
				<th width="6%">Action</th>
				
			</tr>
			
			<tr>
		   <?php
				while($rows=$rs->fetch_assoc()){
					
				?>
<!--this checks if this is the row being edited then make it editable otherwise leave it as it is					-->
					<?php 
					if($edit_id == $rows['ID']){
					?>
					<form method="post">
						<td><input type="id" name="id" value="<?php echo $rows['ID'] ;?>"></td>
						<td><input type="text" name="fname" value="<?php echo $rows['FirstName'] ;?>"></td>
						<td><input type="text" name="lname" value="<?php echo $rows['LastName'] ;?>"></td>
						<td><input type="text" name="username" value="<?php echo $rows['Username'] ;?>"></td>
						<td>
						<button type="submit" name="update" class="btn btn-dark" style="margin-left: 1px">Update</button>
						</td>

						</form>
				<?
					} else{ 
						
					?>
					
				<td width="1%"><?php echo $rows ['ID']; ?> </td>
				<td width="1%"><?php echo $rows ['FirstName']; ?> </td>
				<td width="1%"><?php echo $rows ['LastName']; ?> </td>
				<td width="1%"><?php echo $rows ['Username']; ?> </td>
				
				<?
				} ?>
					
			
				<td width="18%">
					<form method="post" action="manageusers.php" style="padding-right: 10px">
						
						<?php if ($edit_id == $rows['ID']): ?>
              
              <?php else: ?>
              <input type="hidden" name="id" value="<?php echo $rows['ID']; ?>">
             <button type="submit" name="edit" class="btn btn-dark">Edit</button>
             <?php endif; ?>

					</form>
					
						<form method="post" style="margin-left: 1px">
							
						<input 
							   type="hidden"
							   name="id" 
							   value="<?php echo $rows['ID'];?>"
							   >
						<button type="submit" name="delete" id="delete" class="btn btn-dark" onClick="return confirm('Are you sure you want to delete this user?')">Delete</button>
					
					</form>
					
				</td>
				
				</tr>
				<?php
				}
				?>
		</tbody>
		</table>
	</div>
</div>
	<div id="div3"><a href="admin.php" class="btn btn-dark btn-lg">Back</a></div>
	
	<div id="div2">

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