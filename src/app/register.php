<?php
//include config
require_once('../db/con.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../../favicon.ico">

        <title>Register Account</title>

        <!-- Bootstrap core CSS -->
        <link href="../../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">


        <!-- Custom styles for this template -->
        <link href="../../lib/css/custom.css" rel="stylesheet"> 
        <link href="../../lib/css/signin.css" rel="stylesheet"> 

    </head>

    <body>
			<?php

			//if form has been submitted process it
			if(isset($_POST['submit'])){

				//collect form data
				extract($_POST);

				//very basic validation
				if($username ==''){
					$error[] = 'Please enter the username.';
				}

				if($password ==''){
					$error[] = 'Please enter the password.';
				}

				if($passwordConfirm ==''){
					$error[] = 'Please confirm the password.';
				}

				if($password != $passwordConfirm){
					$error[] = 'Passwords do not match.';
				}

				if($email ==''){
					$error[] = 'Please enter the email address.';
				}

				if(!isset($error)){

					$hashedpassword = $user->password_hash($password, PASSWORD_BCRYPT);

					try {

						//insert into database
						$stmt = $db->prepare('INSERT INTO users (username,password,email) VALUES (:username, :password, :email)') ;
						$stmt->execute(array(
							':username' => $username,
							':password' => $hashedpassword,
							':email' => $email
						));

						//redirect to index page
						header('Location: register.php');
						exit;

					} catch(PDOException $e) {
					    echo $e->getMessage();
					}

				}

			}

			//check for any errors
			if(isset($error)){
				foreach($error as $error){
					echo '<p class="error">'.$error.'</p>';
				}
			}
			?>

        
			<div class="container">      		
			<form class="form-signin"  method="post" action="">
				<h4 class="text-right">Register Account</h4>
			  <div class="form-group">
			    <label for="emai">Username</label>
			    <input type="text" name="username" class="form-control" id="username" placeholder="username">
			  </div>
			  <div class="form-group">
			    <label for="emai">Email address</label>
			    <input type="email" name="email" class="form-control" id="email" placeholder="Email">
			  </div>
			  <div class="form-group">
			    <label for="password">Password</label>
			    <input type="password" class="form-control" id="password" placeholder="Password" name="password">
			  </div>
			  <div class="form-group">
			    <label for="password">Password Confirm</label>
			    <input type="password" class="form-control" id="password" placeholder="passwordConfirm" name="passwordConfirm">
			  </div>			  			  
			  <input type="submit" name="submit" value="submit" id="submit" class="btn btn-default">
			</form>
			

    </div><!-- /.container -->

<?php include("partials/footer.php"); ?>