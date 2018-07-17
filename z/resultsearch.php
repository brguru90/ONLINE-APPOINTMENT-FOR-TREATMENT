<!DOCTYPE html>
<html>
<head>
<title id="title">view</title>
<?php include("header.php") ?>
			<!-----------------------------------------------------//navigation----------------------------------------------------------------->
<?php include("styl.php"); ?><br />
<div id="kk" style="background:transparent;">
<div id="jj">
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

$reg=$_GET["reg"];

$sql="select * from student_details_main where reg='$reg'";
$results=$conn->query($sql);
if ($results->num_rows == 0) 
{
	echo "<script>alert('record for $reg register number is not present');history.go(-1);</script>";
	
}
else
{
	echo "<h2 style='color:blue;text-decoration:underline;font-weight:900;text-shadow:1px 1px 20px yellow'>View details:</h2><br />";
	while($row = $results->fetch_assoc()) 
			{
$reg=$row["reg"];
$name=$row["name"];
$branch=$row["branch"];
$sem=$row["sem"];
$ex1=$row["ex1"];
$ex2=$row["ex2"];
$ex3=$row["ex3"];
$ex4=$row["ex4"];
$ex5=$row["ex5"];
$ex6=$row["ex6"];
$ex7=$row["ex7"];
$ex8=$row["ex8"];
$ex9=$row["ex9"];
$ex_total=$ex1+$ex2+$ex3+$ex4+$ex5+$ex6+$ex7+$ex8+$ex9;
$ia1=$row["ia1"];
$ia2=$row["ia2"];
$ia3=$row["ia3"];
$ia4=$row["ia4"];
$ia5=$row["ia5"];
$ia6=$row["ia6"];
$ia7=$row["ia7"];
$ia8=$row["ia8"];
$ia9=$row["ia9"];
$ia_total=$ia1+$ia2+$ia3+$ia4+$ia5+$ia6+$ia7+$ia8+$ia9;
$total=$ex_total+$ia_total;
$result=$row["result"];
$year=$row["year"];
$Month=$row["month"];
$reguler=$row["rd"];
$pass="passed";
$fail="failed";
	echo "
	<style>
	td{padding-left:5px;padding-right:5px;width:30%;}
	.res h2{font-family:guru;color:brown;}
	#mytb2 td{border-right:1px solid green;border-bottom:1px solid green;}
	#mytb2 th{border-right:1px solid green;border-bottom:2px solid green;padding:2px 2px 2px 2px;font-weight:bold}
	#mytb2{border:solid 2px green;color:purple}
	table{border-collapse:unset;}
	</style>
<div class='res' style='border:solid white 2px;padding:25px 5px 25px 5px;padding-left:20%;background-color:PeachPuff; '  >
<h2><u>$Month-$year Diplomo Results</u></h2>
<table class='mytb' style='color:red'>
<tr>
	<td>Reg no: $reg</td>
</tr>
<tr>
	<td>Name: $name</td>
</tr>
<tr>
	<td>Branch: $branch</td>
</tr>
<tr>
	<td>Sem: $sem</td>
</tr>
</table><br /> 
<table class='mytb' id='mytb2'>
<!------------------------->
<tr>
	<th>Exam mark</th>
	<th>I.A. Marks</th>
	<th>Total marks</th>
	<th>Result</th>
<tr>
	<td>$ex1</td>
	<td>$ia1</td>
	<td>".($ex1+$ia1)."</td>
	<td class='examres'>";
	if($row["ex1"]!=-1)
		{
			if(($row["ex1"]+$row["ia1"])>=45)
			{	
				if($row["ex5"]>=35)
				{
					echo "passed";
				}
				else
				{
					echo "failed";
				}
			}
		}
	echo "</td>
</tr>
<tr>
	<td>$ex2</td>
	<td>$ia2</td>
	<td>".($ex2+$ia2)."</td>
	<td class='examres'>";
	if($row["ex2"]!=-1)
		{
			if(($row["ex2"]+$row["ia2"])>=45)
			{	
				if($row["ex2"]>=35)
				{
					echo "passed";
				}
				else
				{
					echo "failed";
				}
			}
		}
	echo "</td>
</tr>
<tr>
	<td>$ex3</td>
	<td>$ia3</td>
	<td>".($ex3+$ia3)."</td>
	<td class='examres'>";
	if($row["ex3"]!=-1)
		{
			if(($row["ex3"]+$row["ia3"])>=45)
			{	
				if($row["ex3"]>=35)
				{
					echo "passed";
				}
				else
				{
					echo "failed";
				}
			}
		}
	echo "</td>
</tr>
<tr>
	<td>$ex4</td>
	<td>$ia4</td>
	<td>".($ex4+$ia4)."</td>
	<td class='examres'>";
	if($row["ex4"]!=-1)
		{
			if(($row["ex4"]+$row["ia4"])>=45)
			{	
				if($row["ex4"]>=35)
				{
					echo "passed";
				}
				else
				{
					echo "failed";
				}
			}
		}
	echo "</td>
</tr>
<tr>
	<td>$ex5</td>
	<td>$ia5</td>
	<td>".($ex5+$ia5)."</td>
	<td class='examres'>";
	if($row["ex5"]!=-1)
		{
			if(($row["ex5"]+$row["ia5"])>=45)
			{	
				if($row["ex5"]>=35)
				{
					echo "passed";
				}
				else
				{
					echo "failed";
				}
			}
		}
	echo "</td>
</tr>
<tr>
	<td>$ex6</td>
	<td>$ia6</td>
	<td>".($ex6+$ia6)."</td>
	<td class='examres'>";
	if($row["ex6"]!=-1)
		{
			if(($row["ex6"]+$row["ia6"])>=45)
			{	
				if($row["ex6"]>=35)
				{
					echo "passed";
				}
				else
				{
					echo "failed";
				}
			}
		}
	echo "</td>
</tr>
<tr>
	<td>$ex7</td>
	<td>$ia7</td>
	<td>".($ex7+$ia7)."</td>
	<td class='examres'>";
	if($row["ex7"]!=-1)
		{
			if(($row["ex7"]+$row["ia7"])>=45)
			{	
				if($row["ex7"]>=35)
				{
					echo "passed";
				}
				else
				{
					echo "failed";
				}
			}
		}
	echo "</td>
</tr>
<tr>
	<td>$ex8</td>
	<td>$ia8</td>
	<td>".($ex8+$ia8)."</td>
	<td class='examres'>";
	if($row["ex8"]!=-1)
		{
			if(($row["ex8"]+$row["ia8"])>=45)
			{	
				if($row["ex8"]>=35)
				{
					echo "passed";
				}
				else
				{
					echo "failed";
				}
			}
		}
	echo "</td>
</tr>
<tr>
	<td>$ex9</td>
	<td>$ia9</td>
	<td>".($ex9+$ia9)."</td>
	<td class='examres'>";
	if($row["ex9"]!=-1)
		{
			if(($row["ex9"]+$row["ia9"])>=45)
			{	
				if($row["ex9"]>=35)
				{
					echo "passed";
				}
				else
				{
					echo "failed";
				}
			}
		}
	echo "</td>
</tr>
</table>
<br />
<table class='mytb'  style='color:blue'>
<tr>
	<td>Total Exam maks: $ex_total</td>
</tr>
<tr>
	<td>Total IA Marks: $ia_total</td>
</tr>
<tr>
	<td>Grand Total: $total</td>
</tr>
<tr>
	<td colospan='2'>result: $result</td>
</tr>

<tr>
	<td colospan='2'>Is he reguler ?: $reguler</td>
</tr>
</table>
</div>
	<br /><br />";
			}//while end
			echo "<b>note:</b>absent student must be represented witd -1";
}
$conn->close();
?>
<?php include("footer.php") ?>	