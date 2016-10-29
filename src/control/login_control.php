<?php
if(isset($_POST['submit'])){
	include('../db/con.php');
	$email = $_POST['email'];
	$password = $_POST['password'];
	
	$hash = sha1($password);
	
	$q = "select id, username, password, group_id,slug from users where email = '$email' and password = '$hash' limit 1";
		
	$result = $mysqli->query($q);
	
	if($result->num_rows == 1){
		foreach($result as $r){
			$_SESSION['username'] = $r['username'];
			$_SESSION['group'] = $r['group_id'];
			$_SESSION['email'] = $r['email'];
			$_SESSION['slug'] = $r['slug'];
		}		
		
	}else{
		echo "not found";
	}
	$result->close();
	
	$mysqli->close();
}else{
	header("Location: ../app/index.php");
	exit();
}


?>