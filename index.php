<?php session_start(); ?>
<html>
<head>
	<title>Homepage</title>
	<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body bgcolor="#639e63" >
	<a href="admin.php" target="blank">
 <img src="https://img.icons8.com/plasticine/100/000000/user-male-circle.png"  title = "Admin" height="45" width="38" align ="right"> </a> <hr/>

		
	<div id="header">
		Welcome to Blog Page
	</div>
	<?php
	if(isset($_SESSION['valid'])) {			
		include("connection.php");					
		$result = mysqli_query($mysqli, "SELECT * FROM login");
	?>
				
		Welcome <?php echo $_SESSION['name'] ?> ! <a href='logout.php'>Logout</a><br/>
		<br/>
		<a href='view.php'>View & Add Post</a>
		<br/><br/>
	<?php	
	} else {
		echo "You must be logged in to view this page.<br/><br/>";
		echo "<a href='login.php'>Login</a> | <a href='register.php'>Register</a>";
	}
	?>
	<div  id="footer">
		Login and Registration
	</div>
</body>
</html>
