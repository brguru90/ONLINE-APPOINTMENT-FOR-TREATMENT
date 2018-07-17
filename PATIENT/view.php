<html>
<head>
<style>
li a{font-size:15px;font-weight:bold;}
.admin{border:none;text-transform: capitalize;}
.im{width:200px;height:200px;border-radius:200px;}
.admin b{float:right}
td{border:none}
</style>
</head>
<body>
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

$pid=$_POST["id"];
$sql="select * from patient where pid='$pid';";
$result=$conn->query($sql);
if ($result->num_rows > 0) 
{
    // output data of each row
    while($row = $result->fetch_assoc()) 
	{
$pname=$row["pname"];
$fname=$row["fname"];
$pid=$row["pid"];
$email=$row["email"];
$add=$row["add"];
$month=$row["month"];
$day=$row["day"];
$year=$row["year"];
$gender=$row["gender"];
$mblno=$row["mblno"];
$photo=$row["photo"];
$disease=$row["disease"];
		echo
		"<table border='2' class='admin'>
			
			<tr>
				<td colspan='2' style='width:305px;height:205px;'>
					
						<img src='img/$photo' class='im' alt='img'/>
				</td>
			</tr>
			<tr><td id='a'>Name<b>:</b></td><td id='b'> $pname</td></tr>
			<tr>
				<td id='a'>Father<b>:</b></td><td id='b'> $fname</td>
			</tr>
			<tr>
				<td id='a'>ID<b>:</b></td><td id='b'> $pid</td>
				</tr>
			<tr>
				<td id='a'>Email ID<b>:</b></td><td id='b'> $email</td>
			</tr>
			<tr>
				<td id='a'>Address<b>:</b></td><td id='b'> $add</td>
			</tr>
			<tr>
				<td id='a'>Birth Month<b>:</b></td><td id='b'> $month</td>
			</tr>
			<tr>
				<td id='a'>Birth Day<b>:</b></td><td id='b'> $day</td>
			</tr>
			<tr>
				<td id='a'>Birth Year<b>:</b></td><td id='b'> $year</td>
			</tr>
			<tr>
				<td id='a'>Gender<b>:</b></td><td id='b'> $gender</td>
			</tr>
			<tr>
				<td id='a'>Disease<b>:</b></td><td id='b'> $disease</td>
			</tr>
			<tr>
				<td id='a'>Mobile Number<b>:</b></td><td id='b'> $mblno</td></tr></table><br /><br />
		<input type='button' value='DONE' onclick='window.location.assign(\"index.html\");' /><br />";	
	}
}
else 
{
		echo "<script>alert('you have entered invalid Doctor ID');history.go(-1);</script>";
}
$conn->close();
?>
</body>
</html>