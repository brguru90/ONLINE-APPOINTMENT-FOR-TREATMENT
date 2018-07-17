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
<script src="api/jquery.js"></script>
<style>
li a{font-size:15px;font-weight:bold;}
.not{border:none;background:transparent url("images/form1.png") no-repeat;background-size:cover;text-transform: capitalize;word-wrap: break-word;}
.not td,.not th{border:none;color:black;text-align:left;padding:5px 5px 5px 5px;}
td{border:solid 1px blue}
.add td{padding:2px 2px 2px 2px;}
.add input,select{padding:6px;width:200px;}
.add .sub{width:204px;}
</style>
			<!-----------------------------------------------------//navigation----------------------------------------------------------------->
			<div id="kk">
			<div id="jj" style='background-color:pink'>
<?php
include('db.php');
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
}
		
//echo "$success : $fail";

$sql="select * from staff_details order by id";
$res=$conn->query($sql);
if ($res->num_rows > 0) 
{
echo "<form action=''>
<table border='2' class='not'>
<tr>
	<th>SUBJECT OREDER</th>
	<th>SUBJECT NAME</th>
	<th>MEMBER NAME</th>
	<th>BRANCH</th>
	<th>SEM</th>
	<th>YEAR</th>
</tr>	
	";

	while($row = $res->fetch_assoc()) 
	{
		$id=$row['id'];
		$sub_order=$row['sub_order'];
		$subject=$row['subject'];
		$member=$row['member'];
		$branch=$row['branch'];
		$sem=$row['sem'];
		$year=$row['year'];
		echo "
			<tr>
				<td >$sub_order</td>
				<td style='text-transform:uppercase' >$subject</td>
				<td >$member</td>
				<td style='text-transform:uppercase'>$branch</td>
				<td >$sem</td>
				<td >$year</td>
				";	

	}
	echo "</tr></table><br />
	</form>";
}
$conn->close();
?> 
<div id='form'></div>
<?php include("footer.php") ?>