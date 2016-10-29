<?php include('partials/header.php'); ?> 
<?php

//if form has been submitted process it
if(isset($_POST['submit'])){

	$_POST = array_map( 'stripslashes', $_POST );

	//collect form data
	extract($_POST);

	//very basic validation
	if($title ==''){
		$error[] = 'Please enter the title.';
	}

	if($content ==''){
		$error[] = 'Please enter the content area.';
	}
	
	if(!isset($error)){

		try {

			$slug = slug($title);

			//insert into database
			$stmt = $db->prepare('INSERT INTO posts (title,slug,content) VALUES (:title, :slug, :content)');
			$stmt->execute(array(
				'title' => $title,
				'slug' => $slug,
				'content' => $content				
			));

			//redirect to index page
			header('Location: index.php?action=added');
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
                              
<h4>New Posts <?php echo $_SESSION['username']; ?></h4>												
<form method="post" action="">
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" placeholder="title" name="title" <?php if(isset($error)){ echo $_POST['title'];}?>>
    </div>
    <div class="form-group">
        <label for="comment">Content:</label>
        <textarea class="form-control" rows="5" id="content" name="content"><?php if(isset($error)){ echo $_POST['content'];}?></textarea>
    </div>
    <div class="form-group">
        <label for="file">File input</label>
        <input type="file" id="file">
        <p class="help-block">input file, format allowed jpg,png,bmp</p>
    </div>												  
    <button type="submit" name="submit" class="btn btn-info">Post</button>
</form>
<!-- /#page-content-wrapper -->   
<?php include('partials/footer.php'); ?>