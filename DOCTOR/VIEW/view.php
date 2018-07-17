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
$dbname ="mh";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
}

$did=$_POST["id"];
$sql="select * from doctor where did='".$did."';";
$result=$conn->query($sql);
if ($result->num_rows > 0) 
{
    // output data of each row
    while($row = $result->fetch_assoc()) 
	{
$dname=$row["dname"];
$fname=$row["fname"];
$qualific=$row["qulific"];
$did=$row["did"];
$email=$row["email"];
$expert=$row["expert"];
$address=$row["address"];
$month=$row["month"];
$day=$row["day"];
$year=$row["year"];
$gender=$row["gender"];
$mblno=$row["mblno"];
$photo=$row["photo"];
		echo
		"<table border='2' class='admin'>
			
			<tr>
				<td colspan='2' style='width:305px;height:205px;'>
					
						<img src='$photo' class='im' alt='img'/>
				</td>
			</tr>
			<tr><td id='a'>Name<b>:</b></td><td id='b'> $dname</td></tr>
			<tr>
				<td id='a'>Father<b>:</b></td><td id='b'> $fname</td>
			</tr>
			<tr>
				<td id='a'>Qualification<b>:</b></td><td id='b'> $qualific</td>
			</tr>
			<tr>
				<td id='a'>ID<b>:</b></td><td id='b'> $did</td>
				</tr>
			<tr>
				<td id='a'>Email ID<b>:</b></td><td id='b'> $email</td>
			</tr>
			<tr>
				<td id='a'>Expert In<b>:</b></td><td id='b'> $expert</td>
			</tr>
			<tr>
				<td id='a'>Address<b>:</b></td><td id='b'> $address</td>
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
				<td id='a'>Mobile Number<b>:</b></td><td id='b'> $mblno</td></tr></table><br /><br />
		<input type='button' value='DONE' onclick='window.location.assign(\"../index.html\");' /><br />";	
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