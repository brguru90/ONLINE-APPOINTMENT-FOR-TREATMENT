<?php include('log_details.php');?>
<?php
$year=$_POST['year'];
$branch=$_POST['branch'];
include("db.php");
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
}
//-----------------------------------------------------------------------------
$stuff="Register no \t name  \t  sem  \t  branch  \t  ex1  \t  ex2  \t  ex3  \t  ex4 \t ex5 \t ex6 \t ex7 \t ex8 \t ex9 \t ex_total \t ia1 \t ia2 \t ia3 \t ia4 \t ia5 \t ia6 \t ia7 \t ia8 \t ia9 \t ia_total \t total \t result \t month \t year \t reguler \r\n";
$sql="select * from student_details_main where year='$year' and branch='$branch' order by reg ;";
$result=$conn->query($sql);
if ($result->num_rows > 0) 
{
			//----------------------------------------------------------------------------

		 $filename ="document_name.xls";
			header('Content-type: application/ms-excel');
			header('Content-Disposition: attachment; filename='.$filename);
		////////////////////////////////// END SETUP
		////////////////////////////////// BEGIN GATHER
			// Your MySQL queries, fopens, et cetera go here.
			// Cells are delimited by  \t 
			// \n is just like you might expect; new line/row below
			// E.G:
//----------------------------------------------------------------------------
    // output data of each row
	$i=1;$j=0;
    while($row = $result->fetch_assoc()) 
	{
	////////////////////////////////// BEGIN SETUP
   if($row["reg"]==-1 || $row["reg"]==""){continue;}
   $stuff=$stuff.
	$row["reg"].
	" \t ".$row["name"].
	" \t ".$row["sem"].
	" \t ".$row["branch"].
	" \t ".$row["ex1"].
	" \t ".$row["ex2"].
	" \t ".$row["ex3"].
	" \t ".$row["ex4"].
	" \t ".$row["ex5"].
	" \t ".$row["ex6"].
	" \t ".$row["ex7"].
	" \t ".$row["ex8"].
	" \t ".$row["ex9"].
	" \t ".$row["ex_total"].
	" \t ".$row["ia1"].
	" \t ".$row["ia2"].
	" \t ".$row["ia3"].
	" \t ".$row["ia4"].
	" \t ".$row["ia5"].
	" \t ".$row["ia6"].
	" \t ".$row["ia7"].
	" \t ".$row["ia8"].
	" \t ".$row["ia9"].
	" \t ".$row["ia_total"].
	" \t ".$row["total"].
	" \t ".$row["result"].
	" \t ".$row["month"].
	" \t ".$row["year"].
	" \t ".$row["rd"].
	"\n";
	}
////////////////////////////////// END GATHER
// The point is to get all of your data into one string and then:
////////////////////////////////// BEGIN DUMP
    echo $stuff;
	$file = fopen('sdba/temp/result.xls', 'w');
			fwrite($file, $stuff);
			fclose($file);
////////////////////////////////// END DUMP	
}
else
{
	echo "<script>alert('no databse found for this year');history.go(-1);</script>";
}
$conn->close();
?>