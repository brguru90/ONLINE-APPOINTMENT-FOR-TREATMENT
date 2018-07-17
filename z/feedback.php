<?php
session_start();
//setting the default location to home page
if(!isset($_SESSION['location']))
{
	$_SESSION['location']='home.php';
}
include('db.php');
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
}
$sql = "create table feedback
(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(20)NOT NULL,
msg VARCHAR(2000) NOT NULL
);";
$conn->query($sql);
$name=$_POST["name"];
$msg=$_POST["msg"];
$sql="insert into feedback (name,msg) values('$name','$msg');";
if($conn->query($sql))
{
	echo "<script>alert('comment submitted! :\)');history.go(-1);</script>";
}
 else
{
	echo "<script>alert('error submitting comments :\(');history.go(-1);</script>";
}

$conn->close();
?> 