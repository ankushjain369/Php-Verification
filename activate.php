<?php

session_start();

include 'dbcon.php';

if(isset($_GET['token'])){

	$token = $_GET['token'];
	$updatequery = "update verify SET status='active' where token='$token' ";
	$query = mysqli_query($dbcon,$updatequery);

	if($query){
		if(isset($_SESSION['msg'])){
			$_SESSION['msg']=" Account Verified Successfully";
			header('location:login.php');
		}else{
			$_SESSION['msg']=" You are Logged Out ";
			header('location:login.php');
		}

	}else{
		$_SESSION['msg']="Account not verified";
		header('location:signup.php');

	}
}

?>