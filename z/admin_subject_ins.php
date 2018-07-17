<?php
session_start();
	if (isset($_COOKIE['user']))
	{
		$_SESSION['user']=$_COOKIE['user'];
	}
	if (!isset($_SESSION['user']) && !isset($_SESSION['admin']))
	{
		$_SESSION['location']= 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
		header('Location:login_form.php');
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
$branch=$_POST['branch'];
$sem=$_POST['sem'];
$year=$_POST['year'];
$staff_member=$_POST['staff_member'];
$sub_name=$_POST['sub_name'];
$sub_code=$_POST['sub_code'];
$sub_order=$_POST['sub_order'];
$sql="insert into sub_details (branch,sem,year,staff_member,sub_name,sub_code,sub_order) values('$branch','$sem','$year','$staff_member','$sub_name','$sub_code','$sub_order');";
if($conn->query($sql))
{
	echo "<script>alert('inserted');history.go(-1);</script>";
}
else
{
	echo "<script>alert('failed to insert');history.go(-1);</script>";
}
//else {echo "Error: " . $sql . "<br>" . $conn->error;}
$conn->close();
?> 
<?php include("footer.php") ?>