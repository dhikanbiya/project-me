<?php include('partials/header.php'); ?> 

<?php
//if id not exist
$stmt = $db->prepare('SELECT id, title, img_name, slug, content, created_at FROM posts WHERE slug = ? AND user_id = ?');
$stmt->execute(array($_GET['id'],$_SESSION['id']));
$row = $stmt->fetch();
//if post does not exists redirect user.
if($row['id'] == ''){
	header('Location: ./');
	exit;
}



//if form has been submitted process it
if(isset($_POST['submit'])){

	$_POST = array_map( 'stripslashes', $_POST );

	//collect form data
	extract($_POST);

	//very basic validation
	if($id ==''){
		$error[] = 'This post is missing a valid id!.';
	}
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
			$stmt = $db->prepare('UPDATE posts SET title = :title, slug = :slug, content = :content WHERE id = :id') ;
			$stmt->execute(array(
				'id' => $id,
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


	<?php
	//check for any errors
	if(isset($error)){
		foreach($error as $error){
			echo $error.'<br />';
		}
	}

		try {

			$stmt = $db->prepare('SELECT id, title, content FROM posts WHERE slug = ?') ;
			$stmt->execute(array($_GET['id']));
			$row = $stmt->fetch(); 

		} catch(PDOException $e) {
		    echo $e->getMessage();
		}

	?>


                              
<h4>Edit Post</h4>												
<form method="post" action="">
	<input type='hidden' name='id' value='<?php echo $row['id'];?>'>
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" placeholder="title" name="title" value="<?php echo $row['title'];?>">
    </div>
    <div class="form-group">
        <label for="comment">Content:</label>
        <textarea class="form-control" rows="5" id="content" name="content"><?php echo $row['content'];?></textarea>
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