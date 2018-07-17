<?php
session_start();
	if (isset($_COOKIE['user']))
	{
		$_SESSION['user']=$_COOKIE['user'];
	}
	if (!isset($_SESSION['user']) && !isset($_SESSION['admin']))
	{
		$_SESSION['location']= 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
		header('Location:login_form.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
<title id="title">ADMIN</title>
</head>
<body>	
<?php
include('db.php');
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
}
if(isset($_POST['subject']))
{
	$id=$_POST['subject'];
	$rec=0;
}
else
{
	echo "<script>alert('none of element selected');history.go(-1);</script>";
	exit;
}
foreach($id as $key=>$values)
{
	$sql="delete from sub_details where id='$key'";
	$conn->query($sql);
	if(mysqli_affected_rows($conn)>0)
	{
		$rec++;
	}
	//echo mysqli_affected_rows($conn);
}
echo "<script>alert('$rec record deleted');history.go(-1);</script>";
?>
</body>
</html>