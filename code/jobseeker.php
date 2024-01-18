
<?php
session_start();
	require("database/db_connection.php"); 
?>

<html>
<head>
<title>Sign Up</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="style/sign_up_style.css" rel="stylesheet" type="text/css" />
	
</head>
<body>



<div class="container">

		
		<div class="sub_container">
			<div class="sub_1">
					 <div class="content">
					 <center><h2>Welcome to</h2>
													<h1>JOB PORTAL</h1>
													<hr style="width:50%; height:2px; background:#fff; margin-bottom:50px;">
													<h3>You are 30 seconds away from earning your own money.</h3>
													<a href="login.php" class="login">Login</a>
												</center>
					 </div>
									 
			</div>
			<div class="sub_2">
							<div class="top_btn">
							<a href="#" id="jobseeker">Jobseeker</a>
							<a href="hirer.php" id="hirer">Hirer</a>
							</div>
											
											<div class="heading"><h1>Apply as a Jobseeker </h1></div>
																 
																			<form   action="jobseeker.php" onsubmit="return validateForm(this.id)"   method="post" name="form2" id="jobseeker_form">
																				
																						<input type="text"  class="input1" id="name" placeholder="Your name"  name="name"  > 
																						<input type="text"  class="input1" id="email" placeholder="Your e-mail id" name="email" >
																						<input type="password"  class="input1" id="password1" placeholder="Enter new password" name="password1" >
																						<input type="password"  class="input1" id="password2" placeholder="Re_enter password" name="password2" >
																						 
																						
																						<input type="submit" value="Sign UP" class="submit"    onclick=""  name="jobseeker_sign_up">
																						
																					
																			</form>
												
			</div>
			
		</div>
</div>


							<?php  
									
											if(isset($_POST['jobseeker_sign_up']))
											{	
												$name=$_POST['name'];
												$email=$_POST['email'];
												$password=$_POST['password1'];
												$password=$_POST['password2'];
												 
											 
												if(filter_var($email,FILTER_VALIDATE_EMAIL))
												{
														 $result = mysqli_query($con,"Select * from login_info where Email= '$email' ");  
														$row = mysqli_fetch_array($result,MYSQLI_ASSOC);  
														$count = mysqli_num_rows($result);  
														$date_of_joining=date('Y-m-d-H:i:s');

														if($count < 1 )
														{ 
																$sql1="INSERT INTO `login_info`(`S.no`, `Name`, `Email`, `Password`, `Company_name`, `Tagline`, `Description`, `Website`, `User_type`) VALUES ('','$name', '$email', '$password','','','','','Jobseeker')";
																if(mysqli_query($con, $sql1))
																	{
																			
																			
																			$sql2="INSERT INTO `jobseekers`(`S.no`, `Name`, `Email`, `Phone_No`, `Address`, `Age`, `Gender`, `Date_Of_Birth`, `Married/Un-married`, `Highest_Qualification`, `Pass_Out_Year`, `Skills`, `Hobbies`, `Communication_Language`, `CV`, `Profile_image`, `Institute`, `Marks_In_Percentage`,`Date_Of_Joining`) VALUES ('','$name','$email','','','','','','','','','','','','','','','','$date_of_joining')";
																				if(mysqli_query($con, $sql2))
																					{ 	
																					}	
																					else
																						{ 
																							echo"ERROR: Could not able to Sin up. Please try again" . mysqli_error($con);
																						}
																						echo "<script> alert('Sin up is successful') ; window.location.href='login.php'; </script>"; 
																						 
																	 }	
																	else
																		{
																			echo "<script> alert('Could not able to Sin up. Please try again') ; </script>";
																			
																		}
														}
														else{
																echo "<script> alert('E-mail address must unique') ; </script>";
																
														}
														
																		
												
												}
												else
												{
													echo "<script> alert(' In-valid email address') ; </script>"; 
																			
												}
												
												
											}
											
									?>

<script>
		document.getElementById("jobseeker").style.background="#fff";
		document.getElementById("jobseeker").style.color="rgba(0,0,200,1)";
		
		
		 function validateForm(element)  
           {   if(element=="jobseeker_form")
							{
								var name2=document.form2.name.value;
								var id2=document.form2.email.value;  
								var ps2_1=document.form2.password1.value;  
								var ps2_2=document.form2.password2.value;
								if(name2.length<1) 
									{  			alert(" name is empty"); 
										return false;  
									}   
								if(id2.length<1) 
									{  	
										alert("User email id is empty");  
										return false;  
									}   
									if(ps2_1.length<8) 
									{  
								alert("Password must contain atleast 8 digits");  
										return false;  
									}   
									if(ps2_1 != ps2_2) 
										{
										 
														alert("Entered password is not same");  
												return false;  
										}  
										
							}
		   }
		    
</script>
</body>
</html>