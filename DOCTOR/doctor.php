<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname ="mh";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
}

$sql="select * from doctor order by dname;";
$result=$conn->query($sql);
if ($result->num_rows > 0) 
{
	echo "
	<style>
	th{background-color:Bisque;padding:5px 5px 5px 5px;font-weight:bold;text-transform:uppercase}
	td{background-color:lightblue;padding:5px 5px 5px 5px;color:purple;text-transform:capitalize}
	td img{width:100px;height:100px}
	</style>
	<table class='tb'>
	<tr>
		<th>Dooctor name</th>
		<th>Doctor Id</th>
		<th>Email Id</th>
		<th>expert</th>
		<th>address</th>
		<th>gender</th>
		<th>obile number</th>
		<th>photo</th>
	</tr>
	";
    // output data of each row
    while($row = $result->fetch_assoc()) 
	{
		$dname=$row["dname"];
		$did=$row["did"];
		$email=$row["email"];
		$expert=$row["expert"];
		$address=$row["address"];
		$gender=$row["gender"];
		$mblno=$row["mblno"];
		$photo=$row["photo"];
		echo "
			
				<tr>
					<td style='text-transform:capitalize'>$dname</td>
					<td>$did</td>
					<td>$email</td>
					<td>$expert</td>
					<td>$address</td>
					<td>$gender</td>
					<td>$mblno</td>
					<td><img src='../DOCTOR/img/$photo' alt='no img' /></td>
				</tr>";
			
	}
	echo "</table><br />";
}
$conn->close();
?>