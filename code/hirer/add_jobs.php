
<?php
session_start();
require("../database/db_connection.php"); 
?>

<html>
<head>
<title>Add/Post Job</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="style/style.css" rel="stylesheet" type="text/css" />
	<link href="style/add_job_style.css" rel="stylesheet" type="text/css" />
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
							 
													<div class="sub_container_heading"><h1> Hirer | Post a Job</h1></div>
													<div class="add_job">
																					<form action="#" method="post" class="add_job_form">
																						
																										<table>
																										<tr><td>	<lable>Category</lable>	 <br>	<input type="text"  class="input1" id="name" placeholder="Development-IT"  name="category" > </td>
																											 <td>		<lable>Job Title</lable>	<br>		<input type="text"  class="input1" id="email" placeholder="e.g. Full Stack Developer" name="job_title" ></td></tr>
																										<tr><td>	<lable>Job Type</lable>   <br>		<input type="text"  class="input1" id="name" placeholder="Full Time"  name="job_type"  > </td>
																											<td>		<lable>Salary Package</lable>	<br>		<input type="text"  class="input1" id="email" placeholder=" e.g. RS 20,000-100,000" name="salary_package" ></td></tr>
																									<tr><td>		<lable>Skill Required</lable>	 <br>	<input type="text"  class="input1" id="name" placeholder="e.g. PHP,MYSQL,HTML etc"  name="skill_required"  > </td>
																											<td>		<lable>Experience</lable>	<br>		<input type="text"  class="input1" id="email" placeholder="e.g. 5-10 month" name="experience" require></td></tr>
																									<tr><td>		<lable>Job Location</lable> 	<br>		<input type="text"  class="input1" id="name" placeholder="e.g. New Delhi, New York, London"  name="job_location" > </td>
																											<td>		<lable>Job Expiration date</lable>	<br>		<input type="date"  class="input1" id="email" placeholder="" name="job_expiration_date" ></td></tr>
																									<tr ><td colspan="2" >		<lable>Job Description</lable> 	<br>		<textarea rows="2"  class="input1" id="name"  name="job_description" ></textarea> </td></tr>
																										<tr><td colspan="2" style="text-align:center;">	<input type="submit" class="add_job_btn"   value="Post Job" name="submit">
																												</td></tr>
																									
																										
																										</table>
																					</form>
													</div>
												
								 
								 
							</div>
							
							<div class="developer_info" style="  padding:30px 10px 30px 10px; display:flex; flex-direction:column; justify-content:center; align-items:center;">
								<h2>Developer Contact</h2> 
								<p style="padding:10px 10px 10px 10px; display:flex;  flex-wrap:wrap; justify-content:center; align-items:center;">
									<a href="tel:6005819576" style="text-decoration:none;">6005819576  </a>, <a  href="mailto:thappamkkumar@gmail.com" style="text-decoration:none; padding-left:10px;"> thappamkkumar@gmail.com</a>
								</p>
							</div>
					</div>
		 


</div>


 <?php

								
								
							if(isset($_POST['submit']))
							{
										$category=$_POST['category'];
										$job_title=$_POST['job_title'];
										$job_type=$_POST['job_type'];
										$salary_package=$_POST['salary_package'];
										$skill_required=$_POST['skill_required'];
										$experience=$_POST['experience'];
										$job_location=$_POST['job_location'];
										$job_expiration_date=$_POST['job_expiration_date'];
										$job_description=$_POST['job_description'];
										
										$date_of_posting_job=date('Y-m-d-H:i:s');
									if($_POST['job_title']!=NULL)
									{
											 
											$result = mysqli_query($con,"Select * from login_info where Email= '$value_1' "); 
											$row = mysqli_fetch_array($result,MYSQLI_ASSOC);  
											$company=$row['Company_name'];
											$sql="INSERT INTO `jobs`(`Category`, `Job_Title`, `Job_Type`, `Salary_Package`, `Skill_Required`, `Experience`, `Job_Location`, `Job_Expiration_Date`, `Job_Description`,`Employer_ID`, `Company_Name`,`Date_Of_Posting_Job`) VALUES ('$category', '$job_title','$job_type','$salary_package','$skill_required','$experience','$job_location','$job_expiration_date','$job_description','$value_1','$company','$date_of_posting_job')";
											if(mysqli_query($con, $sql))
												{
													if(isset($_POST['submit']))
													{
														echo "<script> alert('New Job is added') ; </script>"; 
														 
													}
												}	
											else
											{
												echo "<script> alert('Enable to post job : try again') ; </script>"; 
												echo"ERROR: " . mysqli_error($con);
											
											}
										}

							}		

						?>
						
<script>
		document.getElementById("add_jobs").style.borderLeft="5px solid rgba(255,255,255,1)";
		document.getElementById("icon_add_job").style.background="rgba(255,255,255,0.5)";
		 document.getElementById("menu_name1").style.background="rgba(255,255,255,0.5)";
		 
		 
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