<?php

session_start();
ob_start();

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php include 'css/login.php'; ?>
	<?php include 'links/links.php'; ?>
	<title>Login</title>
</head>
<body>
<?php

include 'dbcon.php';

if(isset($_POST['submit'])){
	$email=$_POST['email'];
	$password=$_POST['password'];

	$email_search="select * from verify where email='$email'";
	$email_query=mysqli_query($dbcon,$email_search);

	$email_count=mysqli_num_rows($email_query);

	if($email_count){
		$email_pass = mysqli_fetch_assoc($email_query);
		$db_pass=$email_pass['password'];
		$_SESSION['user']=$email_pass['fullname'];
		$pass_decode=password_verify($password, $db_pass);

		if($pass_decode){
			if(isset($_POST['rememberme'])){

				setcookie('emailcookie',$email,time()+86400);
				setcookie('passwordcookie',$password,time()+86400);
				header('location:homepage.php');
			}else{
				header('location:homepage.php');
			}
		}else{
			echo "password Incorrect";
		}	
	
		
	}else{
		
			echo "Invalid login details";
		
	}
}

?>
	<div class="main-div">
		<h1>Login Form</h1>
			<div class="center-div">
			<main>
				<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
					<button class="gmail-style"  type="submit" name="gmail">Login via Gmail<i class="fa-brands fa-google"></i></button>
					<button class="fb-style" type="submit" name="facebook">Login via FaceBook<i class="fa-brands fa-facebook-f"></i></button>
					<div>
						<p>
							<?php 

							if(isset($_SESSION['msg'])){
								echo $_SESSION['msg'];
							}else{
								echo $_SESSION['msg']="You are logged out. Please Login again";
							}

							 ?>
						</p>
					</div>
					<label>Email Id: <input type="email" name="email" required value="<?php if(isset($_COOKIE['emailcookie'])){echo $_COOKIE['emailcookie'];} ?>"></label>
					<label>Password: <input type="password" name="password" required value="<?php if(isset($_COOKIE['passwordcookie'])){echo $_COOKIE['passwordcookie'];} ?>"></label>
					<input type="checkbox" name="rememberme"><label class="remember">Remember Me</label>
					<input type="submit" name="submit" value="Login Now">
				</form>
				<p>Forgot your password ? <a href="recover.php">Click Here</a></p>
				<br>
				<br>
				<p>Don't Have an account <a href="signup.php" target="_blank">SignUp Here</a></p>
			</main>
		</div>
	</div>
</body>
</html>