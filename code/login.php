
<?php
session_start();
?>

<html>
<head>
<title>Login </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="style/style.css" rel="stylesheet" type="text/css" />
	
</head>
<body >


<div class="container">
		<div class="sub_container">
			<div class="sub_1">
					 <div class="content">
					 <center><h2>Welcome to</h2>
													<h1>JOB PORTAL</h1>
													<hr style="width:50%; height:2px; background:#fff; margin-bottom:50px;">
													<h3>Login your account to continue access.</h3>
												</center>
					 </div>
									 
			</div>
			<div class="sub_2">
															<center>
																<h1>Login </h1>
																<img src="image/login.png" class="image">
																</center>
													<form   action="login.php" onsubmit="return validateForm(this.id)" method="post" name="form1" id="login_form">
														 <div class="input_container">
														 <i><img src="image/email.png"></i>
														 <input type="text"  class="input1"  placeholder="User Name" id="Username" name="username" > 
		
														 </div>
														  <div class="input_container">
														  <i><img src="image/password2.png"></i><input type="password"  class="input1" placeholder="Password"  id="Password" name="password" > 
															
														 </div>
														 
													<a href="#" class="forgot" id="forgot_id" style="display:none;" >Forgot Password ?</a>
													 
														  <div class="submit_container">
														  <input type="submit" class="submit" id="submit_login_form" value="Login"  name="login_submit"> 
														<span>If you don't have accout please <a href="jobseeker.php" class="sign"  >Sign up</a></span>
														</div>
													</form>
												
												
			</div>
			
		</div>
</div>



									<?php  //PHP for login
											
												require("database/db_connection.php"); 


												if(isset($_POST['login_submit']))
												{	
												   $username=$_POST['username'];
												   $password=$_POST['password'];
														
													//to prevent from mysqli injection  
													$username = stripcslashes($username);  
													$password = stripcslashes($password);  
													$username = mysqli_real_escape_string($con, $username);  
													$password = mysqli_real_escape_string($con, $password);  
													  
													 $result = mysqli_query($con,"Select * from login_info where Email= '$username' AND Password= '$password' ");  
														
														$row = mysqli_fetch_array($result,MYSQLI_ASSOC);  
														$count = mysqli_num_rows($result);  

														if($count == 1 ){  
															 
															$_SESSION["username"]=$username;
																$_SESSION["password"]=$password;
																
																		if($row["User_type"]=="Hirer")
																		{
																					
																			echo "<script> alert('Hirer: Login Successful'); location.href='hirer/add_jobs.php';</script>"; 
																					exit();
																		}
																		elseif($row["User_type"]=="Jobseeker")
																		{
																			 
																			echo "<script>alert('Jobseeker: Login Successful'); location.href='jobseeker/jobseeker.php';</script>"; 
																				exit();
																		}
																		else
																		{
																			
																		 echo "<script>alert('Admin: Login Successful'); location.href='admin/dashboard.php';</script>"; 
																						exit();
																		}
															
														
														
														}  
														else{  
															  
															 echo "<script>alert('Fail to Login'); location.href='login.php'</script>"; 
														 
														}    
														
														
												}	
												
									?>
</body>
</html>