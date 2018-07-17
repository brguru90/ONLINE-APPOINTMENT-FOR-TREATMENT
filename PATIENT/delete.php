<?php
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
$sql= "delete from patient WHERE pid=$pid;";
if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Record deleted successfully');window.location.assign('index.html');</script>";
	
} else {
    echo "<script>alert('sorry! you have entred incorect details');history.go(-1);</script>";
	//echo ($conn->error);
}
$conn->close();
?> 