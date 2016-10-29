<?php include_once('../db/con.php'); ?>
<?php include_once('../control/functions.php') ?>
<?php include('partials/header.php');?>
<div class="container">

      <div class="starter-template">
        <h1>Hallo, welcome to our simple blog</h1>
        <p class="lead">This blog was intended to fulfill the secure programming assignment.</p>
      </div>
			<div id="content col-lg-12 col-md-12">
				<div class="row">
					<div class="col-md-12">
						<?php
						
						try {

						        $stmt = $db->query('SELECT id, title, img_name, slug, content, created_at FROM posts ORDER BY id DESC');
						        while($row = $stmt->fetch()){
					?>
											<div class="post">
												<div class="title"><?php echo $row['title'] ?></div>
												<p class="date"><?php echo date('jS M Y H:i:s', strtotime($row['created_at'])) ?></p>
												<div class="body">
												<img src="uploads/<?php echo $row['img_name'];  ?>" class="img-responsive">
												<p><?php echo limit_text($row['content'],25) ?></p>
												</div>
												<div class="footer">
													<a href="show.php?id=<?php echo $row['slug'];?>">read more</a>
												</div>
											</div>
						
						<?php			
						        }

						    } catch(PDOException $e) {
						        echo $e->getMessage();
						    }
						
						?>
						
			</div>

    </div><!-- /.container -->
<?php include('partials/footer.php');?>