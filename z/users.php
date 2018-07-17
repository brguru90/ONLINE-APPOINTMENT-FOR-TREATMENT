<!DOCTYPE html>
<html>
<head>
<title id="title">Users</title>
<?php include("header.php") ?>
			<!-----------------------------------------------------//navigation----------------------------------------------------------------->
<?php include("styl.php"); ?>
<div id="kk" >
<div id="jj">

<?php
include('db.php');
include("sms/guru2.php");
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
}
$sql="select * from login";
$res=$conn->query($sql);
if ($res->num_rows > 0) 
{
echo "
	<style>
	.mytb th{color:purple;height:50px;font-size:18px;}
.mytb td,.mytb th{border:solid white 1px;padding:15px 5px 5px 5px;}
.mytb{padding:10px 10px 10px 10px;width:100%;color:blue;text-transform: capitalize;}
</style>
	<center><table class='mytb' style='background: url(\"images/j.jpg\") center center;'>
	<caption style='background-color:dark'><center>user status checkup</center></caption>
			<tr >
				<th id='myip' >name</th>
				<th>user</th>
				<th>status</th>
			</tr>";
	while($row = $res->fetch_assoc()) 
	{
		$name=$row['name'];
		$user=$row['user'];
		$status=$row['status'];
		if($status=="deactivated")
		{
			$status="Pending";
		}
		echo "<tr>
				<td>$name</td>
				<td>$user</td>
				<td>$status</td>
			</tr>";
	}
	echo "
	</table><br /><br /><br /></center>";
}
?> 
</div>
</div>
<?php include("footer.php") ?>
			