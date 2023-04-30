<?php

session_start();

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
	
	$email=mysqli_real_escape_string($dbcon,$_POST['email']);
	

	$emailquery = "select * from verify where email='$email'";
	$query = mysqli_query($dbcon,$emailquery);

	$emailcount = mysqli_num_rows($query);

	if($emailcount){
			
			$userdata = mysqli_fetch_array($query);
			$name = $userdata['name'];
			$token = $userdata['token'];

			$subject = "Reset Password Link";
			$body = "Hi, $name. Click here to reset the password http://localhost/php/EmailVerification/resetpassword.php?token=$token ";
			$sender_email = "From:ankushjain369@gmail.com";

			if(mail($email, $subject, $body, $sender_email)){
			$_SESSION['msg']="Check your mail to reset the password $email";
			header('location:login.php');
			
			}else{
			echo "Email not delivered to $email";
			}
		}else{
			echo "No Email Found";
		}

}

?>
	
	<div class="main-div">
		<h1>Reset Password</h1>
		<div class="center-div">
			<main>
				<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
					
					<label>Email Id: <input type="email" name="email" required></label>
					
					<input type="submit" name="submit" value="Send Mail">
				</form>
				<p>Have an account <a href="login.php">Login</a> here</p>
			</main>
		</div>
	</div>
</body>
</html>

