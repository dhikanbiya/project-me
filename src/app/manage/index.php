<?php include('partials/header.php'); ?>                               
<h4>List Posts</h4>												
<a class="label label-success" href="post.php">Add new posts</a>	
	<?php 
	//show message from add / edit page
	// if(isset($_GET['action'])){
// 		if($GET['action']=='deleted'OR $GET['action']=='added')
// 		echo '<h3>Post '.$_GET['action'].'.</h3>';
// 	}
	?>											
	
	<?php
	if(isset($_GET['delpost'])){ 

		$stmt = $db->prepare('DELETE FROM posts WHERE slug = :postID') ;
		$stmt->execute(array(':postID' => $_GET['delpost']));

		header('Location: index.php?action=deleted');
		exit;
	} 
	?>
	
<table class="table table-striped">
    <thead>
        <tr>
            <th>#date-created</th>
            <th>title</th>
            <th>content</th>
            <th>action</th>
        </tr>
    </thead>
    <tbody>
			<?php
				try {
					
					$stmt = $db->prepare('SELECT id,created_at, title, slug, content FROM posts where user_id = ? ORDER BY id DESC');
					$stmt->execute(array($_SESSION['id']));
					while($row = $stmt->fetch()){
				
						echo '<tr>';
						echo '<td>'.$row['created_at'].'</td>';
						echo '<td>'.$row['title'].'</td>';
						echo '<td>'.limit_text($row['content'],10).'</td>';
						?>

						<td>
							<a href="edit-post.php?id=<?php echo $row['slug'];?>">Edit</a> | 
							<a href="javascript:delpost('<?php echo $row['slug'];?>','<?php echo $row['slug'];?>')">Delete</a>
						</td>
				
						<?php 
						echo '</tr>';

					}

				} catch(PDOException $e) {
				    echo $e->getMessage();
				}
			?>	
			
			
			
			<script language="JavaScript" type="text/javascript">
		  function delpost(id, title)
		  {
			  if (confirm("Are you sure you want to delete '" + title + "'"))
			  {
			  	window.location.href = 'index.php?delpost=' + id;
			  }
		  }
		  </script>
       
    </tbody>
</table>

</div>
</div>
</div>
</div>
<!-- /#page-content-wrapper -->   
<?php include('partials/footer.php'); ?>