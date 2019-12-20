<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php
//including the database connection file
include_once("connection.php");

if(isset($_POST['Submit'])) {	
	$title = $_POST['title'];
	//$qty = $_POST['qty'];
	$descrip = $_POST['descrip'];
	$loginId = $_SESSION['id'];
		
	// checking empty fields
	if(empty($title) || empty($descrip)) {
				
		if(empty($title)) {
			echo "<font color='red'>Title field is empty.</font><br/>";
		}
		
		/*if(empty($qty)) {
			echo "<font color='red'>Quantity field is empty.</font><br/>";
		}*/
		
		if(empty($descrip)) {
			echo "<font color='red'>Descrip field is empty.</font><br/>";
		}
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = mysqli_query($mysqli, "INSERT INTO post (title, descrip, login_id) VALUES('$title','$descrip', '$loginId')");
		
		//display success message
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='view.php'>View Result</a>";
	}
}
?>
</body>
</html>
