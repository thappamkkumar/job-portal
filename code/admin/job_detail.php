
<?php
session_start();
require("../database/db_connection.php"); 
?>

<html>
<head>
<title>Job List | Detail</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="style/style.css" rel="stylesheet" type="text/css" />
	<link href="style/job_detail_style.css" rel="stylesheet" type="text/css" />
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
									<div class="sub_container_heading">
									<h1 > Detail of Job</h1>
									<form>
									<input type="button" value="&times;" class="back" onclick="history.back()">
									</form>
									</div>
									
									<?php      
																						 
																							 if(isset($_POST['detail']))
																					{	
																					   
																					   $job_title=$_POST["job_title"];
																						$company_name=$_POST["com_name"];
																							$result = mysqli_query($con,"Select * from jobs where Job_Title='$job_title' AND Company_Name='$company_name' ");  
																								$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
																								
																								
																								
																					?>		

																						<div class="job_detail_sub_container1" id="id_job" >
																									<div style="width:20%; height:auto;">
																									<img src="../hirer/logo/<?php echo$row['Logo'];?>" class="detail_logo">
																									</div>
																									<div style="width:80%; height:auto;">
																												<span  class="detail_title"><?php echo$row['Job_Title'];?></span>
																												
																												<h3 class="detail_company_name"><?php echo$row['Company_Name'];?></h3>
																												<div style="display:flex; align-items:center;" >
																												<img src="../image/location2.png"  class="icon_imagess"> <span style="margin-left:10px;" ><?php echo$row['Job_Location'];?> </span>
																												<img src="../image/calendar1.png" style="margin-left:20px;"  class="icon_imagess"><span  style="margin-left:10px;"><?php echo$row['Date_Of_Posting_Job'];?></span>
																												</div>
																												<div style="display:flex; align-items:center;" >
																												<img src="../image/rupee.png" class="icon_imagess"> <span  style="margin-left:10px;"> <?php echo$row['Salary_Package'];?> </span>
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
						$date_of_applied=date('m/d/Y h:i:s',time());
						  
						  
					$aa = mysqli_query($con,"Select * from jobs_applied WHERE Company_Name='$company_name' AND Job_Title='$job_title' AND Jobseeker_ID='$jobseeker_id'");  
					$row = mysqli_fetch_array($aa,MYSQLI_ASSOC);
					$count=mysqli_num_rows($aa);
							if($count>0)
							{
										header("Location: jobseeker.php");
							}
						else
						{			echo "<script> alert('Applying job is successful') ; </script>"; 
									$sql="INSERT INTO `jobs_applied`(`S.no`,`Company_Name`, `Category`, `Job_Title`, `Employer_ID`, `Jobseeker_ID`, `Job_Type`, `Salary_Package`, `Skill_Required`, `Experience`, `Job_Location`, `Job_Description`, `Job_Expiration_Date`,`Date_Of_Applied`, `Response`)VALUES ('','$company_name', '$category', '$job_title','$employer_id','$jobseeker_id','$job_type','$salary_package','$skill_required','$experience','$job_location','$job_description','$job_expiration_date','$date_of_applied','')";
									if(mysqli_query($con, $sql))
										{
											
												 
												header("Location: jobseeker.php");
										}	
									else
									{
										echo"Can't able to apply this job" . mysqli_error($con);
										
										
					
									}
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