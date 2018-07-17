<?php
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
/*$dname=$_POST["name"];
$qulific=$_POST["quali"];
$email=$_POST["email"];
$expert=$_POST["exp"];
$address=$_POST["add"];
$mblno=$_POST["phone"];
$photo=$_POST["img"];*/
$did=$_POST["id"];
$sql= "delete from doctor WHERE did=$did;";
if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Record deleted successfully');window.location.assign('../index.html');</script>";
	
} else {
    //echo "<script>alert('sorry! you have entred incorect details');history.go(-1);</script>";
	echo ($conn->error);
}
$conn->close();
?> 