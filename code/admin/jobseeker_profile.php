
<?php
session_start();
require("../database/db_connection.php"); 
?>

<html>
<head>
<title>Candidate List</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="style/style.css" rel="stylesheet" type="text/css" />
	    <link href="style/jobseeker_profile_style.css" rel="stylesheet" type="text/css" />
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
											<div class="sub_container">
									<div class="profile" id="profile_id">
																	<?php  
																	if(isset($_POST["detail"]))
																	{
																			$value=$_POST["id"];
																				$result = mysqli_query($con,"Select * from jobseekers where Email= '$value' ");  
																				$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
																	}
																			?>
																		<div class="profile_1">
																					 <div class="sub_profile_1">
																					 <div class="image_container" id="image_btn" onclick="update(this.id)">
																					 <img src="../jobseeker/profile_image/<?php echo$row['Profile_image'];?>"class="profile_1_img" >
																							</div>	
																					 </div>
																					  <div class="sub_profile_2">
																								<span class="user_name"><?php echo$row['Name'];?></span>
																								<span class="user_email"><?php echo$row['Email'];?></span>
																								 	<form>
																									<input type="button" value="&times;" class="back" onclick="history.back()">
																									</form>
																									
																									<a href="../jobseeker/CV/<?php echo$row['CV'];?>" class="profile_update_btn">View Resume</a>
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
																													<h3>Email Id </h3>	<p  class="profile_2_p"> <?php echo$row['Phone_No'];?></p>
																													<h3>Address</h3> <p  class="profile_2_p"> <?php echo$row['Address'];?></p>
																													
																		</div>
																		<div class="profile_2">		
																												<h1 class="profile_2_heading" >Qualification</h1>
																													<h3>Highest Qualification</h3>		<p  class="profile_2_p"> <?php echo$row['Highest_Qualification'];?></p>
																													<h3>Pass Out Year</h3>	<p  class="profile_2_p"> <?php echo$row['Pass_Out_Year'];?></p>
																													<h3>Institue Name</h3>			<p  class="profile_2_p"><?php echo$row['Institute'];?></p>
																													<h3>Marks in Percentage</h3>					<p  class="profile_2_p"><?php echo$row['Marks_In_Percentage'];?></p>
																											
																		</div>
																		
											
									</div>


									
											
							</div>
													
											</div>
											
											
											
											
											
					</div>
		 


</div>
<script>

		document.getElementById("candidate_list").style.borderLeft="5px solid rgba(255,255,255,1)";
		document.getElementById("icon_candidate_list").style.background="rgba(255,255,255,0.5)";
		 document.getElementById("menu_name3").style.background="rgba(255,255,255,0.5)";
		 
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