
<?php
session_start();
require("../database/db_connection.php"); 
?>

<html>
<head>
<title>Profile</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="style/style.css" rel="stylesheet" type="text/css" />
	 <link href="style/hirer_profile_style.css" rel="stylesheet" type="text/css" />
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
												$result_1 = mysqli_query($con,"Select * from admin WHERE Email='$value_1' ");  
												$row_1 = mysqli_fetch_array($result_1,MYSQLI_ASSOC);		
									?>
									<?php 
										if(empty($row_1['profile_image'])) 
										{
											
									?>
										<img src="images/profile_icon.png"  class="top_header_image">
									<?php 
										}
										else
										{
											
									?>
										<img src="images/<?php echo$row_1['profile_image'];?>"  class="top_header_image">
									<?php 
										}
									?> 
									<h2 class="top_name"><?php echo$row_1['Name'];?></h2>
							</div>	
					
										<div class="sub_container" id="sub_container_id">
											<div class="sub_container_heading">
											<h1> Employer | User Profile</h1>
												<form>
													<input type="button" value="&times;" class="back" onclick="history.back()">
												</form>
											</div>
											
											<div class="profile" id="profile_id">
														<?php  
																	if(isset($_POST["detail"]))
																	{
																			$value=$_POST["id"];
																				$result = mysqli_query($con,"Select * from employers where Email= '$value' ");  
																				$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
																	}
																			?>
														<div class="profile_detail_sub_container1"  >
																					<div style="width:15%; height:auto;">
																					<center>
																					<img src="../hirer/logo/<?php echo$row['Logo'];?>" class="company_logo">
																					</center>
																					</div>
																					<div style="width:85%; height:auto;">
																								 <span class="company_name"><?php echo$row['Company_Name'];?></span>
																								<div style="display:flex; align-items:center;" >
																								<img src="../image/location2.png"  style="width:20px; height:20px;"><span style="margin-left:10px;"><?php echo$row['Location'];?></span>
																								</div>
																								
																					</div>
																					
																		</div>	
																		<div class="profile_detail_sub_container2" >
																						<h2>User Name</h2>
																						<p ><?php echo$row['Name'];?></p>
																						 
																						<h2>User Id</h2>
																						<p ><?php echo$row['Email'];?></p>
																						<h2>Company Name</h2>
																						<p ><?php echo$row['Company_Name'];?></p>
																						<h2>Tagline</h2>
																						<p ><?php echo$row['Tagline'];?></p>
																						<h2>Description</h2>
																						<p ><?php echo$row['Description'];?></p>
																						<h2>No_Of_Employers</h2>
																						<p ><?php echo$row['No_Of_Employers'];?></p>
																						<h2>Industry</h2>
																						<p ><?php echo$row['Industry'];?></p>
																						<h2>Business</h2>
																						<p ><?php echo$row['Type_Of_Business'];?></p>
																						
																						<h2>Establish In</h2>
																						<p ><img src="../image/calendar1.png"  style="width:20px; height:20px;"  class="icon_imagess"><span style="margin-left:10px;"><?php echo$row['Establish_In'];?></span></p>
																						
																		</div>
																		
																		
											</div>
											 
															 
										</div>
				

											
												
				</div>
		 


</div>
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
		
		 
	function update(element)
	{
		  if(element=="password_btn")
		{
			document.getElementById("sub_container_id").style.display="none";
			document.getElementById("update_password").style.display="block";
			
		}
		else if(element=="logout_btn")
		{
			document.getElementById("sub_container_id").style.display="none";
			document.getElementById("logout_id").style.display="block";
			
		}
		else{		}
	}
	
	function profile_updated(element)
	{ 
		 if(element=="password")
		{
			document.getElementById("sub_container_id").style.display="block";
			document.getElementById("update_password").style.display="none";
			
		}
		else if(element=="logout")
		{
			document.getElementById("sub_container_id").style.display="block";
			document.getElementById("logout_id").style.display="none";
			
		}
		else
		{
			 
			
		}
	}
	
	if(window.history.replaceState)
	{
			window.history.replaceState(null,1,null,window.location.href);
	}
		</script>
</body>
</html>