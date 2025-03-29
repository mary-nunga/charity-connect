<?php
include('db_connection.php');

$sql="SELECT * FROM stories";
$result=mysqli_query($con,$sql);

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="icon" type="image/x-icon" href="images/favicon.ico">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<title>Donation Profiles</title>
<style>
	body{
		background-image: url("images/home.jpg");
		background-repeat: no-repeat;
		background-attachment: fixed;
		background-size:cover;
	}
	#div1{
		margin-top: 200px;
		padding-left: 10px;
		padding-right: 10px;
		padding-bottom: 10px;
		padding-top: 10px;
	
		}
	#div2{
		padding-bottom: 10px;
		padding-top: 10px;
		border-radius: 20px;
		margin-top: 10px;
		
	}
	img{
		padding-top: 10px;
		padding-bottom: 10px;
		padding-left: 30px;
	}
	#div3{
		clear: both;
		text-align: center;
		margin-top: 50px;
		margin-bottom: 20px;
	}
	
	
	footer{
			padding-left: 20px;
			background-color: whitesmoke;
			align-content: flex-end;
		}
	
	</style>
</head>

<body>
	<nav class="navbar navbar-expand-sm bg-light navbar-light fixed-top">
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
		
 <div id="div1" class="container mt-5">
	<div  class="row justify-content-center g-4">
		<?php
		while($rows=$result->fetch_assoc()){
			?>
		<div class="col-md-4">
			<div class="card bg-light p-4 shadow">
				<img src="images/<?php echo $rows['image'];?> " class="card-img-top">
				<div class="card-body">
					<h4 class="card-title"><?php echo $rows['name'];?></h4>
					<h5 class="card-subtitle mb-2 text-muted"><?php echo $rows['title'];?></h5>
					<p class="card-text"><?php echo $rows['description'];?></p>
					<a href="donate.php" class="btn btn-dark">Donate</a>
					
				</div>
	       </div>
	  </div>
		<?php	
		}
		
		?>
			
		</div>
		</div>
	</div>
	</div>


<div id="div3"><a href="home.php" class="btn btn-dark btn-lg">Back</a></div>
<div id="div4">
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