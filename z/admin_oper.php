<?php
session_start();
	if (!isset($_SESSION['admin']))
	{
		header('Location:home.php');
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
include("sms/guru2.php");
echo "<br />
<input type='button' value='back' onclick='history.go(-1)' /><br />";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
}
$user=$_POST['user'];
foreach($user as $key=>$values)
{
	//echo "$key : $values<br />";
	$sql="UPDATE login SET status='$values' WHERE user='$key'";
	$conn->query($sql);
	if(mysqli_affected_rows($conn)>0)
	{
	$sql="select * from login WHERE user='$key'";
	$result=$conn->query($sql);
	if ($result->num_rows > 0) 
	{
    //sending sms
		while($row = $result->fetch_assoc()) 
		{
			
			$to=$row["phno"];
			$name=$row["name"];
			$uname=$row["user"];
			$pwd=$row["pwd"];
			$password="";
			$msg="Hi $name, your account has been $values.".chr (10)."username:$uname".chr (10)."password:".$pwd.chr (10)."login at:www.mysite.com";
			send($to,$msg);
		}
	}
	}
	echo "<br />";
	//echo mysqli_affected_rows($conn);
}
?>
</body>
</html>