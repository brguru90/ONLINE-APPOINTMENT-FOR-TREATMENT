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
		.tb td{width:125px;height:100px}
		.tb{border:1px solid blue}
		.tb td{border:1px solid lightblue}
		.tb img{width:100%;height:100%}
	</style>
		<marquee direction='up' height='450px' onmouseover='this.stop()' onmouseout='this.start()' scrollamount='10' scrolldelay='2'>";
    // output data of each row
    while($row = $result->fetch_assoc()) 
	{
		$dname=$row["dname"];
		$expert=$row["expert"];
		$photo=$row["photo"];
		echo "
			<table border='1' class='tb'>
				<tr>
					<td style='padding-left:5px;color:purple;font-weight:bold;text-transform:capitalize'>$dname<br />Expert in $expert</td>
					<td><img src='../DOCTOR/img/$photo' alt='no img' /></td>
				</tr>
			</table><br />";
	}
	echo "</marquee>";
}
$conn->close();
?>