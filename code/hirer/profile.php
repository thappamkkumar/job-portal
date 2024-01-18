
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
					
										<div class="sub_container" id="sub_container_id">
										
											
											<div class="profile" id="profile_id">
													<div class="profile_image_container">
													<div class="profile_image" id="image_btn" onclick="update(this.id)">
														<?php 
															if(empty($row_1['Logo'])) 
															{
																
														?>
															<img src="logo/profile_icon.png"  class="image">
														<?php 
															}
															else
															{
																
														?>
															<img src="logo/<?php echo$row_1['Logo'];?>" class="image">
														<?php 
															}
														?>
														 
													
													</div>
													</div>	
													<div class="profile_detail">
													
																					<h2>User Name</h2>
																						<p ><?php echo$row_1['Name'];?></p>
																						 
																						<h2>User Id</h2>
																						<p ><?php echo$row_1['Email'];?></p>
																						<h2>Company Name</h2>
																						<p ><?php echo$row_1['Company_Name'];?></p>
																						<h2>Location of Company</h2>
																						<p ><img src="../image/location2.png" style="width:20px; height:20px;"  class="icon_imagess"><span style="margin-left:10px;"><?php echo$row_1['Location'];?></span></p>
																						 
																								 
																						<h2>Establish In</h2>
																						<p ><img src="../image/calendar1.png"  style="width:20px; height:20px;"  class="icon_imagess"><span style="margin-left:10px;"><?php echo$row_1['Establish_In'];?></span></p>
																						
																						 
																						<h2>Tagline</h2>
																						<p ><?php echo$row_1['Tagline'];?></p>
																						<h2>Description</h2>
																						<p ><?php echo$row_1['Description'];?></p>
																						<h2>No_Of_Employers</h2>
																						<p ><?php echo$row_1['No_Of_Employers'];?></p>
																						<h2>Industry</h2>
																						<p ><?php echo$row_1['Industry'];?></p>
																						<h2>Business</h2>
																						<p ><?php echo$row_1['Type_Of_Business'];?></p>
																						
																						
													</div>
													
													<button type="button" class="profile_btn" onclick="update(this.id)" id="profile_btn"> Update Profile</button>
													
																	
											</div>
											 
													



														<div class="profile" id="update_image">
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
													
													<div class="profile" id="update_profile">
														
														<div class="sub_container_heading">
																	<h1 > Update Profile</h1>
																	<button type="button" onclick="profile_updated(this.id)" id="profile" class="back">&times;</button>
															</div>
																 
																	<form action="update_profile.php" method="post" enctype="multipart/form-data">
																	
																		<table>
																		<tr><td>	<lable>Name</lable>	 <br>	<input type="text"  class="input1" id="name" value="<?php echo$row_1['Name'];?>"  name="name" > </td></tr>
														<tr><td>	<lable>Email</lable>	 <br>	<input type="email"  class="input1" id="email" value="<?php echo$row_1['Email'];?>"  name="email" > </td></tr>	
														<tr><td>	<lable>Company Name</lable>	 <br>	<input type="text"  class="input1" id="company_name" value="<?php echo$row_1['Company_Name'];?>"  name="company_name" > </td></tr>
														<tr><td>	<lable>Tagline</lable>	 <br>	<input type="text"  class="input1" id="tagline" value="<?php echo$row_1['Tagline'];?>"  name="tagline" > </td></tr>
														<tr><td>	<lable>Description</lable>	 <br>	<input type="text"  class="input1" id="description" value="<?php echo$row_1['Description'];?>"  name="description" > </td></tr>
														<tr><td>	<lable>Website</lable>	 <br>	<input type="url"  class="input1" id="website" value="<?php echo$row_1['Website'];?>"  name="website" > </td></tr>
														<tr><td>	<lable>No. of Employers </lable>	 <br>	<input type="number"  class="input1" id="employer" value="<?php echo$row_1['No_Of_Employers'];?>"  name="employer" > </td></tr>
														<tr><td>	<lable>Industry</lable>	 <br>	<input type="text"  class="input1" id="im=industry" value="<?php echo$row_1['Industry'];?>"  name="industry" > </td></tr>
														<tr><td>	<lable>Business</lable>	 <br>	<input type="text"  class="input1" id="business" value="<?php echo$row_1['Type_Of_Business'];?>"  name="business" > </td></tr>
														<tr><td>	<lable>Location</lable>	 <br>	<input type="text"  class="input1" id="location" value="<?php echo$row_1['Location'];?>"  name="location" > </td></tr>
														<tr><td>	<lable>Establish In</lable>	 <br>	<input type="date"  class="input1" id="establish" value="<?php echo$row_1['Establish_In'];?>"  name="establish" > </td></tr>
														
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
		 document.getElementById("menu_name6").style.background="rgba(255,255,255,0.5)";
		 
		 
		 
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
		
		else if(element=="profile_btn")
		{
			document.getElementById("profile_id").style.display="none";
			document.getElementById("update_profile").style.display="block";
			
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