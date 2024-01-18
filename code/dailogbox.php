

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
<div class="dailogbox_container">
			<div class="dailogbox">
				<h1>Message</h1>
				<p>
					 <?php
						$message=$_SESSION["message"];
						$link=$_SESSION["link"];
						echo"$message";
						 
					 ?>
				</p>
				<button type="button" class="ok" onclick="location.href='<?php echo"$link"; ?>'; ">Ok</button>
			</div>
</div.
</body>
</html>