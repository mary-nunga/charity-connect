<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

//first we have to connect the project to the database

$con=mysqli_connect("localhost","root","","charity_connect");

//then we check the connection
if($con==false){
	die("ERROR: Could not connect. " . mysqli_connect_error());
}

function register(){
	
	global $con;
	//then check if the form was submitted
   if($_SERVER['REQUEST_METHOD']=="POST"){ 

  if(isset($_POST['submit'])){
//after that get the submitted user input and put them in variables	
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$username=$_POST['username'];
	$password=$_POST['password'];

//check if all fields are filled before inserting
if(!empty($fname) && !empty($lname) && !empty($username) && !empty($password)){
	
	//check if username is admin
	if(strtolower($username == 'admin')){
		echo " <script> alert('You cannot register as admin!');
		window.location.href = 'register.php';
	    </script>";
		
		
		exit();
		
	}
	//this hashes the password in db	
	$hashed_password=password_hash($password,PASSWORD_DEFAULT);
	
//then insert the variables in the database	
	$sql = "INSERT INTO users (FirstName,LastName,Username,Password) VALUES ('$fname','$lname','$username','$hashed_password')";
	
	$rs = mysqli_query($con,$sql);
	
	if($rs){
		echo " <script>alert('Records added successfully!');
	     window.location.href = 'login.php';
	    </script>";
	    exit();
		
	}

} else
	{
		echo "<script> alert('Fill in all fields!');</script>";
	
	}
}
	
}
}
	
function login(){
	global $con;
	session_start();//start session
	//to login, first check if the form data has been submitted
if($_SERVER['REQUEST_METHOD']=='POST'){
	
	//then check if the submit button was clicked
	if(isset($_POST['submit'])){
		
	//the trim removes extra spaces from the username and password.
	if(!empty($_POST['username']) && !empty($_POST['password'])){
		$username=trim($_POST['username']);
		$password=trim($_POST['password']);
		
	//then use this query to search for users in the database.
		$sql= "SELECT * FROM users WHERE Username='$username'";
		//this is used to run the query
		$result= mysqli_query($con,$sql);
		
		//fetches user data as an array
		$user = mysqli_fetch_assoc($result);
	//this checks if a matching record is found
		
		//when found it starts a session so they stay logged in
		//password verify makes sure password matches the hashes one in db
		if($user && password_verify($password,$user['Password'])){
			
			$_SESSION['username']=$user['Username'];
			$_SESSION['role']=$user['role'];//saves the logged-in user's username
			
			if($user['role']=='admin'){
				echo "<script>
			  alert('Admin login successful!');
              window.location.href = 'admin.php';
	            </script>";

	           exit();
				
			}else{
				
				echo "<script>
			  alert('Login successful!');
              window.location.href = 'home.php';
	            </script>";

	         exit();
				
			}
			
			
		}
			
		}
		else {
			echo "<script>
			alert('Incorrect username or password!');
			</script>";
		}	
	}else{
		echo "<script>
			alert('Fill in all fields!');
			</script>";
	}
	}
	
}


function donate(){
	global $con;
	session_start();//to donate first start session to pick donation username
	
	//then check if the form was submitted
if($_SERVER['REQUEST_METHOD']=="POST"){ 

if(isset($_POST['submit'])){
//after that get the submitted user input and put them in variables	
	$name=$_POST['name'];
	$amount=$_POST['amount'];
	$payment=$_POST['payment-method'];
	$donor=$_SESSION['username'];//this picks username in session
	$date=$_POST['date'];
	

//check if all fields are filled before inserting
if(!empty($name) && !empty($amount) && !empty($payment) && !empty($date)){
	
//then insert the variables in the database	
	$sql = "INSERT INTO donations (Receipient_name,Amount_donated,Payment_method,Donor,Date) VALUES ('$name','$amount','$payment','$donor','$date')";
	
	$rs = mysqli_query($con,$sql);
	
	//confirmation message-this is js pop up window
	if($rs)
{
	echo " <script>alert('Donation made successfully!');
	window.location.href = 'home.php'
	</script>";

	exit();
}
	
} else
	{
		echo "<script> alert('Fill in all fields!');</script>";
	
	}
}
	
}

	
}

function profile(){
	global $con;

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		if (isset($_POST['submit'])) {

			// Escape special characters to handle apostrophes and others
			$name = mysqli_real_escape_string($con, $_POST['name']);
			$title = mysqli_real_escape_string($con, $_POST['title']);
			$description = mysqli_real_escape_string($con, $_POST['story']);
			$image = $_FILES['image']['name'];
			$tmp_name = $_FILES['image']['tmp_name'];
			$target = "images/" . basename($image);

			// Make sure all fields are filled
			if (!empty($name) && !empty($title) && !empty($description) && !empty($image)) {

				// Move uploaded image first
				move_uploaded_file($tmp_name, $target);

				// Insert into DB
				$sql = "INSERT INTO stories (name, title, description, image)  
						VALUES ('$name', '$title', '$description', '$image')";
				
				$result = mysqli_query($con, $sql);

				if ($result) {
					header("Location: manageprofile.php?success=1");
					exit();
				} else {
					echo "<script>alert('DB insert failed: " . mysqli_error($con) . "');</script>";
				}
			} else {
				echo '<script>alert("Fill in all fields!");</script>';
			}
		}
	}
}

function delete(){
	
	if($_SERVER['REQUEST_METHOD']==="POST" && isset($_POST['delete'])){
		
		global $con;
		$id=$_POST['id'];
		
		$sql="DELETE FROM users WHERE ID= '$id' ";
		
		$result=mysqli_query($con,$sql);
		
		if($result){
			header("Location: manageusers.php?deleted=1");
       exit();

		}else{
			echo "<script>
			alert ('Failed to delete user');
			
			</script>";
		}
}
}

function edit(){
	global $con;
	
	if ($_SERVER['REQUEST_METHOD']=="POST"){
		if(isset($_POST['update'])){
			
			$id=$_POST['id'];
			$fname=$_POST['fname'];
			$lname=$_POST['lname'];
			$username=$_POST['username'];
			
			$sql="UPDATE users SET FirstName='$fname',LastName='$lname',Username='$username' WHERE ID='$id'";
			
			$rs=mysqli_query($con,$sql);
			
			if($rs){
				header("Location: manageusers.php?edit_success=1");
        exit();
			}else
				echo "<script>
				alert('Failed to update user');
				</script>";
			exit();
				
		}
	}
}
function deletestories(){
	
	if($_SERVER['REQUEST_METHOD']==="POST" && isset($_POST['delete'])){
		
		global $con;
		$id=$_POST['id'];
		
		$sql="DELETE FROM stories WHERE ID= '$id' ";
		
		$result=mysqli_query($con,$sql);
		
		if($result){
			header("Location: manageprofile.php?deleted=1");
exit();

		}else{
			echo "<script>
			alert ('Failed to delete user');
			
			</script>";
		}
}
}
function editstories(){
	global $con;
	
	if ($_SERVER['REQUEST_METHOD']=="POST"){
		if(isset($_POST['update'])){
			
			$id=$_POST['id'];
			$name=$_POST['name'];
			$title=$_POST['title'];
			$description=$_POST['story'];
			$image=$_POST['image'];
			
			$sql="UPDATE stories SET name='$name', title='$title', description='$description', image='$image' WHERE ID='$id'";
			
			$rs=mysqli_query($con,$sql);
			
			if($rs){
				header("Location: manageprofile.php?edit_success=1");
        exit();
			}else
				echo "<script>
				alert('Failed to update user');
				</script>";
			exit();
				
		}
	}
}
	
?>