
<?php
session_start();
require("../database/db_connection.php"); 
?>

<html>
<head>
<title>Profile</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="style/style.css" rel="stylesheet" type="text/css" />
	 <link href="style/profile_style.css" rel="stylesheet" type="text/css" />
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
												$result_1 = mysqli_query($con,"Select * from jobseekers WHERE Email='$value_1' ");  
												$row_1 = mysqli_fetch_array($result_1,MYSQLI_ASSOC);			
									?>
									<?php 
										if(empty($row_1['Profile_image'])) 
										{
											
									?>
										<img src="profile_image/profile_icon.png"  class="top_header_image">
									<?php 
										}
										else
										{
											
									?>
										<img src="profile_image/<?php echo$row_1['Profile_image'];?>"  class="top_header_image">
									<?php 
										}
									?>
									<h2 class="top_name"><?php echo$row_1['Name'];?></h2>
							</div>	
					
							<div class="sub_container">
									<div class="profile" id="profile_id">
																	<?php  
																			$value=$_SESSION["username"];
																				$result = mysqli_query($con,"Select * from jobseekers where Email= '$value' ");  
																				$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
																			
																			?>
																		<div class="profile_1">
																					 <div class="sub_profile_1">
																					 <div class="image_container" id="image_btn" onclick="update(this.id)">
																					<?php 
																						if(empty($row['Profile_image'])) 
																						{
																							
																					?>
																						<img src="profile_image/profile_icon.png"  class="profile_1_img">
																					<?php 
																						}
																						else
																						{
																							
																					?>
																						<img src="profile_image/<?php echo$row['Profile_image'];?>"  class="profile_1_img">
																					<?php 
																						}
																					?> 
																							</div>	
																					 </div>
																					  <div class="sub_profile_2">
																								<span class="user_name"><?php echo$row['Name'];?></span>
																								<span class="user_email"><?php echo$row['Email'];?></span>
																								 
																								 <button type="button" onclick="update(this.id)" id="basic_btn" class="profile_update_btn">Basic Informantion</button>
																								 <button type="button" onclick="update(this.id)" id="contact_btn" class="profile_update_btn">Contact</button>
																								 <button type="button" onclick="update(this.id)" id="qualification_btn" class="profile_update_btn">Qualification</button>
																								<button type="button" onclick="update(this.id)" id="resume_btn" class="profile_update_btn">Resume</button>
																										
																					 </div>
																						 
																		</div>
																		
																		<div class="profile_2">		
																												<h1 class="profile_2_heading" >Basic Information</h1>
																													<h3>User name</h3>		<p  class="profile_2_p"> <?php echo$row['Name'];?></p>
																													<h3>Age</h3>					<p  class="profile_2_p"><?php echo$row['Age'];?> </p>
																													<h3>Gender</h3>				<p  class="profile_2_p"> <?php echo$row['Gender'];?></p>
																													<h3>Marital Status</h3>				<p  class="profile_2_p"> <?php echo$row['Married/Un-married'];?></p>
																													<h3>Date Of Birth</h3>	<p  class="profile_2_p"  > <?php echo$row['Date_Of_Birth'];?></p>
																													<h3>Skills</h3>				<p class="profile_2_p"> <?php echo$row['Skills'];?></p>
																													<h3>Hobbies</h3>				<p  class="profile_2_p"> <?php echo$row['Hobbies'];?></p>
																													<h3>Communication Languages</h3>	<p  class="profile_2_p"> <?php echo$row['Communication_Language'];?></p>
																											
																		</div>
																		
																		<div class="profile_2">		
																												<h1 class="profile_2_heading" >Contact</h1>
																													<h3>Phone Number </h3>	<p  class="profile_2_p"> <?php echo$row['Phone_No'];?></p>
																													<h3>Email Id </h3>	<p  class="profile_2_p"> <?php echo$row['Email'];?></p>
																													<h3>Address</h3> <p  class="profile_2_p"> <?php echo$row['Address'];?></p>
																													
																		</div>
																		<div class="profile_2">		
																												<h1 class="profile_2_heading" >Qualification</h1>
																													<h3>Highest Qualification</h3>		<p  class="profile_2_p"> <?php echo$row['Highest_Qualification'];?></p>
																													<h3>Pass Out Year</h3>	<p  class="profile_2_p"> <?php echo$row['Pass_Out_Year'];?></p>
																													<h3>Institue Name</h3>			<p  class="profile_2_p"><?php echo$row['Institute'];?></p>
																													<h3>Marks in Percentage</h3>					<p  class="profile_2_p"><?php echo$row['Marks_In_Percentage'];?></p>
																											
																		</div>
																		<div class="profile_2">
																			<h1 class="profile_2_heading" >Resume</h1>
																			<?php 
																				if(empty($row['CV'])) 
																				{
																					
																			?>
																				<p>Upload you resume</p>
																			<?php 
																				}
																				else
																				{
																					
																			?>
																				<iframe src="CV/<?php echo$row['CV'];?>" height="200" width="250" ></iframe></br>
																				<a href="CV/<?php echo$row['CV'];?>" target="_blank" rel="noopener noreferrer">Click to view resume</a>
																			
																			<?php 
																				}
																			?>
																												
																		</div>
																		
																		
											
									</div>


												
													<div class="profile_2" id="update_qualification">
															<div class="sub_container_heading">
																	<h1 >Update Qualification</h1>
																	<button type="button" onclick="profile_updated(this.id)" id="qualification" class="back">&times;</button>
															</div>
															 
																	<form action="update_profile.php" method="post" enctype="multipart/form-data">
																	
																		<table>
																				<tr><td>	<lable> Highest Qualification</lable>	 <br>	<input type="text" class="input1" name="qualification" value="<?php echo$row['Highest_Qualification'];?>"> </td></tr>
																				<tr><td>	<lable> Pass Out Year</lable>	 <br>	<input type="date" class="input1" name="pass_out_year" value="<?php echo$row['Pass_Out_Year'];?>"> </td></tr>
																				<tr><td>	<lable> Institute Name</lable>	 <br>	<input type="text" class="input1" name="institute" value="<?php echo$row['Institute'];?>"> </td></tr>
																				<tr><td>	<lable> Marks in Percentage</lable>	 <br>	<input type="text" class="input1" name="marks" value="<?php echo$row['Marks_In_Percentage'];?>"> </td></tr>
																	
																				<tr  class="button"><td colspan="2">			
																				<input type="submit" class="profile_update_btn"   value="UPDATE" name="update_qualification"></td></tr>
																					
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
													<div class="profile_2" id="update_cv">
															<div class="sub_container_heading">
																	<h1  > Update Resume</h1>
																	<button type="button" onclick="profile_updated(this.id)" id="cv" class="back">&times;</button>
															</div>
															 
																	<form action="update_profile.php" method="post" enctype="multipart/form-data">
																	
																		<table>
																		<tr><td>	<lable>Select Your CV</lable>	 <br>	<input type="file"  class="input1" name="CV" >   </td></tr>
																		
																		<tr  class="button"><td >			
																		<input type="submit" class="profile_update_btn"   value="UPDATE" name="update_cv"></td></tr>
																			
																		</table>
																	</form>			
													</div>
													<div class="profile_2" id="update_info">
														<div class="sub_container_heading">
																	<h1 > Update Basic Information</h1>
																	<button type="button" onclick="profile_updated(this.id)" id="basic" class="back">&times;</button>
															</div>
														 
																	<form action="update_profile.php" method="post" enctype="multipart/form-data">
																	
																		<table>
																					<tr><td>	<lable>User Name</lable>	 <br>	<input type="text"    class="input1"  name="name"  value="<?php echo$row['Name'];?>" > </td></tr>
																					<tr><td>	<lable> Age</lable>	 <br>	<input type="text" class="input1" name="age" value="<?php echo$row['Age'];?>"> </td></tr>
																					<tr><td>	<lable> Gender</lable>	 <br>	
																					
																					<select name="gender" class="input1">
																					<option value="<?php echo$row['Gender'];?>" hidden><?php echo$row['Gender'];?></option>
																					<option value="Male">Male</option>
																					<option value="Female">Female</option>
																					<option value="Other">Other</option>
																					</select>
																					
																					</td></tr>
																					<tr><td>	<lable> Date of Birth</lable>	 <br>	<input type="date"  class="input1" name="date_of_birth" value="<?php echo$row['Date_Of_Birth'];?>" > </td></tr>
																					<tr><td>	<lable>Marital_Status</lable>	 <br>	

																					<select name="status" class="input1">
																					<option value="<?php echo$row['Married/Un-married'];?>"  hidden> <?php echo$row['Married/Un-married'];?></option>
																					<option value="Married">Married</option>
																					<option value="Single">Single</option>
																					<option value="Widowed">Widowed</option>
																					<option value="Separated/Divorced">Separated/Divorced</option>
																					</select> </td></tr>
																					<tr><td>	<lable> Skill</lable>	 <br>	<input type="text"  name="skills" class="input1" value="<?php echo$row['Skills'];?>"> </td></tr>
																					<tr><td>	<lable> Hobbies</lable>	 <br>	<input type="text" class="input1" name="hobbies" value="<?php echo$row['Hobbies'];?>"> </td></tr>
																					<tr><td>	<lable> Communication languages</lable>	 <br>	<input type="text" class="input1" name="languages" value="<?php echo$row['Communication_Language'];?>"> </td></tr>
																					
																					<tr  class="button"><td colspan="2">			
																					<input type="submit" class="profile_update_btn"   value="UPDATE" name="update_info"></td></tr>
																						
																		</table>
																	</form>
													</div>
													<div class="profile_2" id="update_contact">
														
														<div class="sub_container_heading">
																	<h1 > Update Contact</h1>
																	<button type="button" onclick="profile_updated(this.id)" id="contact" class="back">&times;</button>
															</div>
																 
																	<form action="update_profile.php" method="post" enctype="multipart/form-data">
																	
																		<table>
																					<tr><td>	<lable> Email ID</lable>	 <br>	<input type="email" class="input1" name="email_id" value="<?php echo$row['Email'];?>"> </td></tr>
																					<tr><td>	<lable> Phone No.</lable>	 <br>	<input type="tel" class="input1"  name="phone_no" value="<?php echo$row['Phone_No'];?>" > </td></tr>
																					<tr><td>	<lable> Address</lable>	 <br>	<input type="text" class="input1" name="address" value="<?php echo$row['Address'];?>"> </td></tr>
																					
																					<tr  class="button"><td colspan="2">			
																					<input type="submit" class="profile_update_btn"   value="UPDATE" name="update_contact"></td></tr>
																						
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
		if(element=="basic_btn")
		{
			document.getElementById("profile_id").style.display="none";
			document.getElementById("update_info").style.display="block";
			
		}
		else if(element=="contact_btn")
		{
			document.getElementById("profile_id").style.display="none";
			document.getElementById("update_contact").style.display="block";
			
		}
		else if(element=="qualification_btn")
		{
			document.getElementById("profile_id").style.display="none";
			document.getElementById("update_qualification").style.display="block";
			
		}
		else if(element=="image_btn")
		{
			document.getElementById("profile_id").style.display="none";
			document.getElementById("update_image").style.display="block";
			
		}
		else if(element=="resume_btn")
		{
			document.getElementById("profile_id").style.display="none";
			document.getElementById("update_cv").style.display="block";
			
		}
		 
		else{		}
	}
	
	function profile_updated(element)
	{
		if(element=="basic")
		{
			document.getElementById("profile_id").style.display="block";
			document.getElementById("update_info").style.display="none";
			
		}
		else if(element=="contact")
		{
			document.getElementById("profile_id").style.display="block";
			document.getElementById("update_contact").style.display="none";
			
		}
		else if(element=="qualification")
		{
			document.getElementById("profile_id").style.display="block";
			document.getElementById("update_qualification").style.display="none";
			
		}
		else if(element=="profile")
		{
			document.getElementById("profile_id").style.display="block";
			document.getElementById("update_image").style.display="none";
			
		}
		 
		else
		{
			document.getElementById("profile_id").style.display="block";
			document.getElementById("update_cv").style.display="none";
			
		}
	}
	

	if(window.history.replaceState)
	{
			window.history.replaceState(null,1,null,window.location.href);
	}
		</script>
</body>
</html>