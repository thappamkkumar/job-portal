
<?php
session_start();
require("../database/db_connection.php"); 
?>

<html>
<head>
<title>List of jobs </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="style/style.css" rel="stylesheet" type="text/css" />
	<link href="style/list_of_jobseeker.css" rel="stylesheet" type="text/css" />
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
										<div class="jobseeker_container">
												<h2>Job List</h2>
												<div class="search_container">
												<form  action="#"   method="post">
												<input type="search" class="search_input" name="search_value"><input type="submit" value="Search" name="search" class="search_btn">
												</form>
												</div>
												<div class="content_container">
														<table>
														<tr><th>S.NO.</th><th>JOB TITLE</th><th>COMPANY NAME</th><th>LOCATION</th><th>DATE OF POSTING</th><th>ACTION</th></tr>
														
														
														
														<?php
																				$result_per_page=10;
																					if(isset($_POST['search']))
																										{	
																											$search_value=$_POST['search_value'];
																											$result_query=mysqli_query($con,"Select * from jobs WHERE Job_Title='$search_value'"); 
																							
																										}
																										else{
																						$query="Select * from jobs";
																						$result_query=mysqli_query($con,$query);
																										}
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
																						
																						
																						
																						 if(isset($_POST['search']))
																										{	
																											echo"<a href='list_of_jobs.php' style='background:rgba(34,98,198,0.5);    color:rgba(255,255,255,1); text-decoration:none; display:block; width:90%; height:30px; margin:auto; font-size:25px; font-weight:bold;'>	<span style='display:inline-block; width:20px; '></span>&times;</a>";
																										   $search_value=$_POST['search_value'];
																											$result2 = mysqli_query($con,"Select * from jobs WHERE Job_Title='$search_value' LIMIT ".$page_first_result.','.$result_per_page); 
																							
																										}
																										else{
																							$result2 = mysqli_query($con,"Select * from jobs LIMIT ".$page_first_result.','.$result_per_page); 
																										}
																							$s_no=$page_first_result+1;
																
																								while($row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC))
																							{ 
																								 			
														?>
														
														<tr>
														<td><?php echo$s_no; ?></td>
														<td><?php echo$row2['Job_Title'];?></td>
														<td><?php echo$row2['Company_Name'];?></td>
														<td><?php echo$row2['Job_Location'];?></td>
														<td><?php echo$row2['Date_Of_Posting_Job'];?></td>
														<td>
															<form  action="job_detail.php"  method="post" style=" display:inline;">
																<input type="text"  class="hidden" style="display:none; " value="<?php echo$row2['Company_Name'];?>" name="com_name" >
																<input type="text"  class="hidden" style="display:none; " value="<?php echo$row2['Job_Title'];?>" name="job_title" >
																										
																<input type="submit"   value="Veiw Detail" class="view_detail" name="detail">
															</form>
														</td>
														</tr>
														
															
														<?php
														$s_no=$s_no+1;
															}
														?>	
														
														</table>
												</div>
												<div class="page_container">
														<?php
														 
														 if($page>1)
														 {
															echo'<a href="list_of_jobs.php? page='.($page-1).' " class="page_number">Prev</a>';
														 }
														 if($page<$number_of_page)
															echo'<a href="list_of_jobs.php? page='.($page+1).' " class="page_number">Next</a>';
														 
												?>	
												</div>
										</div>
										
							</div>
					
					</div>
		 


</div>
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