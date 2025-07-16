
<?php
session_start();
require("../database/db_connection.php"); 
?>

<html>
<head>
<title>Contact</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="style/style.css" rel="stylesheet" type="text/css" />
	 <link href="style/contact_about_style.css" rel="stylesheet" type="text/css" />
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
											<?php
													
													$result_1 = mysqli_query($con,"Select * from admin  ");  
													$row_1 = mysqli_fetch_array($result_1,MYSQLI_ASSOC);		
											?>
										<div class="about">
												
												<h1><?php echo$row_1['Page1_Title'];?></h1>
												<div class="content"><span class="icons"><img src="../image/email.png" class="icon_img"></span><span class="" style="padding-left:15px; font-size:20px;"><?php echo$row_1['Email'];?></span></div>
												<div class="content"><span class="icons"><img src="../image/phone1.png" class="icon_img"></span><span class="" style="padding-left:15px; font-size:20px;"><?php echo$row_1['Mobile_Number'];?></span></div>
												<div class="content"><span class="icons"><img src="../image/location.png" class="icon_img"></span><span class="" style="padding-left:15px; font-size:20px;"><?php echo$row_1['Page1_Description'];?></span></div>
												
										</div>
							</div>
					</div>
		 


</div>
<script>

		document.getElementById("contact").style.borderLeft="5px solid rgba(255,255,255,1)";
		document.getElementById("icon_contact").style.background="rgba(255,255,255,0.5)";
		 document.getElementById("menu_name4").style.background="rgba(255,255,255,0.5)";
		 
		
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