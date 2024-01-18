
<?php
session_start();
require("../database/db_connection.php"); 
?>

<html>
<head>
<title>Job List | Detail</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="style/style.css" rel="stylesheet" type="text/css" />
	<link href="style/job_list_style.css" rel="stylesheet" type="text/css" />
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
									<div class="sub_container_heading">
										<h1 >Hirer | Detail of Job</h1>
										<form>
										<input type="button" value="&times;" class="back" onclick="location.href='job_list.php';">
										</form>
									</div>
									
																				<?php      
																						 
																						 if(isset($_POST['detail']))
																					{	
																					   $job_title=$_POST["job_title"];
																						$company_name=$_POST["com_name"];
																							$result = mysqli_query($con,"Select * from jobs where Job_Title='$job_title' AND Company_Name='$company_name' ");
																								$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
																								$_SESSION["value"]=$row['S_No'];
																								
																								
																					?>		

																						<div class="job_detail_sub_container1" id="id_job" >
																									<div style="width:20%; height:auto;">
																									<img src="logo/<?php echo$row_1['Logo'];?>" class="detail_logo">
																									</div>
																									<div style="width:80%; height:auto;">
																												<span  class="detail_title"><?php echo$row['Job_Title'];?></span>
																												
																												<h3 class="detail_company_name"><?php echo$row['Company_Name'];?></h3>
																												
																												<div style="display:flex; align-items:center;" >
																												<img src="../image/location2.png"  style="width:20px;height:20px;" class="icon_imagess"> <span style="margin-left:10px;" ><?php echo$row['Job_Location'];?> </span>
																												<img src="../image/calendar1.png"   style="width:20px;height:20px; margin-left:20px;" class="icon_imagess"><span  style="margin-left:10px;"><?php echo$row['Date_Of_Posting_Job'];?></span>
																												</div>
																												<div style="display:flex; align-items:center;" >
																												<img src="../image/rupee.png" style="width:20px;height:20px; " class="icon_imagess"> <span  style="margin-left:10px;"><?php echo$row['Salary_Package'];?></span>
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
																									<p id="job_location"><?php echo$row['Job_Location'];?></p>
																									<h2>Salary Package</h2>
																									<p id="salary_package"><?php echo$row['Salary_Package'];?></p>
																									<h2>Date of Job posting</h2>
																									<p id="salary_package"><?php echo$row['Date_Of_Posting_Job'];?></p>
																									
																									<h2>Job Expiration Date</h2>
																									<p id="job_expiration_date"><?php echo$row['Job_Expiration_Date'];?></p>
																												
																						</div>
																			
																					<?php
																									
																						}
																						
																						?>
																						
																						
																						
																						
																	<div class="job_edit">
																	
																												<a href="edit_job.php" class="">Edit Job</a>		
																													
																														
																	</div>
																	<div class="job_edit">
																	
																												
																														<a href="delete_job.php" >Delete Job</a>	
																														
																	</div>
																						
																						
							</div>
							
							
							
					</div>
		 


</div>
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