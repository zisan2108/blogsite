<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php

include_once("connection.php");

if(isset($_POST['update']))
{	
	$id = $_POST['id'];
	
	$name = $_POST['title'];
	
	$price = $_POST['descrip'];	
	
	
	if(empty($title)  || empty($descrip)) {
				
		if(empty($title)) {
			echo "<font color='red'>Title field is empty.</font><br/>";
		}
		
		
		if(empty($descrip)) {
			echo "<font color='red'>Descrip field is empty.</font><br/>";
		}		
	} else {	
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE post SET title='$title',  descrip='$descrip' WHERE id=$id");
		
		//redirectig to the display page. In our case, it is view.php
		header("Location: view.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM post WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$title = $res['title'];

	$descrip = $res['descrip'];
}
?>
<html>
<head>	
	<title>Edit Data</title>
</head>

<body>
	<a href="index.php">Home</a> | <a href="view.php">View Products</a> | <a href="logout.php">Logout</a>
	<br/><br/>
	
	<form name="form1" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td>Title</td>
				<td><input type="text" name="title" value="<?php echo $title;?>"></td>
			</tr>
			
			<tr> 
				<td>Descrip</td>
				<td><input type="text" name="descrip" value="<?php echo $descrip;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
