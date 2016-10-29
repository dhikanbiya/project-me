<?php
if(isset($_POST['submit'])){	
	include('../db/con.php');
	$username = $_POST['username'];
	$password = $_POST['password'];
	$email = $_POST['email'];
	$rand = mt_rand(20,30);
	
	$hash = sha1($password);
	$slug = $username."_".$rand;

	$sql = "insert into users (username,password,email,slug) VALUES ('$username','$hash','$email','$slug')";
	if (mysqli_query($mysqli, $sql)) {
		header("Location: ../app/index.php");
		exit();
	} else {
	    echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
	}
	
						//
					// $stmt = $mysqli->prepare("INSERT INTO users (username, password, email, slug) VALUES (?,?,?,?)")
					// $stmt->bind_param('sssis', $username,$hash,$email,$slug);
					// 	        $stmt->execute();    // Execute the prepared query.
					// 	        $stmt->store_result();
	//
	// $stmt $mysqli, "INSERT INTO users (username, password, email, slug) VALUES (?, ?, ?,?)");

}else{
	header("Location: ../app/index.php");
	exit();
}