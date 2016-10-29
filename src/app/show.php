<?php include_once('../db/con.php'); ?>
<?php include('partials/header.php');?>

<?php
$stmt = $db->prepare('SELECT id, title, img_name, slug, content, created_at FROM posts WHERE slug = ?');
$stmt->execute(array($_GET['id']));
$row = $stmt->fetch();
//if post does not exists redirect user.
if($row['id'] == ''){
	header('Location: ./');
	exit;
}



?>


<div class="container">

      
			<div id="content col-lg-12 col-md-12">
				<div class="row">
					<div class="col-md-12">
						<div class="post">
								<div class="title"><?php echo $row['title'] ?></div>
								<p class="date"><?php echo date('jS M Y H:i:s', strtotime($row['created_at'])) ?></p>
								<div class="body">
								<img src="uploads/<?php echo $row['img_name'];  ?>" class="img-responsive">
								<p><?php echo $row['content'] ?></p>
								</div>
								<div class="footer">
									<a href="#">comments</a>
								</div>
							</div>
						
			</div>

    </div><!-- /.container -->
<?php include('partials/footer.php');?>