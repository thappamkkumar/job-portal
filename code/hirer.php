
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
													<h3>You are 30 seconds away from getting best employees.</h3>
													<a href="login.php" class="login">Login</a>
												</center>
					 </div>
									 
			</div>
			<div class="sub_2">
							<div class="top_btn">
							<a href="jobseeker.php" id="employee">Jobseeker</a>
							<a href="#" id="hirer">Hirer</a>
							</div>
											
											<div class="heading"><h1>Apply as a Hirer</h1></div>
																 
																			<form   action="hirer.php" onsubmit="return validateForm(this.id)" method="post" name="form2" id="hirer_form">
																				
																						<input type="text"  class="input1" id="name" placeholder="Name"  name="name" >  
																						<input type="text"  class="input1" id="email" placeholder="Your e-mail id" name="email" >
																						<input type="password"  class="input1" id="password" placeholder="Password " name="password" > 
																						<input type="text" class="input1" id="comp_name" placeholder="Company name" name="company_name" > 
																						<input type="text" class="input1" id="tagline" placeholder="Tagline" name="tagline"> 
																						<input type="area" class="input1" id="discription" placeholder="Description" name="description" >
																						<input type="url" class="input1"  id="website" placeholder="Web site link" name="website" >
																					
																						
																						<input type="submit" value="Sign UP" class="submit" id="back_login" onclick="display(this.id);" name="hirer_sign_up">
																						
																					
																			</form>
												
			</div>
			
		</div>
</div>
							<?php
								if(isset($_POST['hirer_sign_up']))
											{	
												$name=$_POST['name'];
												$email=$_POST['email'];
												$password=$_POST['password'];
												$company_name=$_POST['company_name'];
												$tagline=$_POST['tagline'];
												$description=$_POST['description'];
												$website=$_POST['website'];
												
												if(filter_var($email,FILTER_VALIDATE_EMAIL))
												{
														 $result = mysqli_query($con,"Select * from login_info where Email= '$email' ");  
														$row = mysqli_fetch_array($result,MYSQLI_ASSOC);  
														$count = mysqli_num_rows($result);  
														$date_of_joining=date('Y-m-d-H:i:s');
														if($count < 1 )
														{ 
																$sql1="INSERT INTO `login_info`(`S.no`, `Name`, `Email`, `Password`, `Company_name`, `Tagline`, `Description`, `Website`, `User_type`)VALUES ('','$name', '$email', '$password','$company_name','$tagline','$description','$website','Hirer')";
																if(mysqli_query($con, $sql1))
																	{
																			
																			$sql2="INSERT INTO `employers`(`S.no`, `Name`, `Email`, `Company_Name`, `Tagline`, `Description`, `Website`, `Location`, `No_Of_Employers`, `Industry`, `Type_Of_Business`, `Establish_In`, `Logo`,`Date_Of_Joining`) VALUES ('','$name','$email','$company_name','$tagline','$description','$website','','','','','','','$date_of_joining')";
																				if(mysqli_query($con, $sql2))
																				{}	
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
		document.getElementById("hirer").style.background="#fff";
		document.getElementById("hirer").style.color="rgba(0,0,200,1)";
		 function validateForm(element)  
           {  
					if(element=="hirer_form")
										{
											var name3=document.form3.name.value;
											var id3=document.form3.email.value;  
											var ps3=document.form3.password.value;  
											
											if(name3.length<1) 
												{  
													alert(" name is empty");  
													return false;  
												}   
											if(id3.length<1) 
												{  
													alert("User email id is empty");  
													return false;  
												}   
												if(ps3.length<8) 
												{  
													alert("Password must contain atleast 8 digits");  
													return false;  
												}   
												 
													
										}
			
			}
		

		if(window.history.replaceState)
					{
						window.history.replaceState(null,null,window.location.href);
					}
</script>
</body>
</html>