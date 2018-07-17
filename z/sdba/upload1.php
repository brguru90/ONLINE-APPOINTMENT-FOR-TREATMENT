
<html>
<div onclick="history.go(-1)" style='width:250px;height:60px;background-color:white;text-align:center;position:fixed;left:0px;top:-10px;border:solid silver 2px'>
<h2>return back</h2>
</div>
<?php include("styl.php"); ?>

<div style="width:60%;position:relative;left:20%;top:40px;border:2px solid silver">
<div style="padding:15px 15px 15px 15px;">
	<b>status:</b><div id="per"></div>
</div>
</div>
				
<!------------------------------------------------------------------------------------------->
<!------------------------------------------------------------------------------------------->
<?php
if(!isset($_FILES['fileToUpload']))
{
	header('Location:../upload.php');
}
//------------------------upload file--------------------------------
	$uploaddir = 'temp/';//temprovery folder for upload
	$uploadfile = $uploaddir . basename($_FILES['fileToUpload']['name']);//fullpath(directory+name)
	$format=pathinfo($uploadfile,PATHINFO_EXTENSION);//getting file extension
	$filename=basename( $_FILES["fileToUpload"]["name"]);//just file name
	if($format!="xls" && $format!="xlsx")//matching for format for calling appropriate function to the format upload
	{
		echo "invalid file format";
	}
	else if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $uploadfile))
	{
		// echo basename( $_FILES["fileToUpload"]["name"])." :File is valid, and was successfully uploaded.\n";
		if($format=="csv")
		{
		echo "invalid file format";
		}
		else
		{
		okk($filename);
		}		
	} 
	else
	{
		echo "Possible file upload attack!\n";
	}
//-----------------------uplaoding xls or xlsx--------------------------------------------
$det=array();
function okk($filename)
{
		echo "<br /><br /><br /><br /><style>td,tr{border:solid 2px silver;padding:2px 2px 2px 2px;text-align:left}</style>";
		//to parse XLS files, include php-excel-reader
		require('php-excel-reader/excel_reader2.php');
		require('spreadsheetReader/SpreadsheetReader.php');
		$Reader = new SpreadsheetReader("temp/".$filename);
		
		//print_r($Reader);
		echo "<table>";
		$percentage=0;
		/*
		foreach($val as $key=>$values)
		{
			echo ($key+1).": $values<br />";
		}
		*/
		foreach($Reader as $data)
		{
			//finding invalid row and taking vali count
			 if(preg_match("/[0-9]{3}[a-zA-Z]{2}[0-9]{5}/",$data[0])==1)
			{
				$percentage++;//counting total number of rows
			}
		}
		$cc=0;
		$abc=0;
		foreach($Reader as $data)
		{
				//result no pattern matching
			if(preg_match("/[0-9]{3}[a-zA-Z]{2}[0-9]{5}/",$data[0])==1)
			{
				$c=0;
				echo "<tr id='a$abc'>";
//-----------------------------------------------------------------------------------------------------------------------------------------------------------------

$ab=1;
//input values for DB
$reg=$data[0];
$sem=$data[1];
$dtn=$data[2];
						
	//missing values for row are highlighted by red color
	if($reg=="null" || $reg=="" || $reg==0)
	{
		echo "<style>#a$abc td{color:red;}</style>";
	}
	//if the lenght of parameter exceeded is represented by color red
	$i=0;
	while(isset($data[$i]))
	{
		echo "<td>".$data[$i]  ."</td>"; 	//display the multiple coloumn of single row
		$i++;
	}
	
	ins($reg,$sem,$dtn);//inserting csv details into database
	
	//if(!isset($data[$c+1])){break;}//to ecape error of undefined array index
	$c++;
	$cc++;//current row number inserting
	$per=((100*($cc))/$percentage);//converting current rows status into percentage
	$per=(int)$per;
	//displaying current row status using css
	echo 
	"<script>
	var per='$per%';
	var graph='<div id=\'a\'></div><div id=\'b\'></div>';
	document.getElementById('per').innerHTML='<div id=\'c\'>$per%</div>'+graph;
	function back()
	{
		if(true==confirm('Return back'))
		{
			history.go(-1);
		}
	}
	if($per==100)
	{
		setTimeout('back()',2000);
	}
	</script>
	<style>
		#a
		{
		border-radius: 5px;background: lime;padding: 20px;width: 50%;height: 1pt;position:relative;top:5px;left:5%;z-index:0;
		}
		#b
		{
		border-top-right-radius: 10px;border-bottom-right-radius: 10px;background: aqua;padding: 20px;width: ".(($per*0.5))."%;height: 1pt;position:relative;top:-37px;left:5%;z-index:1;
		}
		#c
		{
		position:relative;top:39px;left:30%;color:red;font-size:30px;z-index:10;
		}
	
	</style>";
	
//-----------------------------------------------------------------------------------------------------------------------------------------------------------------
				echo "</tr>";
				$abc++;
			}
			
		}
		echo "</table>";
unlink("temp/".$filename);//delete temprovery file After reading it
}
//------------------------uploading csv formated spreadsheet(text delimited with comas)-------------------------------------------
function ok($filename)
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
function ins($reg,$sem,$dtn)
{
include("../db.php");
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
}

	$month=$_POST["month"];
	$year=$_POST["year"];
	$branch=$_POST["branch"];
	$sql= "UPDATE student_details SET rd='$dtn' where (reg='$reg' AND sem='$sem') AND (month='$month' AND (year='$year' AND branch='$branch' ));";
	
		if ($conn->query($sql) === TRUE)
		{
			echo "<style>td{color:blue;}</style>";//updating row are colored blue
		} 
		else 
		{
			//echo "Error: " . $sql . "<br>" . $conn->error;
			echo "$reg unsucsses<br />";
		}
//else {echo "Error: " . $sql . "<br>" . $conn->error;}
$conn->close();

}
  
?>
<!------------------------------------------------------------------------------------------->
<!------------------------------------------------------------------------------------------->
<html>