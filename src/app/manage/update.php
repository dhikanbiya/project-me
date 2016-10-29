<?php include('partials/header.php'); ?> 

	<?php

	//if form has been submitted process it
	if(isset($_POST['submit'])){

		//collect form data
		extract($_POST);

		//very basic validation		

		if( strlen($password) > 0){

			if($password ==''){
				$error[] = 'Please enter the password.';
			}

			if($confirm ==''){
				$error[] = 'Please confirm the password.';
			}

			if($password != $confirm){
				$error[] = 'Passwords do not match.';
			}

		}
		

		
		if(!isset($error)){

			try {

				if(isset($password)){

					$hashedpassword = $user->password_hash($password, PASSWORD_BCRYPT);

					//update into database
					$stmt = $db->prepare('UPDATE users SET  password = :password WHERE slug = :id') ;
					$stmt->execute(array(						
						':password' => $hashedpassword,
						':id' => $id
					));


				} 				

				//redirect to index page
				header('Location: users.php?action=updated');
				exit;

			} catch(PDOException $e) {
			    echo $e->getMessage();
			}

		}

	}

	?>


	<?php
	//check for any errors
	if(isset($error)){
		foreach($error as $error){
			echo $error.'<br />';
		}
	}

		try {

			$stmt = $db->prepare('SELECT id, slug FROM users WHERE slug = :slug') ;
			$stmt->execute(array(':slug' => $_GET['id']));
			$row = $stmt->fetch(); 

		} catch(PDOException $e) {
		    echo $e->getMessage();
		}

	?>

                              
<h4>Update Password</h4>												
<form method="post" action="">
	<input type='hidden' name='id' value='<?php echo $row['slug'];?>'>
    <div class="form-group">
        <label for="title">Password</label>
        <input type="password" class="form-control"  placeholder="password" name="password">
    </div>
    <div class="form-group">
        <label for="title">Confirm Password</label>
        <input type="password" class="form-control" placeholder="confirm" name="confirm">
    </div> 											  
    <button type="submit" name="submit" class="btn btn-info">Post</button>
</form>
<!-- /#page-content-wrapper -->   
<?php include('partials/footer.php'); ?>