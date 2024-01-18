
<?php
session_start();
require("../database/db_connection.php"); 
?>

<html>
<head>
<title>Search</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="style/style.css" rel="stylesheet" type="text/css" />
	<link href="style/admin_profile_style.css" rel="stylesheet" type="text/css" />
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
					
							<div class="sub_container">
									<div class="profile_container"  id="profile_id">
											<div class="profile_image_container">
												
												<div class="profile_image" id="image_btn" onclick="update(this.id)">
													<?php 
														if(empty($row_1['profile_image'])) 
														{
															
													?>
														<img src="images/profile_icon.png"  class="image">
													<?php 
														}
														else
														{
															
													?>
														<img src="images/<?php echo$row_1['profile_image'];?>" class="image">
													<?php 
														}
													?> 
												
												
												</div>
											</div>
											<div class="profile_detail">
											<h1><?php echo$row_1['Name'];?></h1>
											<div class="content"><span class="icons"><img src="../image/email.png" class="icon_img"></span><span class="em"><?php echo$row_1['Email'];?></span></div>
											<div class="content"><span class="icons"><img src="../image/phone1.png" class="icon_img"></span><span class="em"><?php echo$row_1['Mobile_Number'];?></span></div>
											</div>
											<div class="update_btn_container">
													<button type="button" class="btn" onclick="update(this.id)" id="profile_btn"><img src="../image/edit2.png" class="btn_img"></button>
													<button type="button" class="btn" onclick="update(this.id)" id="password_btn"><img src="../image/password4.png" class="btn_img"></button>
													<button type="button" class="btn" onclick="update(this.id)" id="logout_btn"><img src="../image/logout.png" class="btn_img"></button>
											</div>
									</div>
										
										
										
										
									<div class="profile_2" id="update_password">
															<div class="sub_container_heading">
																	<h1 >Change Password</h1>
																	<button type="button" onclick="profile_updated(this.id)" id="password" class="back">&times;</button>
															</div>
															 
																	<form action="update_profile.php" method="post" enctype="multipart/form-data">
																	
																		<table>
																				 <tr><td>	<lable>Current Password</lable>	 <br>	<input type="password"   class="input1" name="current_password"   > </td></tr>
																				<tr><td>	<lable>New Password</lable>	 <br>	<input type="password" class="input1" name="new_password1"   > </td></tr>	
																				<tr><td>	<lable>Re-enter Password</lable>	 <br>	<input type="password" class="input1"  name="new_password2"  > </td></tr>
							
																				<tr  class="button"><td colspan="2">			
																				<input type="submit" class="profile_update_btn"   value="UPDATE" name="update_password"></td></tr>
																					
																		</table>
																	</form>
													</div>
													<div class="profile_2" id="logout_id">
															 <div class="sub_container_heading">
																	<h1 >LogOut</h1>
																	</div>
																	<p>Click yes to Logout your account.</p>
																	 
															 <form action="update_profile.php" method="post" enctype="multipart/form-data">
																	
																		<table>
																				 
																				<tr  class="button"><td colspan="2">			
																				<input type="submit" class="profile_update_btn"   value="Yes" name="yes">
																				<button type="button" onclick="profile_updated(this.id)" id="logout" class="profile_update_btn">No</button>
																					</td></tr>
																		</table>
																	</form>
																	 
													</div>
													
													<div class="profile_2" id="update_image">
															<div class="sub_container_heading">
																	<h1 >Update Profile Picture</h1>
																	<button type="button" onclick="profile_updated(this.id)" id="image" class="back">&times;</button>
															</div>
																  
																	<form action="update_profile.php" method="post" enctype="multipart/form-data">
																		<table>
																			<tr><td><lable>Select your Profile Picture</lable>	 	</br> <input type="file"  class="input1" name="profile_image" >   </td></tr>

																			<tr><td><input type="submit" class="profile_update_btn"     value="UPDATE" name="update_image"></td></tr>
																			
																		</table>
																	</form>
													</div>
													<div class="profile_2" id="update_profile">
														
														<div class="sub_container_heading">
																	<h1 > Update Profile</h1>
																	<button type="button" onclick="profile_updated(this.id)" id="profile" class="back">&times;</button>
															</div>
																 
																	<form action="update_profile.php" method="post" enctype="multipart/form-data">
																	
																		<table>
																					<tr><td>	<lable> Name</lable>	 <br>	<input type="text" class="input1" name="name" value="<?php echo$row_1['Name'];?>"> </td></tr>
																					 <tr><td>	<lable> Email ID</lable>	 <br>	<input type="email" class="input1" name="email_id" value="<?php echo$row_1['Email'];?>"> </td></tr>
																					<tr><td>	<lable> Phone No.</lable>	 <br>	<input type="tel" class="input1"  name="phone_no" value="<?php echo$row_1['Mobile_Number'];?>" > </td></tr>
																					 
																					<tr  class="button"><td colspan="2">			
																					<input type="submit" class="profile_update_btn"   value="UPDATE" name="update_profile"></td></tr>
																						
																		</table>
																	</form>
													</div>
													
													
													
							</div>
					
					</div>
		 


</div>
<script>

document.getElementById("profile").style.borderLeft="5px solid rgba(255,255,255,1)";
		document.getElementById("icon_profile").style.background="rgba(255,255,255,0.5)";
		 document.getElementById("menu_name5").style.background="rgba(255,255,255,0.5)";
		 
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
		
		if(element=="image_btn")
		{
			document.getElementById("profile_id").style.display="none";
			document.getElementById("update_image").style.display="block";
			
		}
	
		else if(element=="password_btn")
		{
			document.getElementById("profile_id").style.display="none";
			document.getElementById("update_password").style.display="block";
			
		}
		else if(element=="profile_btn")
		{
			document.getElementById("profile_id").style.display="none";
			document.getElementById("update_profile").style.display="block";
			
		}
		else if(element=="logout_btn")
		{
			document.getElementById("profile_id").style.display="none";
			document.getElementById("logout_id").style.display="block";
			
		}
		else{		}
	}
	
	function profile_updated(element)
	{
		if(element=="image")
		{
			document.getElementById("profile_id").style.display="block";
			document.getElementById("update_image").style.display="none";
			
		}
		else if(element=="profile")
		{
			document.getElementById("profile_id").style.display="block";
			document.getElementById("update_profile").style.display="none";
			
		}
		else if(element=="password")
		{
			document.getElementById("profile_id").style.display="block";
			document.getElementById("update_password").style.display="none";
			
		}
		else if(element=="logout")
		{
			document.getElementById("profile_id").style.display="block";
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