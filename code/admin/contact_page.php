
<?php
session_start();
require("../database/db_connection.php"); 
?>

<html>
<head>
<title>Pages</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="style/style.css" rel="stylesheet" type="text/css" />
	<link href="style/page_style.css" rel="stylesheet" type="text/css" />
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
							<div class="top_btn">
							<a href="contact_page.php" id="contact">Contact</a>
							<a href="about_page.php" id="hirer">About</a>
							</div>
									<div class="content">
											<h2>Update Contact Us</h2>
											<?php  
											 
													$value=$_SESSION["username"];
													$result = mysqli_query($con,"Select * from admin where Email= '$value' ");  
													$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
												
												?>
											<form action="contact_page.php" method="post">
											<lable>Page Title</lable>
											<input type="text" class="input1" value="<?php echo$row['Page1_Title'];?>" name="title">
											<lable>Email</lable>
											<input type="text" class="input1" value="<?php echo$row['Email'];?>" name="email">
											<lable>Mobile Number</lable>
											<input type="text"  class="input1"  value="<?php echo$row['Mobile_Number'];?>" name="mobile">
											<lable>Page Description</lable>
											<textarea   rows="5" class="input1" placeholder="address" name="description"><?php echo$row['Page1_Description'];?></textarea>
											<input type="submit" class="submit" name="update" value="Update">
											</form>
									</div>
							</div>
					
					</div>
		 


</div>

<?php
	if(isset($_POST['update']))
	{ 
		$title=$_POST['title'];
		$email=$_POST['email'];
		$mobile=$_POST['mobile'];
		$description=$_POST['description'];
	 $sql="UPDATE `admin` SET `Page1_Title`='$title',`Email`='$email',`Mobile_Number`='$mobile',`Page1_Description`='$description' WHERE `admin`.`Email` = '$value_1'";
					
					if(mysqli_query($con, $sql))
						{
							
								echo "<script> alert(' Contact Page is updated successfully') ; </script>"; 
								
						}	
					else
					{
						echo "<script> alert('Enable to update contact page: try again') ; </script>"; 
						echo"ERROR: " . mysqli_error($con);
					
					}
	}
?>
<script>
document.getElementById("contact").style.background="#fff";
		document.getElementById("contact").style.color="rgba(0,0,200,1)";
document.getElementById("pages").style.borderLeft="5px solid rgba(255,255,255,1)";
		document.getElementById("icon_pages").style.background="rgba(255,255,255,0.5)";
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