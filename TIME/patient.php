<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname ="hm";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
}
$sql="select * from patient;";
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
		$pname=$row["pname"];
		$disease=$row["disease"];
		$photo=$row["photo"];
		echo "
			<table border='1' class='tb'>
				<tr>
					<td style='padding-left:5px;color:purple;font-weight:bold;text-transform:capitalize'>$pname<br />Disease in $disease</td>
					<td><img src='../PATIENT/img/$photo' alt='no img' /></td>
				</tr>
		</table><br />";
	}
	echo "</marquee>";
}
$conn->close();
?>