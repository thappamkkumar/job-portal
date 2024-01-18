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
					$target_dir="images/";
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
				
							$sql="UPDATE `admin` SET `profile_image`='$name_img' WHERE `admin`.`Email` = '$value' ";
					
								if(mysqli_query($con, $sql))
								{
										
									echo "<script> alert('Profile image is updated') ; window.location.href='profile.php'; </script>"; 
								}	
								else
								{
								
								echo "<script> alert('Enable to update profile image') ; window.location.href='profile.php'; </script>"; 
					
								}
						
						}
				}
				 
				
	}
	
	
	if(isset($_POST['update_profile']))
	{ 
					
					$email_id=$_POST['email_id'];
					$phone_no=$_POST['phone_no'];
					$name=$_POST['name'];
					
						
				
				$sql="UPDATE `admin` SET `Email`='$email_id',`Mobile_Number`='$phone_no',`Name`='$name' WHERE `admin`.`Email` = '$value' ";
					
								if(mysqli_query($con, $sql))
								{
									$sql="UPDATE `login_info` SET `Email`='$email_id',`Name`='$name' WHERE `login_info`.`Email` = '$value' ";
					
												if(mysqli_query($con, $sql))
												{
											
													$_SESSION["username"]=$email_id;
													
													echo "<script> alert('Profile  is updated') ; window.location.href='profile.php'; </script>"; 
												}
												else
												{
												 
									
												}
								}	
								else
								{
								echo "<script> alert('Enable to update Profile : try again') ;  window.location.href='profile.php';</script>"; 
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
							
								echo "<script> alert('Password is updated') ;  window.location.href='../login.php';</script>"; 
								 
			
						}	
					else
					{
						echo "<script> alert('Enable to update Password : try again') ; history.back(); </script>"; 
						echo"ERROR: " . mysqli_error($con);
					 
			
					}
		
				}
				else{
						echo "<script> alert('Re-enter Password is not same') ; history.back();</script>"; 
				
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