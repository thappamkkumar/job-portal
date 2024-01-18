
<?php

session_start();
require("../database/db_connection.php"); 
$value=$_SESSION["username"];
	if(isset($_POST['update_image']))
	{ 
			$end=strpos($value,"@");
			
			$name1=substr($value,0,$end);
			
			
				$profile_image=$_FILES["profile_image"]["name"];
				$ext=pathinfo($profile_image, PATHINFO_EXTENSION);
				$name_img=$name1."_profile_image.".$ext;
					$target_dir="profile_image/";
					$target_file=$target_dir.basename($_FILES['profile_image']['name']);
					//Select file type
					$imageFileType=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
					
					//Valid file extension_loaded
					$extensions_arr=array("jpg","jpeg","png");
					
					//Check eextension
					if(in_array($imageFileType,$extensions_arr))
				{
							if(move_uploaded_file($_FILES['profile_image']['tmp_name'],$target_dir.$name_img))
						{
				
							$sql="UPDATE `jobseekers` SET `Profile_image`='$name_img' WHERE `jobseekers`.`Email` = '$value' ";
					
								if(mysqli_query($con, $sql))
								{
										
									echo "<script> alert('Profile image is updated successfully') ; window.location.href='profile.php';</script>"; 
								}	
								else
								{
								
								echo"ERROR: " . mysqli_error($con);
								echo "<script> alert('Enable to update profile image ') ; window.location.href='profile.php'; </script>"; 
								}
						
						}
				}
				 
				
	}
	
	if(isset($_POST['update_cv']))
	{	$end=strpos($value,"@");
			
			$name1=substr($value,0,$end);
			
		
			$CV=$_FILES["CV"]["name"];
					$target_dir="CV/";
					$target_file=$target_dir.basename($_FILES['CV']['name']);
					$ext=pathinfo($CV, PATHINFO_EXTENSION);
				$name_cv=$name1."_CV.".$ext;
				
					//Select file type
					$imageFileType=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
					
					//Valid file extension_loaded
					$extensions_arr=array("jpg","jpeg","png","pdf","doc");
					
					//Check eextension
					if(in_array($imageFileType,$extensions_arr))
				{
							if(move_uploaded_file($_FILES['CV']['tmp_name'],$target_dir.$name_cv))
						{
				
							$sql="UPDATE `jobseekers` SET `CV`='$name_cv' WHERE `jobseekers`.`Email` = '$value' ";
					
								if(mysqli_query($con, $sql))
								{
											echo "<script> alert('Resume is Uploaded successfully') ; window.location.href='profile.php';</script>"; 
									
								}	
								else
								{
								
								echo"ERROR: " . mysqli_error($con);
									echo "<script> alert('Enable to upload resume') ; window.location.href='profile.php';</script>"; 
								}
						
						}
				}
				 
				
	}
	if(isset($_POST['update_qualification']))
	{ 
					$qualification=$_POST['qualification'];
					$pass_out_year=$_POST['pass_out_year'];
					$institute=$_POST['institute'];
					$marks=$_POST['marks'];
					
						
				
				$sql="UPDATE `jobseekers` SET `Highest_Qualification`='$qualification',`Pass_Out_Year`='$pass_out_year',`Institute`='$institute',`Marks_In_Percentage`='$marks' WHERE `jobseekers`.`Email` = '$value' ";
					
								if(mysqli_query($con, $sql))
								{
							
									echo "<script> alert('Qulaification is updated successfully') ; window.location.href='profile.php';</script>"; 
								}	
								else
								{
								echo "<script> alert('Enable to update Qulification : try again') ; window.location.href='profile.php';</script>"; 
								echo"ERROR: " . mysqli_error($con);
					
								}
								 
	

	}		


	if(isset($_POST['update_info']))
	{ 
					$name=$_POST['name'];
					$age=$_POST['age'];
					$gender=$_POST['gender'];
					$date_of_birth=$_POST['date_of_birth'];
					$status=$_POST['status'];
					$skills=$_POST['skills'];
					$hobbies=$_POST['hobbies'];
					$languages=$_POST['languages'];
					
						
				
				$sql="UPDATE `jobseekers` SET `Name`='$name',`Age`='$age',`Gender`='$gender',`Date_Of_Birth`='$date_of_birth',`Married/Un-married`='$status',`Skills`='$skills',`Hobbies`='$hobbies',`Communication_Language`='$languages' WHERE `jobseekers`.`Email` = '$value' ";
					
								if(mysqli_query($con, $sql))
								{
							
									$sql2="UPDATE `login_info` SET `Name`='$name' WHERE `login_info`.`Email` = '$value' ";
					
										if(mysqli_query($con, $sql2))
										{
											
										}
										else
										{
										echo "<script> alert('Enable to update Profile : try again') ;window.location.href='profile.php'; </script>"; 
										echo"ERROR: " . mysqli_error($con);
										}
									echo "<script> alert('Profile is updated') ; window.location.href='profile.php'; </script>"; 
									
								}	
								else
								{
								echo "<script> alert('Enable to update Profile : try again') ;  window.location.href='profile.php';</script>"; 
								echo"ERROR: " . mysqli_error($con);
					
								}
								 
	

	}		
	
	
	if(isset($_POST['update_contact']))
	{ 
					
					$email_id=$_POST['email_id'];
					$phone_no=$_POST['phone_no'];
					$address=$_POST['address'];
					
						
				
				$sql="UPDATE `jobseekers` SET `Email`='$email_id',`Phone_No`='$phone_no',`Address`='$address' WHERE `jobseekers`.`Email` = '$value' ";
					
								if(mysqli_query($con, $sql))
								{
									$sql2="UPDATE `login_info` SET `Email`='$email_id' WHERE `login_info`.`Email` = '$value' ";
					
										if(mysqli_query($con, $sql2))
										{
											
										}
										else
										{
										 
										echo"ERROR: " . mysqli_error($con);
										}
										
									$sql3="UPDATE `jobs_applied` SET `Jobseeker_ID`='$email_id' WHERE `jobs_applied`.`Jobseeker_ID` = '$value' ";
					
										if(mysqli_query($con, $sql3))
										{
											
										}
										else
										{
										  echo"ERROR: " . mysqli_error($con);
										}
									
									
									
									$_SESSION["username"]="$email_id";
									
									echo "<script> alert('Contact is updated successfully') ; window.location.href='profile.php';</script>"; 
								}	
								else
								{
								echo "<script> alert('Enable to update Contact : try again') ; window.location.href='profile.php';</script>"; 
								echo"ERROR: " . mysqli_error($con);
					
								}
								
							 
	

	}		




if(isset($_POST['update_password']))
	{ 
			$current_password=$_POST['current_password'];
			$password=$_SESSION["password"];
		if($current_password==$password)
		{
				
				$new_password1=$_POST['new_password1'];
				$new_password2=$_POST['new_password2'];
				
				if($new_password1==$new_password2)
				{
					$sql="UPDATE `login_info` SET `Password`='$new_password1' WHERE `login_info`.`Email` = '$value'";
					
					if(mysqli_query($con, $sql))
						{
							
								echo "<script> alert('Password is updated') ; window.location.href='../login.php';</script>"; 
								 
			
						}	
					else
					{
						echo "<script> alert('Enable to update Password : try again') ;  history.back();</script>"; 
						echo"ERROR: " . mysqli_error($con);
					 
			
					}
		
				}
				else{
						echo "<script> alert('Re-enter Password is not same') ;  history.back();</script>"; 
				
				}
		}	
		else
		{
			echo "<script> alert('Enable to match your previous Password in DataBase') ; history.back(); </script>"; 
					
		}

	}		



if(isset($_POST['yes']))
	{ 				
				session_destroy();
				unset($_SESSION["username"]);
				unset($_SESSION["password"]);
				header("Location: ../login.php");
	}
?>