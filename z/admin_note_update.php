<?php
session_start();
	if (!isset($_SESSION['admin']))
	{
		header('Location:home.php');
	} 
?>
<!DOCTYPE html>
<html>
<head>
<title id="title">ADMIN</title>
</head>
<body>	
<?php
include('db.php');
echo "<br />
<input type='button' value='back' onclick='history.go(-1)' /><br />";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
}
$id=$_POST['id'];
$note=$_POST['note'];
$link=$_POST['link'];
	//echo "$key : $values<br />";
	$sql="UPDATE notes SET note='$note',link='$link' WHERE id='$id'";
	$conn->query($sql);
	if(mysqli_affected_rows($conn)>0)
	{ 
		echo "<script>alert('updated');history.go(-2);</script>";
	}
	else
	{
		echo "<script>alert('no changes');history.go(-1);</script>";
	}
?>
</body>
</html>