<?php
include('db.php');
// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE $dbname";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully<br />";
}
$conn->close();
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
}
$sql = "create table login
(
name VARCHAR(20) NOT NULL,
user VARCHAR(20) UNIQUE,
pwd VARCHAR(20) NOT NULL,
email VARCHAR(20) UNIQUE NOT NULL,
images VARCHAR(200),
phno DECIMAL(12) NOT NULL,
status  varchar(20)
);";
if ($conn->query($sql) === TRUE) {
    echo "table created successfully<br />";
}
//else{echo "Error: " . $sql . "<br>" . $conn->error;}
$name=$_POST["name"];
$user=$_POST["user"];
$password=$_POST["pwd1"];
$pwd=$_POST["pwd2"];
if($password!=$pwd)
{
	echo "<script>alert('password mismatch');window.location.assign('login_form.php#toregister');</script>";
}
else
{
$email=$_POST["email"];
$phno=$_POST["phno"];
$uploaddir = 'img/';//folder for upload
	if(strlen(basename($_FILES['fileToUpload']['name']))>0)
	{
		$uploadfile = $uploaddir . basename($_FILES['fileToUpload']['name']);//fullpath(directory+name)		
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
		
		//$filename=basename( $_FILES["fileToUpload"]["name"]);//just file name	
		$sql="insert into login values('".$name."','".$user."','".$pwd."','".$email."','".$uploadfile."','".$phno."','deactivated');";
		if ($conn->query($sql) === TRUE) 
		{
			if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $uploadfile) || isset($default))
			{
				 echo "<script>alert('your account details has submittedyour account will e activated within 24 hours');window.location.assign('home.php');</script>";	
			} 
			else
			{
				echo "<script>alert('Possible file upload attack!\n');history.go(-1);</script>";
			}
		 
		}
		else {echo "<script>alert('enter details incorrectly or repeated!choose other username');history.go(-1);</script>";}
		//else {echo "Error: " . $sql . "<br>" . $conn->error;}
	}
}
$conn->close();
?> 