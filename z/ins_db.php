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
$sql = "create table student_details_main
(
reg VARCHAR(10) NOT NULL,
name VARCHAR(50) NOT NULL,
sem VARCHAR(6) NOT NULL,
branch VARCHAR(50),
img VARCHAR(100),
ex1 INT,
ex2 INT,
ex3 INT,
ex4 INT,
ex5 INT,
ex6 INT,
ex7 INT,
ex8 INT,
ex9 INT,
ex_total INT,
ia1 INT,
ia2 INT,
ia3 INT,
ia4 INT,
ia5 INT,
ia6 INT,
ia7 INT,
ia8 INT,

ia9 INT,
ia_total INT,
total INT,
result varchar(4),
year VARCHAR(4),
month VARCHAR(10)
);";
if ($conn->query($sql) === TRUE)
{
   echo "created<br />";
}
$reg=$_POST["reg"];
$name=$_POST["name"];
$branch=$_POST["branch"];
$sem=$_POST["sem"];
$ex1=$_POST["ex1"];
$ex2=$_POST["ex2"];
$ex3=$_POST["ex3"];
$ex4=$_POST["ex4"];
$ex5=$_POST["ex5"];
$ex6=$_POST["ex6"];
$ex7=$_POST["ex7"];
$ex8=$_POST["ex8"];
$ex9=$_POST["ex9"];
$ex_total=$ex1+$ex2+$ex3+$ex4+$ex5+$ex6+$ex7+$ex8+$ex9;
$ia1=$_POST["ia1"];
$ia2=$_POST["ia2"];
$ia3=$_POST["ia3"];
$ia4=$_POST["ia4"];
$ia5=$_POST["ia5"];
$ia6=$_POST["ia6"];
$ia7=$_POST["ia7"];
$ia8=$_POST["ia8"];
$ia9=$_POST["ia9"];
$ia_total=$ia1+$ia2+$ia3+$ia4+$ia5+$ia6+$ia7+$ia8+$ia9;
$total=$ex_total+$ia_total;
$result=$_POST["result"];
$year=$_POST["year"];
$month=$_POST["month"];
$reguler=$_POST["reguler"];

$sql="select * from student_details_main where (reg='$reg' AND sem='$sem') AND (month='$month'  AND year='$year')";
$results=$conn->query($sql);
if ($results->num_rows == 0) 
{
	
	$sql="insert into student_details_main(reg,name,sem,branch,ex1,ex2,ex3,ex4,ex5,ex6,ex7,ex8,ex9,ex_total,ia1,ia2,ia3,ia4,ia5,ia6,ia7,ia8,ia9,ia_total,total,result,year,month,rd) values ('$reg','$name','$sem','$branch',$ex1,$ex2,$ex3,$ex4,$ex5,$ex6,$ex7,$ex8,$ex9,$ex_total,$ia1,$ia2,$ia3,$ia4,$ia5,$ia6,$ia7,$ia8,$ia9,$ia_total,$total,'$result','$year','$month','$reguler')";
	if ($conn->query($sql) === TRUE) 
	{
		$sql="select * from sem_details where (reg='$reg' AND sem='$sem') AND (branch='$branch'  AND year='$year')";
		$results=$conn->query($sql);
		if ($results->num_rows == 0) 
		{
			$sql="insert into sem_details('$reg','$sem','$branch','$year','$reguler')";
			$conn->query($sql);
			echo "<script>alert('record successfully inserted');history.go(-1);</script>";
		}
		else
		{
			echo "<script>alert('record for register number alereday present');history.go(-1);</script>";
		}
	}
}
else
{
	echo "<script>alert('record for register number alereday present');history.go(-1);</script>";
}
$conn->close();
?>