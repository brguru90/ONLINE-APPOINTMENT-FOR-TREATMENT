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
function calculate2($sem,$branch,$year,$month)
{
	global $conn,$objPHPExcel;
	$set=0;
$sub[1]=0;
$sub[2]=0;
$sub[3]=0;
$sub[4]=0;
$sub[5]=0;
$sub[6]=0;
$sub[7]=0;
$passed[1]=0;
$passed[2]=0;
$passed[3]=0;
$passed[4]=0;
$passed[5]=0;
$passed[6]=0;
$passed[7]=0;
$lect1=array();
$lect2=array();
$sub_total=0;

$sql="select * from subjects where sem='$sem' and branch='$branch';";
$res=$conn->query($sql);
if ($res->num_rows > 0) 
{
	while($row = $res->fetch_assoc()) 
	{
		for($i=1;$i<=7;$i++)
		{
			$lect1[$i]=$row["sub$i"];
		}
	}
}

$sql="select * from student_details where sem='$sem'  and ((branch='$branch' and year='$year') and (month='$month' and rd='reguler'));";
$res=$conn->query($sql);
if ($res->num_rows > 0) 
{
	$set++;

	while($row = $res->fetch_assoc()) 
	{

		if($row["ex1"]!=-1)
		{
			$sub[1]++;
			if(($row["ex1"]+$row["ia1"])>=45)
			{
				if($row["ex1"]>=35)
				$passed[1]++;
			}
		}
		if($row["ex2"]!=-1)
		{
			$sub[2]++;
			if(($row["ex2"]+$row["ia2"])>=45)
			{
				if($row["ex2"]>=35)
				$passed[2]++;
			}
			
		}
		if($row["ex3"]!=-1)
		{
			$sub[3]++;
			if(($row["ex3"]+$row["ia3"])>=45)
			{
				if($row["ex3"]>=35)
				$passed[3]++;
			}
		}
		if($row["ex4"]!=-1)
		{
			$sub[4]++;
			if(($row["ex4"]+$row["ia4"])>=45)
			{
				if($row["ex4"]>=35)
				$passed[4]++;
			}
		}
		if($row["ex5"]!=-1)
		{
			$sub[5]++;
			if(($row["ex5"]+$row["ia5"])>=45)
			{	
				if($row["ex5"]>=35)
				$passed[5]++;
			}
		}
		if($row["ex6"]!=-1)
		{
			$sub[6]++;
			if(($row["ex6"]+$row["ia6"])>=45)
			{
				if($row["ex6"]>=35)
				$passed[6]++;
			}
		}
		if($row["ex7"]!=-1)
		{
			$sub[7]++;
			if(($row["ex7"]+$row["ia7"])>=45)
			{
				if($row["ex7"]>=35)
				$passed[7]++;
			}
		}
	}
	
}
$data[0]=$sem;
$data[1]=$lect1;
$data[2]=$sub;
$data[3]=$passed;
$data[4]=$set;
	return $data;
}
$rows=0;
$percc=0;
function display2($data,$data2,$sem)
{
$lect2=$data[1];
$sub2=$data[2];
$passed2=$data[3];
$set2=$data[4];

$lect1=$data2[1];
$sub1=$data2[2];
$passed1=$data2[3];
$set1=$data2[4];

	global $objPHPExcel,$rows,$percc;	
	$totalavgperccentage=0;
	if(($sem%2)==0)
	{
		for($i=1;$i<=7;$i++)
		{
			if($sub2[$i]!=0)
			{	
				$perccentage2 = sprintf ("%.2f",($passed2[$i]*100)/$sub2[$i]);
			}
			else{$perccentage2=0.0;}
			if($sub1[$i]!=0)
			{
				$perccentage1 = sprintf ("%.2f",($passed1[$i]*100)/$sub1[$i]);
			}
			else{$perccentage1=0.0;}
				$avgsub=($sub1[$i]+$sub2[$i]);
				$avgpassed=($passed1[$i]+$passed2[$i]);
				$avgperccentage=($perccentage1+$perccentage2)/2;
				$totalavgperccentage+=$avgperccentage;
			
		}
		$percc+=sprintf ("%d",($totalavgperccentage/$i));
	}
	
	//echo $percc."<br />";
	$rows++;
	return $percc;
	
}

function a($branch)
{ 
	global $year,$conn,$rows;
//view data in subject wise
include("db.php");
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
}

for($i=1;$i<=6;$i++)
	{
		if($i=='1' || $i=='3' || $i=='5')
		{
			$month="nov";
		}
		else
		{
			$month="may";
		}
		$data[$i]=calculate2($i,$branch,$year,$month);	
		if($i%2==0)
		{
			$data2=$data[($i-1)];
			$percc2=display2($data[$i],$data2,$i);
		}
	}
	$percc=0;
$percc=sprintf ("%d",($percc2/3));
echo $percc;
$conn->close();
}
?>