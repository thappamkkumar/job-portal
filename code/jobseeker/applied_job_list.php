
<?php
session_start();
require("../database/db_connection.php"); 
?>

<html>
<head>
<title>Applied Jobs</title>
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
								
										<div class="sub_container_heading"><h1> List of Applied Jobs</h1></div>
											 
												<div class="job_container" id="job_container_id">
													<?php
															$result_per_page=10;
															$query="select * from jobs_applied";
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
																
																 
																		$result = mysqli_query($con,"Select * from jobs_applied WHERE Jobseeker_ID='$value_1' LIMIT ".$page_first_result.','.$result_per_page);  
																		 
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
																										
																												<h2 class="compansy_name"><?php echo$row['Company_Name'];?></h2>
																												<p>Applied for:-  <?php echo$row['Job_Title'];?></p>
																												 
																												<p >Applied Date:- <img src="../image/calendar1.png"  style=" margin-left:10px;width:20px; height:20px;"  class="icon_imagess"><span style="margin-left:10px;"><?php echo$row['Date_Of_Applied'];?></span></p>
											
																												  <span class="company_name" style="color:red;"><?php echo$row['Response'];?></span>
																												  
																												<form  action="job_detail.php"  id="GFG" method="post" style=" display:inline;">
																												<input type="text"  class="hidden" style="display:none; " value="<?php echo$row['Company_Name'];?>" name="com_name" >
																												<input type="text"  class="hidden" style="display:none; " value="<?php echo$row['Job_Title'];?>" name="job_title" >
																												<input type="text"  class="hidden" style="display:none; " value="applied" name="applied" >
																												<input type="submit"  class="apply_btn" value="Detail "    name="detail">
																												
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
															echo'<a href="applied_job_list.php? page='.($page-1).' " class="page_number">Prev</a>';
														 }
														 if($page<$number_of_page)
														 {
															echo'<a href="applied_job_list.php? page='.($page+1).' " class="page_number">Next</a>';
														 }
												?>	
										</div>
							</div>
					
					</div>
		 


</div>
<script>

document.getElementById("applied_job_list").style.borderLeft="5px solid rgba(255,255,255,1)";
		document.getElementById("icon_applied_job_list").style.background="rgba(255,255,255,0.5)";
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