
<?php
$y=date("Y");
if(date("m")<7 && date("m")>5)
{
	$year=$y;
}
else
{
	$year=$y-1;
}
include("db.php");
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
}
$content="";
//check the data base bsence in given year
$sql="select * from student_details where year='$year';";
$res=$conn->query($sql);
if ($res->num_rows > 0) 
{
$rows=0;
		
	$total1=0;$avg1=0;$total2=0;$avg2=0;
	function semister($semm,$month,$content)
	{
		global $year,$conn,$objPHPExcel,$rows;
	$sql="select * from student_details where (sem='$semm') and (year='$year' and (month='$month' and rd='REGULER'));";
	$res=$conn->query($sql);
	if ($res->num_rows > 0) 
		{
			$count=0;
			$dist=0;
			$first=0;
			$second=0;
			$avgpromote=0;
			$pass=0;
			$sub1=0;
			$sub2=0;
			$sub3=0;
			$sub4=0;
			$promote=0;
			$tablerow=0;
			/*
			First class with distinction – aggregate of 75% and above.
			First class – aggregate of 60% upto 75%
			Second class – aggregate upto 60%
			*/
			while($row = $res->fetch_assoc()) 
			{
				$sem=$row["sem"];
				$count++;
				//echo (($row['ex_total']+$row['ia_total'])/8.75)."<br />";
				$avgper[]=(($row['ex_total']+$row['ia_total'])/8.75);					
			}
			//calculating average value			
			//totaling
			$total_avgper="";
			foreach($avgper as $avgper_val)
			{
				$total_avgper+=$avgper_val;
			}
			//getting a total no.of student appears
			$mean=count($avgper);
			//total value/no.of student appears
			$avgperc=($total_avgper/$mean);
			$content=$avgperc;	
		}
		//echo $content;
		return $content;
	}

	for($i=1;$i<=5;$i+=2)
	{
		$month="nov";
	//echo "odd    : ";
		$contents[$i]=semister($i,$month,$content);
	}
	//echo "<br /><br />";
	for($i=2;$i<=6;$i+=2)
	{
		$month="may";
	//echo "even:";
		$contents[$i]=semister($i,$month,$content);
	}
	//trailing zeores
	$perc[0]=sprintf ("%.2f",($contents[1]+$contents[2])/2);
	$perc[1]=sprintf ("%.2f",($contents[3]+$contents[4])/2);
	$perc[2]=sprintf ("%.2f",($contents[5]+$contents[6])/2);
	//print_r($perc);
//---------------------------------------------------------------word-the-end-----------------------------------------------------------------------
}
else
{
	$perc[0]=0;
	$perc[1]=0;
	$perc[2]=0;
}
$conn->close();
//echo "<script>window.location.assign('http:\\sheet.xlsx')</script>";
?>