<?php include('partials/header.php'); ?>                               
<h4>List Users</h4>												
<table class="table table-striped">
    <thead>
        <tr>
            <th>username</th>
            <th>role</th>
            <th>action</th>
        </tr>
    </thead>
    <tbody>
 			<?php
 				try {

 					$stmt = $db->query('SELECT users.id, users.username as username, users.slug as slug, groups.name as groups FROM users Join groups on users.group_id = groups.id ORDER BY users.id DESC');
 					while($row = $stmt->fetch()){					
 						echo '<tr>';
 						echo '<td>'.$row['username'].'</td>';
 						echo '<td>'.$row['groups'].'</td>'; 						
 						?>

 						<td>
 							<a href="update.php?id=<?php echo $row['slug'];?>">Edit</a> | 
 							<a href="javascript:delpost('<?php echo $row['slug'];?>','<?php echo $row['slug'];?>')">Delete</a>
 						</td>
				
 						<?php 
 						echo '</tr>';

 					}

 				} catch(PDOException $e) {
 				    echo $e->getMessage();
 				}
				?>
    </tbody>
</table>

</div>
</div>
</div>
</div>
<!-- /#page-content-wrapper -->   
<?php include('partials/footer.php'); ?>