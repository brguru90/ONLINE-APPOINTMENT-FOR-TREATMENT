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
$dname=$_POST["name"];
$fname=$_POST["father"];
$qualific=$_POST["quali"];
$did=$_POST["id"];
$email=$_POST["email"];
$expert=$_POST["exp"];
$address=$_POST["add"];
$month=$_POST["BirthMonth"];
$day=$_POST["BirthDay"];
$year=$_POST["BirthYear"];
$gender=$_POST["gender"];
$mblno=$_POST["phone"];

$uploaddir = '../img/';//temprovery folder for upload
	$uploadfile = $uploaddir . basename($_FILES['img']['name']);//fullpath(directory+name)
	
	$format=pathinfo($uploadfile,PATHINFO_EXTENSION);//getting file extension
	$filename=basename( $_FILES["img"]["name"]);//just file name
	if($format!="jpg" && $format!="jpeg" && $format!="png")//matching for format for calling appropriate function to the format upload
	{
	echo $uploadfile;
		//echo "<script>alert('invalid file format');history.go(-1);</script>";
	}
	else if (move_uploaded_file($_FILES['img']['tmp_name'], $uploadfile))
	{
		$sql= "INSERT INTO doctor VALUES ('$dname', '$fname', '$qualific', $did, '$email', '$expert', '$address', '$month', $day, $year, '$gender', $mblno, '$uploadfile');";
		if ($conn->query($sql) === TRUE) {
		echo "<script>alert('New record created successfully');window.location.assign('../index.html');</script>";
	
} else {
    echo "<script>alert('sorry! you have entred incorect details');history.go(-1);</script>";
}	
	} 
	else
	{
		echo "<script>alert('sorry! Possible file attack');history.go(-1);</script>";
	}

$conn->close();
?> 