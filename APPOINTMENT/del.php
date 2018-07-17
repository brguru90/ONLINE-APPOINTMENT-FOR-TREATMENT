<?php
date_default_timezone_set("Asia/Calcutta");
		$today=date("Y-m-d");
		//echo $today;
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
$sql = "create table allocated_time
(
name VARCHAR(20) NOT NULL,
address VARCHAR(20),
mob_no DECIMAL(15) NOT NULL,
dates date NOT NULL,
alc_time varchar(5),
time_expire varchar(5),
duration INT
);";
if ($conn->query($sql) === TRUE) {
    echo "table created successfully<br />";
	$conn->query("INSERT INTO allocated_time (name, address, mob_no, dates, alc_time, duration) VALUES ('guru', 'srb', '9482399078', '$today', '9', '30');");
	$conn->query("INSERT INTO allocated_time (name, address, mob_no, dates, alc_time, duration) VALUES ('maruthi', 'bdvt', '0000000000', '$today', '9:30', '60');");
	$conn->query("INSERT INTO allocated_time (name, address, mob_no, dates, alc_time, duration) VALUES ('harsha', 'shikaripura', '9999999999', '$today', '10:30', '30');");
}
	//else {echo "Error: " . $sql . "<br>" . $conn->error;}
if(isset($_POST['timedate']) && $_POST['timedate']!="" && isset($_POST['name']) && $_POST['name']!="")
{
	$name=$_POST['name'];
	$td=explode(' ',$_POST['timedate']);
	$yyyymmdd=$td[0];
	$ymd=explode('/',$yyyymmdd);
	$yyyy=$ymd[0];
	$mm=$ymd[1];
	$dd=$ymd[2];
	$hhmm=$td[1];
	$tim=explode(':',$hhmm);
	if($tim[0]>24 || $tim[1]>59)
	{
		echo "<script>alert('Invalid time');history.go(-1);</script>";
		exit;
	}
	$datee="$yyyy-$mm-$dd";
	
	$time=$hhmm;
	$today=$datee;
}
else
{
	echo "<script>alert('Some Thing Wents Go Wrong!');history.go(-1);</script>";	header('Location: '.'view.html');
}

$sql="delete from allocated_time where (dates='$today' and 	alc_time='$time') and name='$name'";
if ($conn->query($sql) === TRUE)
{
	if(mysqli_affected_rows($conn)>0)
	{
			echo "<script>alert('Deleted Sucessfully');history.go(-1);</script>";	
	}
	else
	{
			echo "<script>alert('No appointment found for given data');history.go(-1);</script>";
	}
}
else
{
	echo "<script>alert('Some Thing Wents Go Wrong!');history.go(-1);</script>";		
}
?>