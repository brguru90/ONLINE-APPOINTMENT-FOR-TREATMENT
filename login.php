<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname ="mh";

$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error)
	{
		die("Connection failed: " . $conn->connect_error);
	}

$user=$_POST["username"];
$pwd=$_POST["password"];
if(strlen($pwd)<8)
{
	//echo strlen($pwd);
	echo "<script>alert('Sorry...! the lenth of password is too short');history.go(-1);</script>";
}
else{
	$sql="select * from login where uname='".$user."';";
	$result=$conn->query($sql);
	if ($result->num_rows > 0) 
	{
		while($row = $result->fetch_assoc()) 
		{
			$pass=$row["passd"];
			
			if($pass===$pwd)
			{
				header("Location: home.html");
			}
			else
			{
				echo "<script>alert('Sorry...! You have enterd incorrect details');history.go(-1);</script>";
			}
		}
	}
	else
	{
	echo "<script>alert('you have entered invalid user name');history.go(-1);</script>";
	}	
}
$conn->close();
?> 