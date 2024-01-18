	
<?php
session_start();
require("../database/db_connection.php"); 
$value=$_SESSION["username"];
if(isset($_POST['update_password']))
	{ 
			$current_password=$_POST['current_password'];
			$password=$_SESSION["password"];
		if($current_password==$password)
		{
				
				$new_password1=$_POST['new_password1'];
				$new_password2=$_POST['new_password2'];
				
				if($new_password1==$new_password2)
				{
					$sql="UPDATE `login_info` SET `Password`='$new_password1' WHERE `login_info`.`Email` = '$value'";
					
					if(mysqli_query($con, $sql))
						{
							
								echo "<script> alert('Password is updated') ; </script>"; 
								header("Location: ../login.php");
			
						}	
					else
					{
						echo "<script> alert('Enable to update Password : try again') ; </script>"; 
						echo"ERROR: " . mysqli_error($con);
						header("Location: ../login.php");
			
					}
		
				}
				else{
						echo "<script> alert('Re-enter Password is not same') ; </script>"; 
				
				}
		}	
		else
		{
			echo "<script> alert('Enable to match your previous Password in DataBase') ; </script>"; 
					
		}

	}		


?>