
<?php
session_start();
require("../database/db_connection.php"); 
?>

<html>
<head>
<title>Job List | Detail</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="style/style.css" rel="stylesheet" type="text/css" />
	<link href="style/home_style.css" rel="stylesheet" type="text/css" />
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
									<div class="sub_container_heading">
									<h1 > Detail of Job</h1>
									<form>
									<input type="button" value="&times;" class="back" onclick="location.href='jobseeker.php'; ">
									</form>
									</div>
									
									<?php      
																						 
																							 if(isset($_POST['detail']))
																					{	
																					   
																					   $job_title=$_POST["job_title"];
																						$company_name=$_POST["com_name"];
																						$applied=$_POST["applied"];
																							$result = mysqli_query($con,"Select * from jobs where Job_Title='$job_title' AND Company_Name='$company_name' ");  
																								$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
																								
																						$employer_id=$row['Employer_ID'];
																						$result2 = mysqli_query($con,"Select * from employers WHERE Email='$employer_id' ");  
																						$row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC)
																								 
																					?>		

																						<div class="job_detail_sub_container1" id="id_job" >
																									<div style="width:20%; height:auto;">
																									<img src="../hirer/logo/<?php echo$row2['Logo'];?>" class="detail_logo">
																									</div>
																									<div style="width:80%; height:auto;">
																												<span  class="detail_title"><?php echo$row['Job_Title'];?></span>
																												
																												<h3 class="detail_company_name"><?php echo$row['Company_Name'];?></h3>
																												 
																												<div style="display:flex; align-items:center;" >
																												<img src="../image/location3.png"  style="margin-left:10px; width:20px;height:20px;" class="icon_imagess"> <span style="margin-left:10px;" ><?php echo$row['Job_Location'];?></span>
																												<img src="../image/calendar1.png"   style="width:20px;height:20px; margin-left:20px;" class="icon_imagess"><span  style="margin-left:10px;"><?php echo$row['Date_Of_Posting_Job'];?></span>
																												 </div>
																												 <div style="display:flex; align-items:center;" >
																												 <img src="../image/rupee.png" style="width:20px;height:20px;margin-left:20px; " class="icon_imagess"> <span  style="margin-left:10px;"> <?php echo$row['Salary_Package'];?></span>
																												</div>
																												<span class="detail_job_type"><?php echo$row['Job_Type'];?></span>
																												
																									</div>
																									
																						</div>	
																						<div class="job_detail_sub_container2" >
																										<h2>Category</h2>
																									<p id="category"><?php echo$row['Category'];?></p>
																									<h2>Overview</h2>
																									<p d="job_description"><?php echo$row['Job_Description'];?></p>
																									<h2>Required Experiance</h2>
																									<p id="experience"><?php echo$row['Experience'];?></p>
																									
																									<h2>Skill Required </h2>
																									<p id="skill_required"><?php echo$row['Skill_Required'];?></p>
																									<h2>Job location</h2>
																									 <p > <img src="../image/location3.png"  style="  width:20px; height:20px;"  class="icon_imagess"><span style="margin-left:10px;"><?php echo$row['Job_Location'];?></span></p>
											
																									<h2>Salary Package</h2>
																									 <p > <img src="../image/rupee.png"  style="  width:20px; height:20px;"  class="icon_imagess"><span style="margin-left:10px;"><?php echo$row['Salary_Package'];?></span></p>
											
																									<h2>Date of Job posting</h2>
																									 <p > <img src="../image/calendar1.png"  style="  width:20px; height:20px;"  class="icon_imagess"><span style="margin-left:10px;"><?php echo$row['Date_Of_Posting_Job'];?></span></p>
											
																									<h2>Job Expiration Date</h2>
																									 <p > <img src="../image/calendar1.png"  style="  width:20px; height:20px;"  class="icon_imagess"><span style="margin-left:10px;"><?php echo$row['Job_Expiration_Date'];?></span></p>
											
																									
																									<center>
																											<form  action="job_detail.php" method="post" style="display:inline;"style="width:100%; height:auto;">
																											
																																		
																																	<input type="hidden"     value="<?php echo$row['Category'];?>"  name="category" > 
																																	<input type="hidden"    value="<?php echo$row['Job_Title'];?>" name="job_title" >
																																	<input type="hidden"   value="<?php echo$row['Company_Name'];?>"  name="company_name" > 
																																	<input type="hidden"    value="<?php echo$_SESSION["username"];?>" name="jobseeker_id" >
																																	<input type="hidden"    value="<?php echo$row['Employer_ID'];?>"  name="employer_id" >
																																	<input type="hidden"    value="<?php echo$row['Job_Type'];?>" name="job_type" >
																																	<input type="hidden"    value="<?php echo$row['Salary_Package'];?>" name="salary_package" >
																																	<input type="hidden"    value="<?php echo$row['Skill_Required'];?>" name="skill_required" >
																																	<input type="hidden"    value="<?php echo$row['Experience'];?>" name="experience" >
																																	<input type="hidden"    value="<?php echo$row['Job_Location'];?>" name="job_location" >
																																	<input type="hidden"    value="<?php echo$row['Job_Expiration_Date'];?>" name="job_expiration_date" >
																																	<input type="hidden"    value="<?php echo$row['Job_Description'];?>" name="job_description" >
																																	<input type="hidden"    value="<?php echo$row['Date_Of_Posting_Job'];?>" name="date_of_posting_job" >
																																	
																																<?php	
																															if($applied=="applied")
																															{
																															}
																															else
																															{
																																echo"<input type='submit' class='apply_btn' value='APPLY FOR THIS JOB NOW' name='apply'>";
																															}
																														?>
																											</form>
																									</center>
																												
																						</div>
																			
																					<?php
																									
																						}
																						
																						?>
							</div>
							
							
							
					</div>
		 


</div>

<?php	
	
	

		if(isset($_POST['apply']))
			{	
						$job_title=$_POST['job_title'];
						$category=$_POST['category'];
						$company_name=$_POST['company_name'];
						$employer_id=$_POST['employer_id'];
						$jobseeker_id=$_POST['jobseeker_id'];
						$job_type=$_POST['job_type'];
						$salary_package=$_POST['salary_package'];
						$skill_required=$_POST['skill_required'];
						$experience=$_POST['experience'];
						$job_location=$_POST['job_location'];
						$job_expiration_date=$_POST['job_expiration_date'];
						$job_description=$_POST['job_description'];
						
						$date_of_applied=date('Y-m-d-H:i:s');  
						  
					$sql="INSERT INTO `jobs_applied`(`S.no`,`Company_Name`,`Job_Title`, `Employer_ID`, `Jobseeker_ID`,`Date_Of_Applied`, `Response`)VALUES ('','$company_name',  '$job_title','$employer_id','$jobseeker_id','$date_of_applied','Not Yet Responsed')";
									if(mysqli_query($con, $sql))
										{
											
												echo "<script> alert('Applying job is successful'); window.location.href='jobseeker.php'; </script>"; 
												 
										}	
									else
									{
										echo"Can't able to apply this job" . mysqli_error($con);
										
										echo "<script> alert('Enable to apply the job');  </script>"; 
					
									}

			}
?>

<script>

		document.getElementById("job_list").style.borderLeft="5px solid rgba(255,255,255,1)";
		document.getElementById("icon_job_list").style.background="rgba(255,255,255,0.5)";
		 document.getElementById("menu_name2").style.background="rgba(255,255,255,0.5)";
		  
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