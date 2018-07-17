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
if ($results->num_rows >0) 
{
	$sql= "UPDATE student_details_main SET name='$name',sem='$sem',branch='$branch',ex1=$ex1,ex2=$ex2,ex3=$ex3,ex4=$ex4,ex5=$ex5,ex6=$ex6,ex7=$ex7,ex8=$ex8,ex9=$ex9,ex_total=$ex_total,ia1=$ia1,ia2=$ia2,ia3=$ia3,ia4=$ia4,ia5=$ia5,ia6=$ia6,ia7=$ia7,ia8=$ia8,ia9=$ia9,ia_total=$ia_total,total=$total,result='$result',rd='$reguler' where (reg='$reg' AND sem='$sem') AND (month='$month' AND year='$year');";
		if ($conn->query($sql) === TRUE)
		{
			echo "<script>alert('record successfully inserted');window.location.assign('updt.php');</script>";
		} 
		else 
		{
			echo "<script>alert('Error in updating pls check values');window.location.assign('updt_db.php?reg=$reg');</script>";
			//echo "$reg unsucsses<br />";
		}
}
else
{
		echo "<script>alert('record for register number is not already present');history.go(-1);</script>";
}
$conn->close();
?>