
<?php
session_start();
require("../database/db_connection.php"); 
?>

<html>
<head>
<title>Job List | Edit</title>
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
									<div class="sub_container_heading">
											<h1 > Employer | Update detail of Job</h1>
											<a href="job_list.php" style="position:absolute;display:inline-block; text-align:center; width:30px;height:30px; right:20px; top:20px;text-decoration:none; font-size:30px; border:2px solid #000;color:#000; background:#fff;">&times;</a>
									</div>
												<div class="add_job">
													 <?php      
													
														$value=$_SESSION["value"];
														$result = mysqli_query($con,"Select * from jobs where S_No= '$value' ");  
														$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
														
															$applied_job_title=$row['Job_Title'];
															$applied_company_name=$row['Company_Name'];
															$email_id=$row['Employer_ID'];
														?>
																
													<form action="#" method="post" class="add_job_form">
																		
																		<table>
																		<tr><td>	<lable>Category</lable>	 <br>	<input type="text"  class="input1" id="name" value="<?php echo$row['Category'];?>"  name="category" > </td>
																			 <td>		<lable>Job Title</lable>	<br>		<input type="text"  class="input1" id="email" value="<?php echo$row['Job_Title'];?>" name="job_title" ></td></tr>
																		<tr><td>	<lable>Job Type</lable>   <br>		<input type="text"  class="input1" id="name" value="<?php echo$row['Job_Type'];?>"  name="job_type"  > </td>
																			<td>		<lable>Salary Package</lable>	<br>		<input type="text"  class="input1" id="email" value="<?php echo$row['Salary_Package'];?>" name="salary_package" ></td></tr>
																	<tr><td>		<lable>Skill Required</lable>	 <br>	<input type="text"  class="input1" id="name" value="<?php echo$row['Skill_Required'];?>"  name="skill_required"  > </td>
																			<td>		<lable>Experience</lable>	<br>		<input type="text"  class="input1" id="email" value="<?php echo$row['Experience'];?>" name="experience" require></td></tr>
																	<tr><td>		<lable>Job Location</lable> 	<br>		<input type="text"  class="input1" id="name" value="<?php echo$row['Job_Location'];?>"   name="job_location" > </td>
																		<td>		<lable>Job Expiration date</lable>	<br>		<input type="date"  class="input1" id="email" value="<?php echo$row['Job_Expiration_Date'];?>" name="job_expiration_date" ></td></tr>
																	<tr ><td colspan="2">		<lable>Job Description</lable> 	<br>		<textarea rows="4"  class="input1" id="name"   name="job_description" > <?php echo$row['Job_Description'];?> </textarea> </td></tr>
														
																		<tr  class="button"><td colspan="2" style="text-align:center;">	<input type="submit" class="add_job_btn"  value="UPDATE" name="update"></td></tr>
																		
																		</table>
																		

																	
																
																	</form>		
									 </div>
							
							
							</div>
		 


</div>


<?php

	if(isset($_POST['update']))
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
				
			
					
					$sql="UPDATE `jobs` SET `Category`='$category',`Job_Title`='$job_title',`Job_Type`='$job_type',`Salary_Package`='$salary_package',`Skill_Required`='$skill_required',`Experience`='$experience',`Job_Location`='$job_location',`Job_Expiration_Date`='$job_expiration_date',`Job_Description`='$job_description' WHERE `jobs`.`S_No` = '$value'";
					
					if(mysqli_query($con, $sql))
						{
							$sql2="UPDATE `jobs_applied` SET `Job_Title`='$job_title' WHERE `jobs_applied`.`Job_Title` = '$applied_job_title' AND `Employer_ID`='$email_id'AND `Company_Name`='$applied_company_name' ";
							if(mysqli_query($con, $sql2))
						{
							echo "<script> alert('Job is updated') ;  window.location.replace('job_list.php');</script>"; 
						}
						else
					{
						echo "<script> alert('Enable to update job : try again') ; </script>"; 
						echo"ERROR: " . mysqli_error($con);
					}
						
								
			
						}	
					else
					{
						echo "<script> alert('Enable to update job : try again') ; </script>"; 
						echo"ERROR: " . mysqli_error($con);
						
			
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