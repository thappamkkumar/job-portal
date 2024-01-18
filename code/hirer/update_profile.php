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
					$target_dir="logo/";
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
				
							$sql="UPDATE `employers` SET `Logo`='$name_img' WHERE `employers`.`Email` = '$value' ";
					
								if(mysqli_query($con, $sql))
								{
										
									echo "<script> alert('Profile image is updated') ; window.location.href='profile.php';</script>"; 
								}	
								else
								{
								
								echo"ERROR: " . mysqli_error($con);
					
								}
						
						}
				}
				
				
	}
	
	
	
	if(isset($_POST['update_profile']))
	{ 
					
					$name=$_POST['name'];
					$email=$_POST['email'];
					$company_name=$_POST['company_name'];
					$tagline=$_POST['tagline'];
					$description=$_POST['description'];
					$website=$_POST['website'];
					$employer=$_POST['employer'];
					$industry=$_POST['industry'];
					$business=$_POST['business'];
					$location=$_POST['location'];
					$establish=$_POST['establish'];
					
					
									$sql="UPDATE `employers` SET `Name`='$name',`Email`='$email',`Company_Name`='$company_name',`Tagline`='$tagline',`Description`='$description',`Website`='$website',`Location`='$location',`No_Of_Employers`='$employer',`Industry`='$industry',`Type_Of_Business`='$business',`Establish_In`='$establish' WHERE `employers`.`Email` = '$value'";
					
								if(mysqli_query($con, $sql))
								{
									
											$sql="UPDATE `jobs` SET `Employer_ID`='$email',`Company_Name`='$company_name' WHERE `jobs`.`Employer_id` = '$value'";
											if(mysqli_query($con, $sql))
											{}
											else
											{
											echo "<script> alert('Enable to update Profile : try again') ; </script>"; 
											echo"ERROR: " . mysqli_error($con);
											}
											
											$sql="UPDATE `jobs_applied` SET `Employer_ID`='$email',`Company_Name`='$company_name' WHERE `jobs_applied`.`Employer_id` = '$value'";
											if(mysqli_query($con, $sql))
											{}
											else
											{
											echo "<script> alert('Enable to update Profile : try again') ; </script>"; 
											echo"ERROR: " . mysqli_error($con);
											}
											$sql="UPDATE `login_info` SET `Email`='$email',`Name`='$name' WHERE `login_info`.`Email` = '$value'";
											if(mysqli_query($con, $sql))
											{
												
											}
											else
											{
											echo "<script> alert('Enable to update Profile : try again') ; </script>"; 
											echo"ERROR: " . mysqli_error($con);
											}
							
									echo "<script> alert('Profile is updated') ; window.location.href='profile.php';</script>"; 
									$_SESSION["username"]=$email;
								}	
								else
								{
								echo "<script> alert('Enable to update Profile : try again') ; </script>"; 
								echo"ERROR: " . mysqli_error($con);
					
								}
								
	

	}		

	
	
	?>