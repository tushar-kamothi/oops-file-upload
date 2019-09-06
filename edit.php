<?php 
	include('db.php');
	$id = $_GET['id'];
	$db = new db();
	$edit = $db->edit($id);
	
	include('header.php');
	?>
		<div class='content'>
			<form method="post" action="editprocess.php" enctype="multipart/form-data">
			
			</form>
		</div>
	<?php
	include('footer.php');
?>
