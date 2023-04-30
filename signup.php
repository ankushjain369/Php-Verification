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
	$name=mysqli_real_escape_string($dbcon,$_POST['fullname']);
	$mobile=mysqli_real_escape_string($dbcon,$_POST['mobile']);
	$email=mysqli_real_escape_string($dbcon,$_POST['email']);
	$dob=mysqli_real_escape_string($dbcon,$_POST['dob']);
	$password=mysqli_real_escape_string($dbcon,$_POST['password']);
	$cpassword=mysqli_real_escape_string($dbcon,$_POST['cpassword']);

	$pass = password_hash($password, PASSWORD_BCRYPT);
	$cpass = password_hash($cpassword, PASSWORD_BCRYPT);

	$token = bin2hex(random_bytes(15));

	$emailquery = "select * from verify where email='$email'";
	$query = mysqli_query($dbcon,$emailquery);

	$emailcount = mysqli_num_rows($query);

	if($emailcount>0){
		?>
	<script>
		alert("Email Already Exists");
	</script>
	<?php
	}else{
		if($password === $cpassword){

			$insertquery = " insert into verify(fullname,mobile,email,dob,password,cpassword,token,status) values('$name','$mobile','$email','$dob','$pass','$cpass','$token','inactive') ";

			$insertdata = mysqli_query($dbcon,$insertquery);

			if($insertdata){
			
			
			$subject = "Account Activation Link";
			$body = "Hi, $name. Click here to activate the account http://localhost/php/EmailVerification/activate.php?token=$token ";
			$sender_email = "From:ankushjain369@gmail.com";

			if(mail($email, $subject, $body, $sender_email)){
			$_SESSION['msg']="Check your mail to activate your account $email";
			header('location:login.php');
			
			}else{
			echo "Email not delivered to $email";
			}
		}
	

			

		}else{
			echo "Email failed to send";

		}
	}

}

?>
	
	<div class="main-div">
		<h1>Registration/SignUp Form</h1>
		<div class="center-div">
			<main>
				<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
					<label>Full Name: <input type="text" name="fullname" required></label>
					<label>Mobile: <input type="text" name="mobile" required></label>
					<label>Email Id: <input type="email" name="email" required></label>
					<label>Date Of Birth: <input type="text" name="dob" placeholder="yyyy-mm-dd"></label>
					<label>Password: <input type="password" name="password" required></label>
					<label>Confirm Password: <input type="password" name="cpassword" required></label>
					<input type="submit" name="submit" value="Create account">
				</form>
				<p>Have an account <a href="login.php">Login</a> here</p>
			</main>
		</div>
	</div>
</body>
</html>

