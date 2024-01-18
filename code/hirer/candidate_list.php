
<?php
session_start();
require("../database/db_connection.php"); 
?>

<html>
<head>
<title>Candidate List</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="style/style.css" rel="stylesheet" type="text/css" />
	    <link href="style/candidate_list_style.css" rel="stylesheet" type="text/css" />
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
																							<div class="search_container">
																									<form  action="search_candidate.php"   method="post">
																										<input type="text" placeholder="Enter Job Title" name="search_value" class="search_input">
																										<input type="submit" placeholder="Search" name="search" class="search_btn" onclick=" ">
																										</form>
																						
																												
																							</div>
											

																<div class="sub_container_heading"><h1> Hirer | List of Candidates</h1></div>
													<div class="candidate_container">
													 
														<?php
																				$result_per_page=10;
																						$query="Select * from jobs_applied WHERE Employer_ID='$value_1' ";
																						$result_query=mysqli_query($con,$query);
																						$number_of_result=mysqli_num_rows($result_query);
																						$number_of_page=ceil($number_of_result/$result_per_page);
																						if(!isset($_GET['page']))
																						{
																							$page=1;
																						}
																						else
																						{
																							$page=$_GET['page'];
																						}
																						$page_first_result=($page-1)*$result_per_page;
																						
																						$result = mysqli_query($con,"Select * from jobs_applied WHERE Employer_ID='$value_1' LIMIT ".$page_first_result.','.$result_per_page);   
																						while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
																							{ 
																								$jobseeker_id=$row['Jobseeker_ID'];
																								$result2 = mysqli_query($con,"Select * from jobseekers WHERE Email='$jobseeker_id' ");  
																								$row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);
																													
														?>
														
														
													
																<div class="candidate">
																	<div class="candidate_image_container">
																				<img src="../jobseeker/profile_image/<?php echo$row2['Profile_image'];?>" class="candidate_profile_image" >
																		</div>
																	<div class="candidate_detail_container">
																				<span class="name"><?php echo$row2['Name'];?></span>
																				<span class="applied_date">Applied Date : <?php echo$row['Date_Of_Applied'];?></span>
																				<span class="applied_for">Applied for : <?php echo$row['Job_Title'];?></span>
																				<span class="phone_no"><?php echo$row2['Phone_No'];?></span>
																				<span class="email"><?php echo$row2['Email'];?></span>
																				<span class="response"><?php echo$row['Response'];?></span>
																				<a href="../jobseeker/CV/<?php echo$row2['CV'];?>" target="_blank" rel="noopener noreferrer" class="resume">RESUME</a>
																				
																				<form  action="jobseeker_profile.php"  method="post" style=" display:inline;">
																					<input type="hidden" style="display:none; " value="<?php echo$row2['Email'];?>" name="id" >
																					<input type="submit"   value="Veiw Detail" class="view_detail" name="detail">
																				</form>	
																				<form  action="application_detail.php"   method="post" style=" display:inline;">
																					<input type="hidden" style="display:none; " value="<?php echo$row['Employer_ID'];?>" name="employer_id" >
																					<input type="hidden" style="display:none; " value="<?php echo$row['Job_Title'];?>" name="job_title" >
																					<input type="hidden" style="display:none; " value="<?php echo$row['Company_Name'];?> " name="company_name" >
																					<input type="hidden" style="display:none; " value="<?php echo$row['Date_Of_Applied'];?> " name="applied_date" >
																					<input type="hidden" style="display:none; " value="<?php echo$row['Response'];?> " name="response" >
																					<input type="hidden" style="display:none; " value="<?php echo$row['Jobseeker_ID'];?> " name="jobseeker_id" >
																					
																					<input type="submit"   value="Application Detail"  class="application_detail" name="detail">
																				</form>	

																	</div>
															
																</div>
														
														
														
															
														<?php
															}
														?>	
															 
													</div>
													
													
													
											</div>
											
											<div class="page_number_container">
											
														<?php
														 
														 if($page>1)
														 {
															echo'<a href="candidate_list.php? page='.($page-1).' " class="page_number">Prev</a>';
														 }
														 if($page<$number_of_page)
															echo'<a href="candidate_list.php? page='.($page+1).' " class="page_number">Next</a>';
														 
												?>	
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