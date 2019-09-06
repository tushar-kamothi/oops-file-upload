<?php 

define('host','localhost');
define('user','root');
define('pass','');
define('database','test-oop');

class db{
		
		function __construct(){
			$this->conn = new mysqli(host,user,pass,database);
			if(!$this->conn){
				echo 'Error in connection';
			}
			
			
		}
		
		public function insert($name,$email,$contact,$file){
			$sql = "insert into oops (name,email,contact,image) values ('$name','$email','$contact','$file')";
			$query = $this->conn->query($sql);
			
			if($query){
				echo 'insereted';
			}
		}
		
		public function display(){
				$sql = "select * from oops";
				$query = $this->conn->query($sql);
				
				if($query){
					$counter = 0;
					echo "<table border = '2px' class='table'>
						<tr>
							<th>SrNo.</th>
							<th>Name</th>
							<th>Email</th>
							<th>Contact</th>
							<th>Image</th>
							<th colspan=2>Action</th>
						</tr>";
						while($row = mysqli_fetch_assoc($query)){
								$counter++;
								echo "<tr>
								<td>";
								echo $counter;
								echo '</td><td>';
								echo $row['name'];
								echo '</td><td>';
								echo $row['email'];
								echo '</td><td>';
								echo $row['contact'];
								echo '</td> <td>';
								echo "<img src='upload/".$row['image']."' height='30px' width='30px'>";
								
								echo '</td>
								<td>';
								echo "<a href='edit.php?id=".$row['id']."'>Edit</a>";
								echo '</td> <td>';
								echo "<a href='delete.php?id=".$row['id']."'>Delete</a>";
								echo '</td>
								</tr>';
								
						}
					echo '</table>';
				}
		}
		
		public function edit($id){
				$sql = "select * from oops where id = '$id'";
				$query = $this->conn->query($sql);
				if($query){
						$record = $query->fetch_assoc();
						return $record;
				}
				else{
						return false;
					}
		}
		
}


?>
