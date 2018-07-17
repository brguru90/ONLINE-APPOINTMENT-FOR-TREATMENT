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
$qulific=$_POST["quali"];
$did=$_POST["id"];
$email=$_POST["email"];
$expert=$_POST["exp"];
$address=$_POST["add"];
$mblno=$_POST["phone"];
$photo= basename($_FILES["img"]['name']);
$uploaddir = 'img/';//temprovery folder for upload
	$uploadfile = $uploaddir . basename($_FILES["img"]['name']);//fullpath(directory+name) 
	$format=pathinfo($uploadfile,PATHINFO_EXTENSION);//getting file extension
	$filename=basename( $_FILES["img"]["name"]);//just file name
if($format!="jpg" && $format!="jpeg" && $format!="png")//matching for format for calling appropriate function to the format upload
	{
		 echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed."."</br>";
	}
	else if (move_uploaded_file($_FILES["img"]['tmp_name'], $uploadfile))
	{
		$photo=$uploadfile;
		$sql= "UPDATE doctor SET dname='$dname',qulific='$qulific',did='$did',email='$email',expert='$expert',address='$address',mblno=$mblno,photo='$photo' WHERE did=$did;";
		if ($conn->query($sql) === TRUE) {
		echo "<script>alert('Existing record updated successfully');window.location.assign('../index.html');</script>";}
	} 


else {
    echo "<script>alert('sorry! you have entred incorect details');history.go(-1);</script>";
	echo ($conn->error);
}
$conn->close();
?> 