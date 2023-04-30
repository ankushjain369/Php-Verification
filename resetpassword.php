<?php

session_start();
ob_start();

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php include 'css/style.php' ?>
	<title>SignUp</title>
</head>
<body>
<?php

include 'dbcon.php';

if(isset($_POST['submit'])){

	if(isset($_GET['token'])){

		$token = $_GET['token'];


	

	$password=mysqli_real_escape_string($dbcon,$_POST['password']);
	$cpassword=mysqli_real_escape_string($dbcon,$_POST['cpassword']);

	$pass = password_hash($password, PASSWORD_BCRYPT);
	$cpass = password_hash($cpassword, PASSWORD_BCRYPT);

	
		if($password === $cpassword){

			$updatequery = "update verify SET password='$pass' where token='$token' ";

			$insertdata = mysqli_query($dbcon,$updatequery);

			if($insertdata){
			
			$_SESSION['msg']="Your password has been updated";
			header('location:login.php');
			
			}else{
			
				$_SESSION['passmsg']="Your password has not been updated";
				header('location:resetpassword.php');
			}
		}
		else{
			$_SESSION['passmsg']="Your password does not match";
		}
		
	}else{
		echo "No Token found";
	}	

}

?>
	
	<div class="main-div">
		<h1>Update Password</h1>
		<br>
		<p>
			<?php
			if(isset($_SESSION['passmsg'])){
				echo $_SESSION['passmsg'];
			}else{
				echo $_SESSION['passmsg']=" ";
			}
			?>
		</p>
		<div class="center-div">
			<main>
				<form action="" method="POST">
					
					<label>New Password: <input type="password" name="password" required></label>
					<label>Confirm Password: <input type="password" name="cpassword" required></label>
					<input type="submit" name="submit" value="Update Password">
				</form>
				<p>Have an account <a href="login.php">Login</a> here</p>
			</main>
		</div>
	</div>
</body>
</html>

