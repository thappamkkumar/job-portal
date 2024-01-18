
<?php
session_start();
require("../database/db_connection.php"); 
?>

<html>
<head>
<title>Dashboard</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="style/style.css" rel="stylesheet" type="text/css" />
	<link href="style/dashboard.css" rel="stylesheet" type="text/css" />
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
							<div class="sub__container_heading">
							<h1>Dashboard</h1>
							</div>
										<div class="dashboard">
										<a  href="list_of_hirer.php"  >
										
											<?php 
													$result1 = mysqli_query($con,"Select * from employers");  
													$row1 = mysqli_fetch_array($result1,MYSQLI_ASSOC);  
													$count1 = mysqli_num_rows($result1);  
											?>
											<span class="total" ><?php echo$count1;?></span>
											<span class="img_container"><img src="../image/hirer.png"></span>
											<span class="link">Total Hirer</span>
										</a>
										<a  href="list_of_jobseeker.php"  >
										<?php 
													$result2 = mysqli_query($con,"Select * from jobseekers");  
													$row2= mysqli_fetch_array($result2,MYSQLI_ASSOC);  
													$count2 = mysqli_num_rows($result2);  
											?>
												<span class="total"><?php echo$count2;?></span>
											<span class="img_container"><img src="../image/job_list.png"></span>
											<span class="link">Total Jobseeker</span>
										</a>
										<a  href="list_of_jobs.php"  >
										<?php 
													$result3= mysqli_query($con,"Select * from jobs");  
													$row3= mysqli_fetch_array($result3,MYSQLI_ASSOC);  
													$count3= mysqli_num_rows($result3);  
											?>
												<span class="total"><?php echo$count3;?></span>
											<span class="img_container"><img src="../image/job5.png"></span>
											<span class="link">Totle Jobs</span>
										</a>
										
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
document.getElementById("dashboard").style.borderLeft="5px solid rgba(255,255,255,1)";
		document.getElementById("icon_dashboard").style.background="rgba(255,255,255,0.5)";
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