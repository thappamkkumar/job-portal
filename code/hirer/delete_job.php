
			
<?php
session_start();
?>
<?php 
			
			require("../database/db_connection.php"); 
			
			$value=$_SESSION["value"];
 
						
			
				$sql="DELETE FROM `jobs` WHERE  `S_No` = '$value' ";
					
					if(mysqli_query($con, $sql))
						{
							
								echo "<script> alert('Job is Deleted') ; window.location.href='job_list.php'; </script>"; 
							 
			
						}	
					else
					{
						echo "<script> alert('Enable to delete job : try again') ; </script>"; 
						echo"ERROR: " . mysqli_error($con);
						
					}
				
			?>
		