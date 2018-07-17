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
$pname=$_POST["pname"];
$fname=$_POST["fname"];
$pid=$_POST["pid"];
$email=$_POST["email"];
$add=$_POST["add"];
$month=$_POST["month"];
$day=$_POST["day"];
$year=$_POST["year"];
$gender=$_POST["gender"];
$mblno=$_POST["mblno"];
$disease=$_POST["disease"];
$photo=basename($_FILES['img']['name']);

$uploaddir = 'img/';//folder for upload
	if(strlen(basename($_FILES['img']['name']))>0)
	{
		$uploadfile = $uploaddir . basename($_FILES['img']['name']);//fullpath(directory+name)		
	}	
	else
	{
		$uploadfile = $uploaddir ."default.png";
		$default="default";
	}
	$format=pathinfo($uploadfile,PATHINFO_EXTENSION);//getting file extension
	if($format!="jpg" && $format!="jpeg" && $format!="png")//matching for format for calling appropriate function to the format upload
	{
			echo "<script>alert('invalid file format-$format');history.go(-1);</script>";
	}
	else
	{
		
		//$filename=basename( $_FILES["img"]["name"]);//just file name	
		$sql= "INSERT INTO patient VALUES ('$pname', '$fname', $pid, '$email', '$add', '$month', $day, $year, '$gender', $mblno,'$disease','$photo');";
		if ($conn->query($sql) === TRUE) 
		{
			if(move_uploaded_file($_FILES['img']['tmp_name'], $uploadfile) || isset($default))
			{
				 echo "<script>alert('Detail inserted');history.go(-1);</script>";	
			} 
			else
			{
				echo "<script>alert('Possible file upload attack!\n');history.go(-1);</script>";
			}
		 
		}
	else {echo "<script>alert('enter details incorrectly or repeated!');history.go(-1);</script>";}
		//else {echo "Error: " . $sql . "<br>" . $conn->error;}
	}
$conn->close();
?> 