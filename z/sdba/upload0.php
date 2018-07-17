
<html>
<div onclick="history.go(-1)" style='width:250px;height:60px;background-color:white;text-align:center;position:fixed;left:0px;top:-10px;border:solid silver 2px'>
<h2>return back</h2>
</div>
<?php include("styl.php"); ?>

<div style="width:60%;position:relative;left:20%;top:40px;border:2px solid silver;visibility:hidden;" id="st">
<div style="padding:15px 15px 15px 15px;">
	<b>status:</b><div id="per"></div>
</div>
</div>
				
<!------------------------------------------------------------------------------------------->
<!------------------------------------------------------------------------------------------->
<?php

include("../db.php");
switch($std_table)
{
	case 1:	$table1="student_details";
			$table2="student_all";
			break;
	case 2: $table1="student_all";
			$table2="student_details";
			break;	
	default:$table1="student_details";
			$table2="student_all";
			break;
}
//to parse XLS files, include php-excel-reader
		require('php-excel-reader/excel_reader2.php');
		require('spreadsheetReader/SpreadsheetReader.php');
// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE $dbname ";
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
month VARCHAR(10),
rd varchar(10)
);";
$conn->query($sql);


$allfiles=scandir("temp/");
//print_r($allpages);
foreach($allfiles as $f)	
{
	if($f=="." || $f=="..")
	{continue;}
	//echo $f;
	unlink("temp/".$f);
}
$files_ind=array("subject","sem1","sem2","sem3","sem4","sem5","sem6","exam");
foreach($files_ind as $file_ind)
{
	if(isset($_FILES["$file_ind"]) && strlen(basename($_FILES["$file_ind"]['name']))>0)
	{
		uploadexcel($file_ind);
		//echo $file_ind;
	}
}
//------------------------upload file--------------------------------
function uploadexcel($file_index)
{
	if(!isset($_FILES["$file_index"]))
	{
		header('Location:../upload.php');
	}
	if($file_index=='exam')
	{
		echo "<script>document.getElementById('st').style.visibility='visible';</script>";
	}
	$uploaddir = 'temp/';//temprovery folder for upload
	$uploadfile = $uploaddir . basename($_FILES["$file_index"]['name']);//fullpath(directory+name)
	$format=pathinfo($uploadfile,PATHINFO_EXTENSION);//getting file extension
	$filename=basename( $_FILES["$file_index"]["name"]);//just file name
	if($format!="csv" && $format!="xls" && $format!="xlsx")//matching for format for calling appropriate function to the format upload
	{
		echo "invalid file format";
	}
	else if (move_uploaded_file($_FILES["$file_index"]['tmp_name'], $uploadfile))
	{
		// echo basename( $_FILES["$file_index"]["name"])." :File is valid, and was successfully uploaded.\n";
		if($format=="csv")
		{
			if($file_index=='exam')
			{
				examcsv($filename);
			}
		}
		else
		{	
			if($file_index=='exam')
			{
				examexcel($filename);
			}
			else
			{
				other($filename,$file_index);//all row must have correct number of column
			}
		}	

	} 
	else
	{
		echo "Possible file upload attack!\n";
	}
}
//-----------------------uplaoding result xls or xlsx--------------------------------------------
$det=array();
function examexcel($filename)
{
		echo "<br /><br /><br /><br /><style>td,tr{border:solid 2px silver;padding:2px 2px 2px 2px;text-align:left}</style>";
		//to parse XLS files, include php-excel-reader
		//require('php-excel-reader/excel_reader2.php');
		//require('spreadsheetReader/SpreadsheetReader.php');
		$Reader = new SpreadsheetReader("temp/".$filename);
		
		//print_r($Reader);
		echo "<table style='display:none'>";
		$percentage=0;
		foreach($Reader as $data)
		{
			//finding invalid row and taking vali count
			 if(preg_match("/[0-9]{3}[a-zA-Z]{2}[0-9]{5}/",$data[1])==1)
			{
				$percentage++;//counting total number of rows
				//determining exact semister by calculating the maximum occurance of student in that semister by taking--139cs{13}011==sem4
				if($data[3]==1)
				{
					$exactsem1[]=substr($data[1],5,2);
				}
				if($data[3]==2)
				{
					$exactsem2[]=substr($data[1],5,2);
				}
				if($data[3]==3)
				{
					$exactsem3[]=substr($data[1],5,2);
				}
				if($data[3]==4)
				{
					$exactsem4[]=substr($data[1],5,2);
				}
				if($data[3]==5)
				{
					$exactsem5[]=substr($data[1],5,2);
				}
				if($data[3]==6)
				{
					$exactsem6[]=substr($data[1],5,2);
				}
					
			}
			else
			{
				//insertion error display
				/*
				if(isset($data[0]))
				echo $data[0]." - ";
				echo "this row have invalid reg no".$data[1]." : $data[2]<br />";
				*/
			}
		}
		//calculating exact value which ocured maximum time
		$c = array_count_values($exactsem1); 
		$val[0] = array_search(max($c), $c);
		$c = array_count_values($exactsem2); 
		$val[1] = array_search(max($c), $c);
		$c = array_count_values($exactsem3); 
		$val[2] = array_search(max($c), $c);
		$c = array_count_values($exactsem4); 
		$val[3] = array_search(max($c), $c);
		$c = array_count_values($exactsem5); 
		$val[4] = array_search(max($c), $c);
		$c = array_count_values($exactsem6); 
		$val[5] = array_search(max($c), $c);
		/*
		foreach($val as $key=>$values)
		{
			echo ($key+1).": $values<br />";
		}
		*/
		$cc=0;
		$abc=0;
		foreach($Reader as $data)
		{
				//result no pattern matching
			if(preg_match("/[0-9]{3}[a-zA-Z]{2}[0-9]{5}/",$data[1])==1)
			{
				$c=0;
				echo "<tr id='a$abc'>";
				include('data_ins.php');//part of common code to insert into DB & creation of html tables/rows
				echo "</tr>";
				$abc++;
			}
			
		}
		echo "</table>";
unlink("temp/".$filename);//delete temprovery file After reading it
}
//------------------------uploading csv formated spreadsheet(text delimited with comas)-------------------------------------------
function examcsv($filename)
{
 echo "<br /><br /><br /><br /><style>td,tr{border:solid 2px silver;padding:2px 2px 2px 2px;text-align:left}</style>";
$file = fopen("temp/".$filename,"r");
$file2 = fopen("temp/".$filename,"r");
$c=0;
//echo "<br />total".filesize("temp/".$filename);
//echo "<br />one".count(fgetcsv($file));
//echo "<br />total/one".filesize("temp/".$filename)/count(fgetcsv($file));
echo "<table>";
$percentage=0;
while(! feof($file2))
  {
	  $percentage++;//counting total number of rows
	  $test=fgetcsv($file2);
	  if(preg_match("/[0-9]{3}[a-zA-Z]{2}[0-9]{5}/",$test[1])==1)
			{
				if($test[3]==1)
				{
					$exactsem1[]=substr($test[1],5,2);
				}
				if($test[3]==2)
				{
					$exactsem2[]=substr($test[1],5,2);
				}
				if($test[3]==3)
				{
					$exactsem3[]=substr($test[1],5,2);
				}
				if($test[3]==4)
				{
					$exactsem4[]=substr($test[1],5,2);
				}
				if($test[3]==5)
				{
					$exactsem5[]=substr($test[1],5,2);
				}
				if($test[3]==6)
				{
					$exactsem6[]=substr($test[1],5,2);
				}
			}
  }
  //echo "<br />".$percentage;
fclose($file2); 
$cc=0;
$abc=0;
//simple technic efficient but not perfect
//calculating exact value which ocured maximum time
		$c = array_count_values($exactsem1); 
		$val[0] = array_search(max($c), $c);
		$c = array_count_values($exactsem2); 
		$val[1] = array_search(max($c), $c);
		$c = array_count_values($exactsem3); 
		$val[2] = array_search(max($c), $c);
		$c = array_count_values($exactsem4); 
		$val[3] = array_search(max($c), $c);
		$c = array_count_values($exactsem5); 
		$val[4] = array_search(max($c), $c);
		$c = array_count_values($exactsem6); 
		$val[5] = array_search(max($c), $c);
 while(! feof($file))
  {
	  $c=0;
	
	//if(!fgetcsv($file)){break;}
	$data=fgetcsv($file);//to get array from a file
			//result no pattern matching 139cs13011
			if(preg_match("/[0-9]{3}[a-zA-Z]{2}[0-9]{5}/",$data[1])==1)
			{
				$c=0;
				echo "<tr id='a$abc'>";
				include('data_ins.php');//part of common code to insert into DB & creation of html tables/rows
				echo "</tr>";
				$abc++;
			}
	
  }
  echo "</table>";

fclose($file); 
$file = "temp/".$filename;
unlink($file);//delete file ofter reading it
}
//-------------------------------------------------------------------
function ins($reg,$name,$sem,$branch,$img,$ex1,$ex2,$ex3,$ex4,$ex5,$ex6,$ex7,$ex8,$ex9,$ex_total,$ia1,$ia2,$ia3,$ia4,$ia5,$ia6,$ia7,$ia8,$ia9,$ia_total,$total,$result,$year,$abc,$month,$dtn)
{
	global $conn;
$sql="select * from student_details_main where (reg='$reg' AND sem='$sem') AND (month='$month'  AND year='$year')";
$results=$conn->query($sql);
if ($results->num_rows == 0) 
{
	//echo $results->num_rows;
//inserting details into database
$sql="insert into student_details_main(reg,name,sem,branch,img,ex1,ex2,ex3,ex4,ex5,ex6,ex7,ex8,ex9,ex_total,ia1,ia2,ia3,ia4,ia5,ia6,ia7,ia8,ia9,ia_total,total,result,year,month,rd) values ('$reg','$name','$sem','$branch','$img',$ex1,$ex2,$ex3,$ex4,$ex5,$ex6,$ex7,$ex8,$ex9,$ex_total,$ia1,$ia2,$ia3,$ia4,$ia5,$ia6,$ia7,$ia8,$ia9,$ia_total,$total,'$result','$year','$month','$dtn')";
	if ($conn->query($sql) === TRUE) 
	{
		echo "<style>#a$abc td{color:green;}</style>";//new inserting row are colored green
	}
	else {echo "Error: " . $sql . "<br>" . $conn->error;}
}
else
{
	/*
	//echo "Error: " . $sql . "<br>" . $conn->error;
	//updating database
	$updt= "UPDATE student_details SET name='$name',sem='$sem',branch='$branch',img='$img'";//these are comman
	$results1=$conn->query("select * from student_details where reg='$reg' AND sem='$sem' AND month='$month'  AND year='$year'");
	while($row = $results1->fetch_assoc()) 
		{
			if($ex1!=$row["ex1"])
			{$updt.=",ex1=".$ex1;}
			//echo $row["ex1"].":".$ex1."<br />";
			if($ex2!=$row["ex2"])
			{$updt.=",ex2=".$ex2;}
			if($ex3!=$row["ex3"])
			{$updt.=",ex3=".$ex3;}
			if($ex4!=$row["ex4"])
			{$updt.=",ex4=".$ex4;}
			if($ex5!=$row["ex5"])
			{$updt.=",ex5=".$ex5;}
			if($ex6!=$row["ex6"])
			{$updt.=",ex6=".$ex6;}
			if($ex7!=$row["ex7"])
			{$updt.=",ex7=".$ex7;}
		}
	$updt.=",ia1=$ia1,ia2=$ia2,ia3=$ia3,ia4=$ia4,ia5=$ia5,ia6=$ia6,ia7=$ia7,ia8=$ia8,ia9=$ia9,ia_total=$ia_total";//ia marks are not changed
	$updt.=",".$ex_total+$ia_total;
	$updt.=",result='$result' where reg='$reg' AND sem='$sem' AND month='$month' AND year='$year';";//these are also same and compulsory
	$sql=$updt;
	//echo "<br />".$updt."<br />";
	*/
	
	$sql= "UPDATE student_details_main SET name='$name',sem='$sem',branch='$branch',img='$img',ex1=$ex1,ex2=$ex2,ex3=$ex3,ex4=$ex4,ex5=$ex5,ex6=$ex6,ex7=$ex7,ex8=$ex8,ex9=$ex9,ex_total=$ex_total,ia1=$ia1,ia2=$ia2,ia3=$ia3,ia4=$ia4,ia5=$ia5,ia6=$ia6,ia7=$ia7,ia8=$ia8,ia9=$ia9,ia_total=$ia_total,total=$total,result='$result',rd='$dtn' where (reg='$reg' AND sem='$sem') AND (month='$month' AND year='$year');";
	
		if ($conn->query($sql) === TRUE)
		{
			echo "<style>#a$abc td{color:blue;}</style>";//updating row are colored blue
		} 
		else 
		{
			//echo "Error: " . $sql . "<br>" . $conn->error;
			echo "$reg unsucsses<br />";
		}
	
}
//else {echo "Error: " . $sql . "<br>" . $conn->error;}

}
 

 //-----------------------uplaoding result xls or xlsx--------------------------------------------
function other($filename,$table)
{
	global $conn;
	$sql = "create table sem_details
	(
	reg VARCHAR(10) NOT NULL,
	sem VARCHAR(6) NOT NULL,
	branch VARCHAR(50),
	year VARCHAR(4),
	rd varchar(10)
	);";
	$conn->query($sql);
		$Reader = new SpreadsheetReader("temp/".$filename);
		//print_r($Reader);
		$percentage=0;
		$year=$_POST["year"];
		$branch=$_POST["branch"];
		$table=preg_replace("/sem/","",$table);
		foreach($Reader as $data)
		{
			if($table!='subject')
			{
				datainsert_sem($data,$year,$branch,$table);
			}
			else
			{
				datainsert_sub($data,$year,$branch);
			}
			$data=array();
		}
		//echo "$table:inserted<br />";
}
function datainsert_sem($data,$year,$branch,$table)
{
	global $conn;
	$indexes=0;
	$sentance="";
	while(isset($data[$indexes]))
	{
		if(preg_match("/[0-9]{3}[a-zA-Z]{2}[0-9]{5}/",$data[$indexes])!=1)
		{
			continue;
		}
		if($indexes==0)
		{
			$sentance.="'$data[$indexes]'";
		}
		else
		{
			$sentance.=","."'$data[$indexes]'";
		}
		$indexes++;
	}
	$sentance.=",'$table','$branch','$year'";
	$sentence_array=explode(',',$sentance);
	$reg_no=$sentence_array[0];
	//-------------------prevent duplicate insertion------------------------by testing wether it is aleready exist by select statment----------create a view of both
	//echo $sentance;
	$sql0="select * from sem_details where (branch='$branch' AND sem='$table') AND (reg=$reg_no AND year='$year')";
	$results0=$conn->query($sql0);
	//echo $results->num_rows;
	if ($results0->num_rows == 0) 
	{
		$sql="insert into sem_details values($sentance,'reguler')";
		$conn->query($sql);
	}
}
function datainsert_sub($data,$year,$branch)
{
	global $conn;
	$indexes=0;
	$sentance="";
	while(isset($data[$indexes]) && count($data)<=5)
	{
		if($indexes==0)
		{
			$sentance.="'$data[$indexes]'";
		}
		else
		{
			$sentance.=",'$data[$indexes]'";
		}
		$indexes++;
	}
	$sem=$data[0];
	$sub=$data[2+1];
	$sentance.=",'$branch','$year'";
	//echo $sentance;	echo "<br />";
	
	$sql="select * from sub_details where (branch='$branch' AND sem='$sem') AND (sub_name='$sub'  AND year='$year')";
	$results=$conn->query($sql);
	if ($results->num_rows < 1) 
	{
		$sql="insert into sub_details (sem,sub_order,sub_code,sub_name,staff_member,branch,year) values($sentance)";
		$conn->query($sql);
	}
	
}
update_subject($_POST['year']);
update_staff();

function update_subject($y)
{
		global $conn;
		$success=0;
		$fail=0;
		$repeated=0;
		//$conn->query("delete from subjects");
include('subject.php');
$dept=array('cs','ec');
$allsem=array(1,2,3,4,5,6);
foreach($allsem as $allsem_val)
{
	foreach($dept as $dept_val)
	{
		$sentance="";
		$sql="select * from sub_details where sem='$allsem_val' and (branch='$dept_val' and year='$y') order by sub_order";
		$res=$conn->query($sql);
		if ($res->num_rows > 0) 
		{
			$fir=0;
			while($row = $res->fetch_assoc()) 
			{
				/*
				echo $row['id'];echo " :: ";
				echo $row['sem'];echo " :: ";
				echo $row['sub_order'];echo " :: ";
				echo $row['sub_code'];echo " :: ";
				echo $row['sub_name'];echo " :: ";
				echo $row['staff_member'];echo " :: ";
				echo $row['branch'];echo " :: ";
				echo $row['year'];echo "<br />";
				*/
				$year=$row['year'];
				if($fir==0)
				{
					$sentance.="'".$row['sub_name']."'";
					
				}
				else
				{
					$sentance.=","."'".$row['sub_name']."'";
				//	echo $sentance."<br />";
				}
				$fir++;
			}
			//echo $sentance;echo "<br />";
			$len=explode(',',$sentance);//get the number of subjects
			if(count($len)==6)
			{
				$sentance.=",''";
			}
			$sqll="select * from subjects where (sem='$allsem_val' and branch='$dept_val') and (year='$y')";
			$resl=$conn->query($sqll);
			if ($resl->num_rows == 0) 
			{
				$sql2="insert into subjects (branch,sem,year,sub1,sub2,sub3,sub4,sub5,sub6,sub7) values('$dept_val',$allsem_val,$year,$sentance);";
				if($conn->query($sql2))
				{
					$success++;
				}
				else
				{
					$fail++;
				echo "Error: " . $sql2 . "<br>" . $conn->error;
				}
			}
			else
			{
				$repeated++;
			}
		}
	}
}
echo "<br /><b>subject details</b><br />Success:$success<br />Fail:$fail<br />repeated:$repeated";	
}

function update_staff()
{
		$success=0;
		$fail=0;
		global $conn;
		$conn->query("delete from staff_details");
		$sql="select * from sub_details order by year,branch,sem,sub_order";
		$res=$conn->query($sql);
		if ($res->num_rows > 0) 
		{
			while($row = $res->fetch_assoc()) 
			{
				$id=$row['id'];
				$sem=$row['sem'];
				$sub_order=$row['sub_order'];
				$subject=$row['sub_name'];
				$member=$row['staff_member'];
				$branch=$row['branch'];
				$year=$row['year'];
				$sql="insert into staff_details (id,sub_order,subject,member,branch,sem,year) values($id,$sub_order,'$subject','$member','$branch','$sem','$year')";
				if($conn->query($sql))
				{
					$success++;
				}
				else
				{
					$fail++;
				}
			}
			echo "<br /><b>staff details</b><br />Success:$success<br />Fail:$fail";
		}
}

//create view
$sql="drop view $table1;";
$conn->query($sql);
$sql="drop table $table1;";
$conn->query($sql);
$sql="create view $table1 as (select s1.reg,s1.name,s1.sem,s1.branch,s1.ex1,s1.ex2,s1.ex3,s1.ex4,s1.ex5,s1.ex6,s1.ex7,s1.ex8,s1.ex9,s1.ex_total,s1.ia1,s1.ia2,s1.ia3,s1.ia4,s1.ia5,s1.ia6,s1.ia7,s1.ia8,s1.ia9,s1.ia_total,s1.total,s1.result,s1.year,s1.month,s2.rd from student_details_main s1,sem_details s2 where (s1.reg=s2.reg and s1.sem=s2.sem) and (s1.branch=s2.branch and s1.year=s2.year) order by year,branch,sem,reg);";
if ($conn->query($sql) === TRUE) {
   //echo "view created successfully<br />";
}
//else {echo "Error: " . $sql . "<br>" . $conn->error;}
//reguler students
$sql="drop table $table2;";
$conn->query($sql);
$sql="drop view $table2;";
$conn->query($sql);
$sql="create view $table2 as (select * from student_details_main where rd='reguler'  order by year,branch,sem,reg)";
$conn->query($sql);
//reguler students
$sql="drop view student_reguler;";
$conn->query($sql);
$sql="create view student_reguler as (select reg,name,sem,branch,ex1,ex2,ex3,ex4,ex5,ex6,ex7,ex8,ex9,ex_total,ia1,ia2,ia3,ia4,ia5,ia6,ia7,ia8,ia9,ia_total,total,result,year,month,rd from student_details_main where rd='reguler' order by year,branch,sem,reg)";
$conn->query($sql);
//backed students
$sql="drop view student_backed;";
$conn->query($sql);
$sql="create view student_backed as (select reg,name,sem,branch,ex1,ex2,ex3,ex4,ex5,ex6,ex7,ex8,ex9,ex_total,ia1,ia2,ia3,ia4,ia5,ia6,ia7,ia8,ia9,ia_total,total,result,year,month,rd from student_details_main where rd='backed' order by year,branch,sem,reg)";
$conn->query($sql);
//detained students
$sql="drop view student_detained;";
$conn->query($sql);
$sql="create view student_detained as (select reg,name,sem,branch,ex1,ex2,ex3,ex4,ex5,ex6,ex7,ex8,ex9,ex_total,ia1,ia2,ia3,ia4,ia5,ia6,ia7,ia8,ia9,ia_total,total,result,year,month,rd from student_details_main where rd='detain order by year,branch,sem,reg')";
if ($conn->query($sql) === TRUE) {
   //echo "view created successfully<br />";
}
else {echo "Error: " . $sql . "<br>" . $conn->error;}

$conn->close(); 
?>
<!------------------------------------------------------------------------------------------->
<!------------------------------------------------------------------------------------------->
<html>