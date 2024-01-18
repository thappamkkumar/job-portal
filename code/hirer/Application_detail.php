
<?php
session_start();
require("../database/db_connection.php"); 
?>

<html>
<head>
<title>About us</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="style/style.css" rel="stylesheet" type="text/css" />
	<link href="style/application_detail_style.css" rel="stylesheet" type="text/css" />
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
								 <div class="application_detail">
								 <button type="button" class="back_btn" onclick="location.href='candidate_list.php'; ">&times;</button>
										<h1> Jobs Details</h1>
										<?php
											if(isset($_POST["detail"]))
											{
												$employer_id=$_POST["employer_id"];
												$jobseeker_id=$_POST["jobseeker_id"];
												$job_title=$_POST["job_title"];
												$company_name=$_POST["company_name"];
												$applied_date=$_POST["applied_date"];
												$response=$_POST["response"];
												$result = mysqli_query($con,"Select * from jobs WHERE Employer_ID='$employer_id' AND Job_Title='$job_title' AND Company_Name='$company_name' ");   
													$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
														
											}
										?>
										
										<table>
										<tr><th>Job Title</th><td><?php echo$row['Job_Title'];?></td><th>Salary Package</th><td><?php echo$row['Salary_Package'];?></td></tr>
										<tr><th >Job Description</th><td colspan="3"><?php echo$row['Job_Description'];?></td></tr>
										<tr><th>Job Location</th><td><?php echo$row['Job_Location'];?></td><th>Skills Required</th><td><?php echo$row['Skill_Required'];?></td></tr>
										<tr><th>Apply Date</th><td><?php echo$applied_date;?></td></tr>
										
										
													<form action="Application_detail.php" method="post">
												<input type="hidden" style="display:none; " value="<?php echo$jobseeker_id;?> " name="jobseeker_id" >
												<input type="hidden" style="display:none; " value="<?php echo$employer_id;?>" name="employer_id" >
												<input type="hidden" style="display:none; " value="<?php echo$job_title;?>" name="job_title" >
														
												<tr><th>Status</th><td colspan="2" id="select"><select name="response" class="input_select">
																							<option value="<?php echo$response;?>" hidden><?php echo$response;?></option>
																							<option value="Short Listed">Short Listed</option>
																							<option value="Rejected">Rejected</option>
																							<option value="Selected">Selected</option>
																							<option value="Waiting ">waiting</option>
																							</select></td>
																							
													<td><input type="submit" name="update_status" value="Update Status" class="response_btn"></td>
													</tr>
														</form>			
																					
										</table>
										
										
										
												
										 
										
								 </div>
								 
							</div>
					</div>
		 


</div>

<?php

	if(isset($_POST["update_status"]))
	{
		$response_value=$_POST["response"];
		$employer_id2=$_POST["employer_id"];
			$jobseeker_id2=$_POST["jobseeker_id"];
			$job_title2=$_POST["job_title"];
								
	$sql="UPDATE `jobs_applied` SET `Response`='$response_value' WHERE `jobs_applied`.`Jobseeker_ID` = '$jobseeker_id2' AND Employer_ID='$employer_id2' AND Job_Title='$job_title2' ";
		if(mysqli_query($con, $sql))
								{
									echo "<script> alert('Status updated') ; location.href='candidate_list.php'; </script>"; 	
									
								}	
								else
								{
								
								echo"ERROR: " . mysqli_error($con);
					
								}			
	}	
	
?>
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
		 
		 
		
		 
	if(window.history.replaceState)
	{
			window.history.replaceState(null,1,null,window.location.href);
	}
		</script>
</body>
</html>