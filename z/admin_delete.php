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
echo "<br />
<input type='button' value='back' onclick='history.go(-1)' /><br />";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
}
$user=$_POST["user"];
foreach($user as $key=>$values)
{		
	if(isset($_POST['user']))
	{
		$sql="select * from login WHERE user='$key'";
		$res=$conn->query($sql);
		if ($res->num_rows > 0) 
		{
			while($row = $res->fetch_assoc()) 
			{
				$img=$row["images"];
			}
		}
	//echo "$key : $values<br />";
	$sql="delete from login WHERE user='$key'";
	if ($conn->query($sql) === TRUE) 
	{
		if($img!='img/default.png')
		{
			unlink("$img");
		}
		echo "$key is deleted <br />";
	}
	else 
	{
		echo "not deleted<br />;";
	}
		echo "<br />";
	}
	//echo mysqli_affected_rows($conn)."updated<br />";
}
echo "<script>alert('completed');history.go(-1);</script>";
?>
</body>
</html>