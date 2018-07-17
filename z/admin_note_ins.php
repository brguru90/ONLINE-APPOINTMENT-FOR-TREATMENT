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
<title id="title">Admin</title>
<?php include("header.php") ?>		
<?php include("styl.php") ?>	
<style>
li a{font-size:15px;font-weight:bold;}
.admin{border:none;background-color:PowderBlue;width:800px;text-transform: capitalize;}
.admin td{border:none;color:blue;text-align:left;padding:5px 5px 5px 5px;}
</style>
			<!-----------------------------------------------------//navigation----------------------------------------------------------------->
			<div id="kk">
			<div id="jj">
<?php
include('db.php');
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
}
$note=$_POST['note'];
$link=$_POST['link'];
$sql="insert into notes (note,link) values ('$note','$link');";
if($conn->query($sql))
{
	echo "<script>alert('inserted');history.go(-1);</script>";
}
else
{
	echo "<script>alert('failed to insert');history.go(-1);</script>";
}
$conn->close();
?> 
<?php include("footer.php") ?>