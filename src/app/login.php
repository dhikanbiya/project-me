<?php
//include config
require_once('../db/con.php');


//check if already logged in
if( $user->is_logged_in() ){ header('Location: manage/index.php'); } 
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

        <title>Login</title>

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
			<form class="form-signin"  method="post" action="">
				<h4 class="text-right">Please Signin</h4>
				<?php
				if(isset($message)){echo $message; }
				?>
			  <div class="form-group">
			    <label for="email">Username</label>
			    <input type="text" class="form-control" name="username" id="username" placeholder="Username">
			  </div>
			  <div class="form-group">
			    <label for="password">Password</label>
			    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
			  </div>			  
			  <div class="forgot pull-right">
			    <label>
			      <a href="#" class="text-right">Forgot Password</a>
			    </label>
			  </div>
			  <input type="submit" name="submit" value="submit" id="submit" class="btn btn-default">
			</form>
			

    </div><!-- /.container -->

<?php include("partials/footer.php"); ?>