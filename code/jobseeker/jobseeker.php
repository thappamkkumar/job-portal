
<?php
session_start();
require("../database/db_connection.php"); 
?>

<html>
<head>
<title>Home</title>
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
								<div class="search_container">
									<h1 class="search_heading">Search for jobs !!!</h1>
											<form  action="job_search.php"   method="post">
												<input type="text" placeholder="Enter Job Title" name="job_title" class="search_input">
												<input type="text" placeholder="Enter Company Name" name="company_name" class="search_input">
												<input type="submit" placeholder="Search" value="Search" name="search" class="search_btn" onclick=" ">
												</form>
										
										
									</div>
										<div class="sub_container_heading"><h1> List of Recent Added Jobs</h1></div>
											 
												<div class="job_container" id="job_container_id">
													<?php
															$result_per_page=10;
															$query="select * from jobs";
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
																
																 
																		$result = mysqli_query($con,"Select * from jobs  LIMIT ".$page_first_result.','.$result_per_page);  
																		 
															while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
																{ 
															$employer_id=$row['Employer_ID'];
															$result2 = mysqli_query($con,"Select * from employers WHERE Email='$employer_id' ");  
																$row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC)
															?>
															
														
																	<div class="job" id="id_job" >
																											<div class="job_logo_container">
																											<img src="../hirer/logo/<?php echo$row2['Logo'];?>" class="job_logo" >
																											</div>
																						<div  class="job_detail_container">
																										<form  action="job_detail.php"  id="GFG" method="post" style=" display:inline;">
																												<input type="text"  class="hidden" style="display:none; " value="<?php echo$row['Company_Name'];?>" name="com_name" >
																												<input type="text"  class="hidden" style="display:none; " value="<?php echo$row['Job_Title'];?>" name="job_title" >
																												<input type="text"  class="hidden" style="display:none; " value="not_applied" name="applied" >
																												<input type="submit"  class="job_title" value="<?php echo$row['Job_Title'];?> "    name="detail">
																												
																												<span class="company_name"><?php echo$row['Company_Name'];?></span>
																												
																												  
																																																							<div class="sub_job_detail_container"  >
																												<span class="location"  ><img src="../image/location3.png"  style="width:20px;height:20px;margin-left:20px;" class="icon_imagess"> <span  style="margin-left:10px;" ><?php echo$row['Job_Location'];?></span></span>
																												<span  class="date_of_posting"  ><img src="../image/calendar1.png"   style="width:20px;height:20px; margin-left:20px;" class="icon_imagess"><span   style="margin-left:10px;"><?php echo$row['Date_Of_Posting_Job'];?></span></span>
																												<span  class="salary"  >  <img src="../image/rupee.png" style="width:20px;height:20px;margin-left:20px; " class="icon_imagess"> <span    style="margin-left:10px;"> <?php echo$row['Salary_Package'];?></span></span>
																												</div>
																												
																												<span class="job_type"> <?php echo$row['Job_Type'];?></span>
																												
																												
																										</form>
																						</div>
																	</div>
													
														
															
														<?php
															}
															
															
												?>	
												<div class="page_number_container">
											
														<?php
														 
														 if($page>1)
														 {
															echo'<a href="jobseeker.php? page='.($page-1).' " class="page_number">Prev</a>';
														 }
														 if($page<$number_of_page)
															echo'<a href="jobseeker.php? page='.($page+1).' " class="page_number">Next</a>';
														 
												?>	
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
<script>

document.getElementById("home").style.borderLeft="5px solid rgba(255,255,255,1)";
		document.getElementById("icon_home").style.background="rgba(255,255,255,0.5)";
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