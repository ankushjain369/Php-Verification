<?php

$user = 'root';
$pass = '';
$server = 'localhost';
$db = 'verification';

$dbcon = mysqli_connect($server,$user,$pass,$db);

if($dbcon){
	?>
	<script>
		alert("Connection Successful");
	</script>
	<?php
}else{
	?>
	<script>
		alert("No Connection");
	</script>
	<?php
}

?>