<?php
session_start();
include('db_connection.php');
//if not logged in as admin you are logged out

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) {
    deletestories(); 
}

$edit_id=isset($_POST['edit']) ? $_POST['id'] : null;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    editstories(); 
}

$sql="SELECT * FROM stories";
$rs=mysqli_query($con,$sql);
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="icon" type="image/x-icon" href="images/favicon.ico">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	
<title>Admin Edit Profile Page</title>
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
			margin-top: 50px;
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
	#div4{
			float: right;
			padding-bottom: 20px;
			
			
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
		<h1><strong>DONATION PROFILES</strong></h1>
	<div id="div4"><a href="profileform.php" class=" btn btn-dark" ><strong>New Profile</strong></a></div>
	<table style="background-color: whitesmoke" width="135%" border="1" align="center" class=" table table-sm table-bordered p-5 table-striped table-hover ">
		<tbody>
			<tr>
				<th width="144">ID</th>
				<th width="178">Name</th>
				<th width="255">Title</th>
				<th width="250">Description</th>
				<th width="193">Image</th>
				<th width="200">Action</th>
				
			</tr>
			
			<tr>
		   <?php
				while($rows=$rs->fetch_assoc()){
					
				?>
<!--this checks if this is the row being edited then make it editable otherwise leave it as it is					-->
					<?php 
					if($edit_id == $rows['id']){
					?>
					<form method="post">
						<td height="74">
						<input type="text" name="id" value="<?php echo $rows['id'];?>"></td>
						
					    <td><input type="text" name="name" value="<?php echo $rows['name'];?>"></td>
						
						<td><input type="text" name="title" value="<?php echo $rows['title'];?>"></td>
						
						<td><input type="text" name="story" value="<?php echo $rows['description'];?>"></td>
						
						
						<td><input type="text" name="image" value="<?php echo $rows['image'] ?>"></td>
						
						<td>
						<button type="submit" name="update" class="btn btn-dark"> Update</button>				
						</td>	

			  </form>
				<?
					} else{ 
						
					?>
					
				<td width="248"><?php echo $rows ['id']; ?> </td>
				<td width="139"><?php echo $rows ['name']; ?> </td>
				<td width="20"><?php echo $rows ['title']; ?> </td>
				<td width="20"><?php echo $rows ['description']; ?> </td>
				<td width="20"><?php echo $rows ['image']; ?> </td>
				
				<?
				} ?>
				 
				
                 	<td width="413">
						<div class="d-flex gap-2">
					<?php if ($edit_id != $rows['id']){ ?>
					<form method="post" style="padding-right: 20px">
						          
                    <input type="hidden" name="id" value="<?php echo $rows['id'];?>">
                          <button type="submit" name="edit" class="btn btn-dark">Edit</button>
                          
					</form>
					<?
				}?>
						<form method="post">
							
						<input type="hidden" name="id"  value="<?php echo $rows['id']; ?>">
							   
						<button type="submit" name="delete" id="delete" class="btn btn-dark" onClick="return confirm('Are you sure you want to delete this user?')">Delete</button>
					
					</form>
					</div>
						
				</td>
				
			</tr>
			
			<? 
				   } ?>
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
	<p>Address: 123 Giving Street, Hope City</p>
	</footer>
	
	</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
	
</body>
</html>