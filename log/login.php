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
$sql = "create table login
(
name VARCHAR(20) NOT NULL,
user VARCHAR(20) UNIQUE,
pwd VARCHAR(20) NOT NULL,
email VARCHAR(40) UNIQUE NOT NULL,
phno DECIMAL(12) NOT NULL,
status  varchar(20)
);";
$conn->query($sql);
$user=$_POST["user"];
$pwd=$_POST["pwd"];
$sql="select * from login where user='".$user."';";
$result=$conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) 
	{
		if($row["status"]=="deactivated")
		{
			echo "<script>alert('you are account currently not activated');history.go(-1);</script>";
		}
		else
		{
			$passwd=$row["pwd"];
			if($pwd===$passwd)
			{
				//if the keep login is checked
				if(isset($_POST["loginkeeping"]))
				{
					setcookie("user",$user, time() + (86400), "/");
				}
				header('Location: '.$_SESSION['location']);
				//header('Location: home.php');
				//echo "<script>history.go(-);</script>";
				$_SESSION["user"]="$user";
			}
			else
			{
				echo "<script>alert('entered password is incorrect');history.go(-1);</script>";
			
			}
		}
    }
	} else {
   echo "<script>alert('you have entered invalid user name');history.go(-1);</script>";
}
 

$conn->close();
?> 