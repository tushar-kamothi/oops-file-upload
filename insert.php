<?php 
	include('db.php');
	include('header.php');
	
		
		?>
		<div class='content'>
			<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
				<table border='1px'>
					<tr>
						<td>Name :</td>
						<td><input type='text' name='name' required></td>
					</tr>
					<tr>
						<td>Email :</td>
						<td><input type='text' name='email' required></td>
					</tr>
					<tr>
						<td>Contact :</td>
						<td><input type='text' name='contact' required></td>
					</tr>
					<tr>
						<td>Image :</td>
						<td><input type='file' name='image' required></td>
					</tr>
					<tr>
						<td><input type='submit' name='submit' value="Click"></td>
					</tr>
				</table>
			</form>
		</div>
		
		<?php
		if(isset($_POST['submit'])){
			$name = $_POST['name'];
			$email = $_POST['email'];
			$contact = $_POST['contact'];
						
			$file = rand(1000,100000)."-".$_FILES['image']['name'];
			$file_loc = $_FILES['image']['tmp_name'];
			$file_size = $_FILES['image']['size'];
			$file_type = $_FILES['image']['type'];
			$folder="upload/";
			move_uploaded_file($file_loc,$folder.$file);
			
			$db = new db();
			$db->insert($name,$email,$contact,$file);
		}
	include('footer.php');
	
?>
