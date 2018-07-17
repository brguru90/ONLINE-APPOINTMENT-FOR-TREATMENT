<?php include('log_details.php');?>
<html>
<head>
<title id="title">view subject wise</title>
<?php include("header.php") ?>
<?php include("styl.php"); ?><br />
<?php include("sdba/view_sub.php"); ?><br />
<?php
$year=$_POST['year'];
$branch=$_POST['branch'];
$subject_name=array();
//view data in subject wise
include("db.php");
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
}
//check the data base presence in given year
$sql="select * from student_details where year='$year';";
$res=$conn->query($sql);
if ($res->num_rows > 0) 
{
	
	
	
//-----------------------------------------------------------excel-spreadsheet-xls-------------------------------------------------------------------

/** Set default timezone (will throw a notice otherwise) */
date_default_timezone_set('America/Los_Angeles');

/** PHPExcel */
include 'Classes/PHPExcel.php';

/** PHPExcel_Writer_Excel2007 */
include 'Classes/PHPExcel/Writer/Excel2007.php';

// Create new PHPExcel object
$objPHPExcel = new PHPExcel();

// Set properties
$objPHPExcel->getProperties()->setCreator("guruinfo.6te.net");
$objPHPExcel->getProperties()->setLastModifiedBy("guruinfo.6te.net");
$objPHPExcel->getProperties()->setTitle("ANALYSIS OF RESULT –SUBJECTWISE");
$objPHPExcel->getProperties()->setSubject("RESULT ANAYSIS");
$objPHPExcel->getProperties()->setDescription("IT IS CREATED BY GURUPRASAD BR.");

// Add some data
$objPHPExcel->setActiveSheetIndex(0);
$objPHPExcel->getActiveSheet()->mergeCells('A1:C1');
$objPHPExcel->getActiveSheet()->SetCellValue('A1', "NAME OF INSTITUTION: $clg");
$objPHPExcel->getActiveSheet()->mergeCells('B2:G2');
$objPHPExcel->getActiveSheet()->SetCellValue('B2', 'RESULT ANALYSIS SUBJECTWISE');
$objPHPExcel->getActiveSheet()->mergeCells('B4:G4');
$objPHPExcel->getActiveSheet()->SetCellValue('B4', 'Semester Examination  Held During: may / nov - '.$year);
$objPHPExcel->getActiveSheet()->mergeCells('B6:G6');
$objPHPExcel->getActiveSheet()->SetCellValue('B6', 'course: '.$branch);
$objPHPExcel->getActiveSheet()->SetCellValue('B8', 'SR NO ');
$objPHPExcel->getActiveSheet()->SetCellValue('C8', 'Name of the subject');
$objPHPExcel->getActiveSheet()->SetCellValue('D8', 'Name of the staff Handled Sri/Smt');
$objPHPExcel->getActiveSheet()->SetCellValue('E8', 'No of students attended ');
$objPHPExcel->getActiveSheet()->SetCellValue('F8', 'No of students passed');
$objPHPExcel->getActiveSheet()->SetCellValue('G8', '%age of students Passed');
$objPHPExcel->getActiveSheet()->SetCellValue('B35', 'Signature of HOD');
$objPHPExcel->getActiveSheet()->SetCellValue('F35', 'Signature of the principal');
//merge cell
//$objPHPExcel->getActiveSheet()->mergeCells('B39:C43');
//$objPHPExcel->getActiveSheet()->mergeCells('F39:G43');
//border 
$BStyle = array(
  'borders' => array(
    'allborders' => array(
      'style' => PHPExcel_Style_Border::BORDER_THIN
    )
  )
);
$objPHPExcel->getActiveSheet()->getStyle('B2:G2')->applyFromArray($BStyle);
//$objPHPExcel->getActiveSheet()->getStyle('B8:G38')->applyFromArray($BStyle);
//set boreder
//$objPHPExcel->getActiveSheet()->getStyle('A4:H27')->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
//set alignment
$objPHPExcel->getActiveSheet()->getStyle('B8:G8')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
$objPHPExcel->getActiveSheet()->getStyle('B2:G2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getActiveSheet()->getStyle('B9:B32')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$objPHPExcel->getActiveSheet()->getStyle('B35:C39')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_BOTTOM);
//$objPHPExcel->getActiveSheet()->getStyle('B39:C43')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$objPHPExcel->getActiveSheet()->getStyle('F35:G39')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_BOTTOM);
//$objPHPExcel->getActiveSheet()->getStyle('F39:G43')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
//fill color
//$objPHPExcel->getActiveSheet()->getStyle('B4:G4')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
//$objPHPExcel->getActiveSheet()->getStyle('B2:G2')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
//$objPHPExcel->getActiveSheet()->getStyle('B5:G27')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
//set color
//$objPHPExcel->getActiveSheet()->getStyle('B2:G2')->getFill()->getStartColor()->setARGB('FF0099');
//$objPHPExcel->getActiveSheet()->getStyle('B4:G4')->getFill()->getStartColor()->setARGB('FF66FF');
//$objPHPExcel->getActiveSheet()->getStyle('B5:G27')->getFill()->getStartColor()->setARGB('FFFF99');
//FONT COLOR
$objPHPExcel->getActiveSheet()->getStyle('B2:G2')->getFont()->getColor()->setRGB('FF0099');//VIOLET
$objPHPExcel->getActiveSheet()->getStyle('A1:C1')->getFont()->getColor()->setRGB('33FF00');//GREEN
$objPHPExcel->getActiveSheet()->getStyle('B8:G8')->getFont()->getColor()->setRGB('FF0000');//ORANGE
$objPHPExcel->getActiveSheet()->getStyle('B4:G6')->getFont()->getColor()->setRGB('FF3300');
$objPHPExcel->getActiveSheet()->getStyle('B9:G38')->getFont()->getColor()->setRGB('0000CC');//BLUE
//set font size
$objPHPExcel->getActiveSheet()->getStyle("B2")->getFont()->setSize(18);
$objPHPExcel->getActiveSheet()->getStyle("C2:F2")->getFont()->setSize(20);
//set height
$objPHPExcel->getActiveSheet()->getRowDimension('8')->setRowHeight(40);
//set font weight
$objPHPExcel->getActiveSheet()->getStyle("B2")->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("b8:g8")->getFont()->setBold(true);

//$objPHPExcel->getActiveSheet()->getStyle("B35:C39")->getFont()->setBold(true);
//$objPHPExcel->getActiveSheet()->getStyle("F35:G39")->getFont()->setBold(true);
//set width
$objPHPExcel->getActiveSheet()->getColumnDimension("c")->setWidth('60');
$objPHPExcel->getActiveSheet()->getColumnDimension("d")->setWidth('30');
$objPHPExcel->getActiveSheet()->getColumnDimension("e")->setWidth('25');
$objPHPExcel->getActiveSheet()->getColumnDimension("f")->setWidth('25');
$objPHPExcel->getActiveSheet()->getColumnDimension("g")->setWidth('25');
	echo "<div id='baa'><table id='ba' >";
	echo
	"<tr id='firstrow'>
	<th>Sr. no</th><th>Name of the subject </th><th>Name of the staff Handled Sri/Smt</th><th>No of students attended </th><th>No of students passed</th><th>%age of students Passed</th>
	</tr>
	";


//get the subjects member
$sql="select * from staff_details where branch='$branch' and year=$year order by year,branch,sem,sub_order;";
$res=$conn->query($sql);
if ($res->num_rows > 0) 
{
	while($row = $res->fetch_assoc()) 
	{
		//echo $row["subject"].":".$row["sem"]."<br />";
		$sem=$row["sem"];
		$sub_order=$row["sub_order"];
		$subject_name["$sem"]["$sub_order"]=$row["member"];
	}
}
//print_r($subject_name);

function calculate($sem,$branch,$year,$month)
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

//get the subjects name
$sql="select * from subjects where (sem='$sem' and branch='$branch') and year=$year;";
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
else
{
		for($i=1;$i<=7;$i++)
		{
			$lect1[$i]="subject$i";//dummy subject name wit incriment
		}
}
//echo "$branch:year-$year;sem-$sem:month-$month:";
//$sql="select * from student_details where (sem='$sem' and branch='$branch') and (year='$year' and (month='$month' and rd='REGULER'));";
$sql="select * from student_details where sem='$sem'  and ((branch='$branch' and year='$year') and (month='$month' and rd='reguler'));";
$res=$conn->query($sql);
if ($res->num_rows > 0) 
{
	$set++;

	while($row = $res->fetch_assoc()) 
	{
		//echo "$branch:year-$year;sem-$sem:month-$month:".($row["ex1"]+$row["ia1"])."<br />";
		//echo $row["ex1"];
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
else
{
	//echo "Error: " . $sql . "<br>" . $conn->error;
}
//echo "zzzzzzzzzzz".$set;
//print_r($lect1);
$data[0]=$sem;
$data[1]=$lect1;
$data[2]=$sub;
$data[3]=$passed;
$data[4]=$set;
/*
foreach($data as $values)
{
	print_r($values);
	echo "<br />";
}
*/
return $data;
}




$rows=9;
$col=array();
function display($data,$data2,$sem)
{
$lect2=$data[1];
$sub2=$data[2];
$passed2=$data[3];
$set2=$data[4];

$lect1=$data2[1];
$sub1=$data2[2];
$passed1=$data2[3];
$set1=$data2[4];

	global $objPHPExcel,$rows,$subject_name;
	switch($sem)
	{
			case 2:$sr="A";
				break;
			case 4:$sr="B";
				break;
			case 6:$sr="C";
				break;
	}
	echo "<tr><th>$sr</th><th colspan='5'>".($sem-1)."/$sem SEM</th></tr>";
	$objPHPExcel->getActiveSheet()->SetCellValue('B'.$rows, "A");
	$objPHPExcel->getActiveSheet()->SetCellValue('C'.$rows, ($sem-1)."/$sem SEM");
	$col=$rows;
	//$objPHPExcel->getActiveSheet()->getStyle("B$rows:C$rows")->getFont()->getColor()->setRGB('FF0099');//VIOLET
	$rows++;
	//if($set2>=1)
	if(($sem%2)==0)
	{
		$srl=1;
	for($i=1;$i<=7;$i++)
	{
			if($sub2[$i]!=0)
			{
				$percentage2 = sprintf ("%.2f",($passed2[$i]*100)/$sub2[$i]);
			}
			else{$percentage2=0.0;}
			if($sub1[$i]!=0)
			{
				$percentage1 = sprintf ("%.2f",($passed1[$i]*100)/$sub1[$i]);
			}
			else{$percentage1=0.0;}
		//$percentage2 = sprintf ("%.2f",($passed2[$i]*100)/$sub2[$i]);
		//$percentage1 = sprintf ("%.2f",($passed1[$i]*100)/$sub1[$i]);
		$avgsub=($sub1[$i]+$sub2[$i]);
		$avgpassed=($passed1[$i]+$passed2[$i]);
		$avgpercentage=($percentage1+$percentage2)/2;
		$avgpercentage = sprintf ("%.2f",$avgpercentage);
		//print_r($subject_name);
		if(isset($subject_name[($sem-1)]["$i"]))
		{
			$lect_name1=$subject_name[($sem-1)]["$i"];
		}
		else
		{
			$lect_name1='';
		}
		if(isset($subject_name["$sem"]["$i"]))
		{
			$lect_name2=$subject_name["$sem"]["$i"];
		}
		else
		{
			$lect_name1='';
		}
		
		$excp=0;
		if($sem==4 && $i==7)
		{
			$excp=1;
		}

		if($sem==5 && $i==7)
		{
			$excp=2;
		}
		if($sem==6 && $srl>11)
		{
			$excp=4;
		}
		echo "$sem:$srl-$excp<br />";
		if($excp!=1 && $excp!=2 && $excp!=4)
		{
		echo
		"<tr>
			<td>$srl</td><td> $lect1[$i]</td><td>$lect_name1</td><td>$sub1[$i]</td><td>$passed1[$i]</td><td>$percentage1</td>
		</tr>";
		//$objPHPExcel->getActiveSheet()->mergeCells('C2:F2');a4-f4
		$objPHPExcel->getActiveSheet()->SetCellValue('B'.$rows, "$srl");
		$objPHPExcel->getActiveSheet()->SetCellValue('C'.$rows, " $lect1[$i]");
		$objPHPExcel->getActiveSheet()->SetCellValue('D'.$rows, "$lect_name1");
		$objPHPExcel->getActiveSheet()->SetCellValue('E'.$rows, "$$sub1[$i]");
		$objPHPExcel->getActiveSheet()->SetCellValue('F'.$rows, "$passed1[$i]");
		$objPHPExcel->getActiveSheet()->SetCellValue('G'.$rows, "$percentage1%");
		$rows++;
		$srl++;
		echo
		"<tr>
			<td>$srl</td><td> $lect2[$i]</td><td>$lect_name2</td><td>$sub2[$i]<td>$passed2[$i]</td><td>$percentage2</td>
		</tr>";
		//********************************************************
		$objPHPExcel->getActiveSheet()->SetCellValue('B'.$rows, "$srl");
		$objPHPExcel->getActiveSheet()->SetCellValue('C'.$rows, "$lect2[$i]");
		$objPHPExcel->getActiveSheet()->SetCellValue('D'.$rows, "$lect_name2");
		$objPHPExcel->getActiveSheet()->SetCellValue('E'.$rows, "$$sub2[$i]");
		$objPHPExcel->getActiveSheet()->SetCellValue('F'.$rows, "$passed2[$i]");
		$objPHPExcel->getActiveSheet()->SetCellValue('G'.$rows, "$percentage2%");
		$rows++;
		$srl++;
		}
	
		switch($excp)
		{
			case 1:
					echo
				"<tr>
					<td>$srl</td><td> $lect2[$i]</td><td>$lect_name2</td><td>$sub2[$i]</td><td>$passed2[$i]</td><td>$percentage2</td>
				</tr>";
				//$objPHPExcel->getActiveSheet()->mergeCells('C2:F2');a4-f4
				$objPHPExcel->getActiveSheet()->SetCellValue('B'.$rows, "$srl");
				$objPHPExcel->getActiveSheet()->SetCellValue('C'.$rows, "$lect2[$i]");
				$objPHPExcel->getActiveSheet()->SetCellValue('D'.$rows, "$lect_name2");
				$objPHPExcel->getActiveSheet()->SetCellValue('E'.$rows, "$$sub2[$i]");
				$objPHPExcel->getActiveSheet()->SetCellValue('F'.$rows, "$passed2[$i]");
				$objPHPExcel->getActiveSheet()->SetCellValue('G'.$rows, "$percentage2%");
				$rows++;
				$srl++;
				break;
				
			case 2:
			
				echo
				"<tr>2
					<td>$srl</td><td> $lect2[$i]</td><td>$lect_name2</td><td>$sub2[$i]<td>$passed2[$i]</td><td>$percentage2</td>
				</tr>";
				//********************************************************
				$objPHPExcel->getActiveSheet()->SetCellValue('B'.$rows, "$srl");
				$objPHPExcel->getActiveSheet()->SetCellValue('C'.$rows, "$lect2[$i]");
				$objPHPExcel->getActiveSheet()->SetCellValue('D'.$rows, "$lect_name2");
				$objPHPExcel->getActiveSheet()->SetCellValue('E'.$rows, "$$sub2[$i]");
				$objPHPExcel->getActiveSheet()->SetCellValue('F'.$rows, "$passed2[$i]");
				$objPHPExcel->getActiveSheet()->SetCellValue('G'.$rows, "$percentage2%");
				$rows++;
				$srl++;
				break;				
		}
	}
	}
	return $col;
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
		$data[$i]=calculate($i,$branch,$year,$month);	
		if($i%2==0)
		{
			$data2=$data[($i-1)];
			$col[]=display($data[$i],$data2,$i);
		}
	}
	//print_r($data);

echo "</table></div>";

$nn=$rows+4;
$mm=$nn+4;

//border 
$BStyle = array(
  'borders' => array(
    'allborders' => array(
      'style' => PHPExcel_Style_Border::BORDER_THIN
    )
  )
);
$objPHPExcel->getActiveSheet()->getStyle("B8:G".($rows-1))->applyFromArray($BStyle);
$objPHPExcel->getActiveSheet()->getStyle('B9:G38'.($rows-1))->getFont()->getColor()->setRGB('0000CC');//BLUE
foreach($col as $cols)
{
	echo $cols;
	$objPHPExcel->getActiveSheet()->getStyle("B$cols:C$cols")->getFont()->getColor()->setRGB('FF0099');//VIOLET
}
$objPHPExcel->getActiveSheet()->getStyle("B$nn:C$mm")->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("F$nn:G$mm")->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('B9:B'.($rows-1))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$objPHPExcel->getActiveSheet()->mergeCells("B$nn:C$mm");
$objPHPExcel->getActiveSheet()->mergeCells("F$nn:G$mm");

$objPHPExcel->getActiveSheet()->getStyle("B$nn:C$mm")->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_BOTTOM);
$objPHPExcel->getActiveSheet()->getStyle("B$nn:C$mm")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$objPHPExcel->getActiveSheet()->getStyle("F$nn:G$mm")->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_BOTTOM);
$objPHPExcel->getActiveSheet()->getStyle("F$nn:G$mm")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);


$objPHPExcel->getDefaultStyle();
$writer = new PHPExcel_Writer_Excel2007($objPHPExcel);
$writer->save('sdba/temp/sub.xlsx');
}
else
{
	echo "<pre>no database found in $year year</pre>";
}
$conn->close();
// Save Excel 2007 file
echo "<br /><br /><center><a href='sdba/temp/sub.xlsx'  class='download'>download</a></center>";
?>
<?php include("footer.php") ?>