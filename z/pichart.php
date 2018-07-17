
<?php
session_start();
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
//------------first time create database----------------------
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
include("std_detail.php");
$text=file_get_contents("count.txt");
$count=explode("=",$text);
if(!isset($count[1]))
{
	file_put_contents("likes.txt","likes=0");
	file_put_contents("count.txt","count=0");
	include("initialize.php");
}
//---------------------------conect DB--------------------------
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
}
//---------first time login table creation----------
include("sdba/subject.php");
$sql = "create table admin_login
(
user VARCHAR(20) UNIQUE,
pwd VARCHAR(20) NOT NULL
);";
$conn->query($sql);
$sql="insert into admin_login values('admin','12345')";
$conn->query($sql);
$sql="insert into admin_login values('guru','9611')";
$conn->query($sql);
//-----------------------continue pi chart operation-------------
$content="";
$avgdist=0;$avgfirst=0;$avgsecond=0;$avgpass=0;$avgfaile=0;$data;
//check the data base bsence in given year
$sql="select * from student_details where year='$year';";
$res=$conn->query($sql);
if ($res->num_rows > 0) 
{
	function semister($semm,$month,$content,$branch)
	{
		global $year,$conn,$objPHPExcel,$rows,$avgdist,$avgfirst,$avgsecond,$avgpass,$avgfaile,$ss,$data;
	$sql="select * from student_details where (sem='$semm' and branch='$branch') and (year='$year' and (month='$month' and rd='reguler'));";
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
			$fail=0;
			/*
			First class with distinction – aggregate of 75% and above.
			First class – aggregate of 60% upto 75%
			Second class – aggregate upto 60%
			*/
			while($row = $res->fetch_assoc()) 
			{
				$sem=$row["sem"];
				$count++;
				if(strcasecmp($row['result'],"Fail")==0)
				{
					$fail++;
				}
				//distinction
				if(strcasecmp($row['result'],"Dist")==0)
				{
					$dist++;
					$promote++;
				}
				//first class
				if(strcasecmp($row['result'],"Firs")==0)
				{
					$first++;
					$promote++;
				}
				//second class
				if(strcasecmp($row['result'],"Pass")==0)
				{
					$second++;	
					$promote++;//no of std passed
				}
				$mon=$row['month'];
				//failed in except..
				{
					if(($row['ex1']+$row['ia1'])<45)
					{
						$sub1++;
					}
					if(($row['ex2']+$row['ia2'])<45)
					{
						$sub2++;
					}
					if(($row['ex3']+$row['ia3'])<45)
					{
						$sub3++;
					}
					if(($row['ex4']+$row['ia4'])<45)
					{
						$sub4++;
					}	
					
				}
				
				//echo "<br /><b style='color:white'>$count->".$row["sem"]." : ".$row['result']." : ".$row["name"]."</b>";
					
			}
			$pass=$dist+$first+$second;
			$avgpromote=($promote*100)/$count;
			$avgpromote=sprintf ("%d",$avgpromote);
			$avgpas=($pass*100)/$count;
			$avgfail=($fail*100)/$count;
			$avgfaile+=sprintf ("%d",$avgfail);
			$avgpass+=sprintf ("%d",$avgpas);
			$avgdist+=sprintf ("%d",(($dist*100)/$count));
			$avgfirst+=sprintf ("%d",(($first*100)/$count));
			$avgsecond+=sprintf ("%d",(($second*100)/$count));
			$ss++;
					//echo "<br />$avgpass : $avgsecond : $avgfirst : $avgdist : $avgfaile<br />";
			$data[$branch][$sem]['avg']=$ss;
			$data[$branch][$sem]['pass']=$avgpass;
			$data[$branch][$sem]['second']=$avgsecond;
			$data[$branch][$sem]['first']=$avgfirst;
			$data[$branch][$sem]['dist']=$avgdist;
			$data[$branch][$sem]['fail']=$avgfaile;
			/*echo "sem:".$sem." :$mon<br />count:$count<br />Distinction:$dist<br />first class:$first<br />second:$second<br />pass:$pass<br />average of pass:$avgpass<br />
			failed in,<br />sub1:$sub1 | sub2:$sub2 | sub3:$sub3 | sub4:$sub4 | TOTAL:".($sub1+$sub2+$sub3+$sub4)."<br />promoted:$promote<br />average of promoted:$avgpromote
			<br /><br />";*/
			
		}
		else
{
	echo "Error: " . $sql . "<br>" . $conn->error;
}
	}
	$branch=array('cs','ec');
	foreach($branch as $val)
{
	global $ss,$avgdist,$avgfirst,$avgsecond,$avgpass,$avgfaile;
	$ss=0;$avgdist=0;$avgfirst=0;$avgsecond=0;$avgpass=0;$avgfaile=0;
	for($i=1;$i<=5;$i+=2)
	{
		$month="nov";
	//echo "odd    : ";
		semister($i,$month,$content,$val);
	}
	//echo "<br /><br />";
	for($i=2;$i<=6;$i+=2)
	{
		$month="may";
	//echo "even:";
		semister($i,$month,$content,$val);
	}
}
}
	else
{
	echo "<pre>no database found in $year year</pre>";
		$_SESSION['pass']=1;
		$_SESSION['second']=1;
		$_SESSION['first']=1;
		$_SESSION['dist']=1;
		$_SESSION['fail']=1;
		header('Location: home.php');
	echo "
<script>
//window.location.assign('home.php');
</script>";
	exit;
}
$conn->close();
//echo "<script>window.location.assign('http:\\sheet.xlsx')</script>";
foreach($data as $key=>$values)
{
	foreach($values as $key1=>$val)
	{
		foreach($val as $key2=>$v)
		{
			//echo "$key=>$key=>$key2=>$v<br />";
		}
		$total['pass']=sprintf ("%d",($val['pass']/$val['avg']));
		$total['second']=sprintf ("%d",($val['second']/$val['avg']));
		$total['first']=sprintf ("%d",($val['first']/$val['avg']));
		$total['dist']=sprintf ("%d",($val['dist']/$val['avg']));
		$total['fail']=sprintf ("%d",($val['fail']/$val['avg']));
	}
}

foreach($total as $key=>$values)
{
//echo  $values."<br />";
}
//$lo="home.php?pass=".$total['pass']."&second=".$total['second']."&first=".$total['first']."&dist=".$total['dist']."&fail=".$total['fail'];
//header("Location:$lo");
$_SESSION['pass']=$total['pass'];
$_SESSION['second']=$total['second'];
$_SESSION['first']=$total['first'];
$_SESSION['dist']=$total['dist'];
$_SESSION['fail']=$total['fail'];
header('Location: home.php');
echo "
<script>
//window.location.assign('home.php');
</script>";

?>