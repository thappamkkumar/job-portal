
<?php      
	
   $host = "localhost";  
   $user = "root";  
   $password = "";  
   $db_name="job_portal";
      
    $con = mysqli_connect($host, $user, $password,$db_name);  
    if(mysqli_connect_errno())
		{  
				die("Failed to connect : ". mysqli_connect_error());  
		}

// SELECTING DATABASE OR IF DATABASE NOT FOUND THAN CREATE DATABASE

//	$database = mysqli_select_db($con, 'job_portal');/
//	if(! $database)
//	{
//			$sql = "CREATE Database job_portal";
//			$retval = mysqli_query($con, $sql );
//			mysqli_select_db($con, 'job_portal');
//			if(! $retval )
//			{
//				die('Could not create database: ' . mysqli_error($con));
//			}
			
			//$table="CREATE TABLE login_info('.'S.no INT NOT NULL AUTO_INCRIMENT, '.'Name VARCHAR(20) NOT NULL, '.'Email_id VARCHAR(20) NOT NULL, '.'Password VARCHAR(10) NOT NULL,'.'Company_Name VARCHAR(30),'.'Tagline VARCHAR(50),'.'Discription VARCHAR(100),'.'Website VARCHAR(20),'.'User_type CHAR(10) NOT NULL,'.'primary key(Email_id))";
			

//	}


//			$table="CREATE TABLE login_info(S.no INT NOT NULL AUTO_INCRIMENT, Name VARCHAR(20) NOT NULL, Email_id VARCHAR(20) NOT NULL PRIMARY KEY, Password VARCHAR(10) NOT NULL, Company_Name VARCHAR(30),Tagline VARCHAR(50),Discription VARCHAR(100),Website VARCHAR(20),User_type CHAR(10) NOT NULL)";
			
		//	$table="CREATE TABLE `job_portal`.`login_info` ( `S.no` INT NOT NULL AUTO_INCRIMENT, `Name` VARCHAR(20) NOT NULL , `Email_id` VARCHAR(20) NOT NULL , `Password` VARCHAR(10) NOT NULL , `Company_name` VARCHAR(30) , `Tagline` VARCHAR(50), `Description` VARCHAR(100), `Website` VARCHAR(20) NOT NULL , `User_type` VARCHAR(20) NOT NULL , PRIMARY KEY (`Email_id`)) ";
//			$table_retval=mysqli_query($con, $table);
//			if(! $table_retval ) 
//			{
//				die('Could not create table: ' . mysqli_error($con));
//			}


?>