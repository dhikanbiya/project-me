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
			//process login form if submitted
			if(isset($_POST['submit'])){

				$username = trim($_POST['username']);
				$password = trim($_POST['password']);
				$email= $_POST['email'];
		
				if($user->login($username,$password)){ 

					//logged in return to index page
					header('Location: manage/index.php');
					exit;
		

				} else {
					$message = '<p class="error">Wrong username or password</p>';
				}

			}//end if submit

			
			?>

        
			<div class="container">      		
			<form class="form-signin"  method="post" action="../control/register_control.php">
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
			  <input type="submit" name="submit" value="submit" id="submit" class="btn btn-default">
			</form>
			

    </div><!-- /.container -->

<?php include("partials/footer.php"); ?>