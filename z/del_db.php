<?php include('log_details.php');?>
<?php
include("db.php");
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
if(isset($_GET["reg"])){$reg=$_GET["reg"];}
$sem=$_GET["sem"];
$month=$_GET["month"];
$year=$_GET["year"];
$del_option=$_GET["opt"];
if($del_option=="reg")
{
	echo "reg";
	$sql="delete from student_details_main where (reg='$reg' AND sem='$sem') AND (month='$month'  AND year='$year')";
}
else
{
	$sql="delete from student_details_main where (sem='$sem') AND (month='$month'  AND year='$year')";
}
if ($conn->query($sql) === TRUE)
{	
	if(mysqli_affected_rows($conn)>0)
	{
			echo "<script>alert('record successfully deleted');history.go(-1);</script>";
	}
	else
	{
			echo "<script>alert('no record deleted,pls check the input');history.go(-1);</script>";
	}
} 
else
{
		echo "<script>alert('unable to delete record,pls check input');history.go(-1);</script>";
}
$conn->close();
?>