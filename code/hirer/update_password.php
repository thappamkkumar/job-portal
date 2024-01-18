
<?php
session_start();
require("../database/db_connection.php"); 
?>

<html>
<head>
<title>Profile</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="style/style.css" rel="stylesheet" type="text/css" />
	 <link href="style/hirer.css" rel="stylesheet" type="text/css" />
</head>

<body >
<div class="main_container">
		
		 
					<div class="navigation" id="nav_id">
						<div class="navigation_header">
															<div class="bar_container" onclick="show_hide()" id="top-bar_container_id">
																		<div class="bar1" id="bar1_1"></div>
																		<div class="bar1" id="bar1_2"></div>
																		<div class="bar1" id="bar1_3"></div>
																		
															</div>
											<div class="logo_container" id="logo_container_id">
											<img src="../image/logo1.png" class="logo">
											<h1 class="top_header_heading">Job Portal</h1>
											</div>
						</div>	
						<div class="navigation_menu" id="navigation_menu_id">
											<?php include'header/navigation.php'; ?>
										</div>
					</div>
					
					
					<div class="container">
							<div class="top_header">
									 
								<?php
												$value_1=$_SESSION["username"];
												
												$result_1 = mysqli_query($con,"Select * from employers WHERE Email='$value_1' ");  
												$row_1 = mysqli_fetch_array($result_1,MYSQLI_ASSOC);			
									?>
									<?php 
										if(empty($row_1['Logo'])) 
										{
											
									?>
										<img src="logo/profile_icon.png"  class="top_header_image">
									<?php 
										}
										else
										{
											
									?>
										<img src="logo/<?php echo$row_1['Logo'];?>"  class="top_header_image">
									<?php 
										}
									?>
									 
									<h2 class="top_name"><?php echo$row_1['Name'];?></h2>
							</div>	
					
							<div class="sub_container">
									 	<div class="profile" id="update_password">
															<div class="sub_container_heading">
																	<h1 >Change Password</h1>
																	<button type="button"  id="password" onclick="history.back();" class="back">&times;</button>
															</div>
															 
																	<form action="update_password.php" method="post" enctype="multipart/form-data">
																	
																		<table>
																				 <tr><td>	<lable>Current Password</lable>	 <br>	<input type="password"   class="input1" name="current_password"   > </td></tr>
																				<tr><td>	<lable>New Password</lable>	 <br>	<input type="password" class="input1" name="new_password1"   > </td></tr>	
																				<tr><td>	<lable>Re-enter Password</lable>	 <br>	<input type="password" class="input1"  name="new_password2"  > </td></tr>
							
																				<tr  class="button"><td colspan="2">			
																				<input type="submit" class="profile_update_btn"   value="UPDATE" name="update_password"></td></tr>
																					
																		</table>
																	</form>
													</div>
													
													
													

									
											
							</div>
					
					</div>
		 


</div>


	
<?php
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
							
								echo "<script> alert('Password is updated') ; window.location.href='../login.php';</script>"; 
								 
						}	
					else
					{
						echo "<script> alert('Enable to update Password : try again') ;  window.location.href='../login.php';</script>"; 
						echo"ERROR: " . mysqli_error($con);
						 
			
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
<script>


		
		 function show_hide()
		 {
			 w=document.getElementById("nav_id").style.width;
			 
			 if(w=="250px")
			 {
				document.getElementById("logo_container_id").style.display="none";
				 document.getElementById("navigation_menu_id").style.display="none";
				 document.getElementById("nav_id").style.height="25px";
				 document.getElementById("nav_id").style.width="65px"; 
			 }
			 else
			 {
				   document.getElementById("logo_container_id").style.display="block";
				 document.getElementById("navigation_menu_id").style.display="block";
				 document.getElementById("nav_id").style.height="100%";
				 document.getElementById("nav_id").style.width="250px";
			 }
		 }
		 
		 
	

	if(window.history.replaceState)
	{
			window.history.replaceState(null,1,null,window.location.href);
	}
		</script>
</body>
</html>