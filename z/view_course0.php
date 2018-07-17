<?php include('log_details.php');?>
<html>
<head>
<title id="title">view course wise</title>
<?php include("header.php") ?>
<?php include("styl.php"); ?><br />
<?php include("sdba/view_course.php"); ?><br />
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
$content="";
//check the data base bsence in given year
$sql="select * from student_details where year='$year';";
$res=$conn->query($sql);
if ($res->num_rows > 0) 
{
$rows=9;
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
$objPHPExcel->getProperties()->setTitle("ANALYSIS OF RESULT –COURSEWISE");
$objPHPExcel->getProperties()->setSubject("RESULT ANAYSIS");
$objPHPExcel->getProperties()->setDescription("IT IS CREATED BY GURUPRASAD BR.");


// Add some data
$objPHPExcel->setActiveSheetIndex(0);
$objPHPExcel->getActiveSheet()->mergeCells('A1:C1');
$objPHPExcel->getActiveSheet()->SetCellValue('A1', "$clg");
/*
$objPHPExcel->getActiveSheet()->mergeCells('I3:M3');
$objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Hello');
*/
//first headding
//$objPHPExcel->setActiveSheetIndex(0)->mergeCells('A1:C1');
$objPHPExcel->getActiveSheet()->mergeCells('G2:I2');
$objPHPExcel->getActiveSheet()->SetCellValue('G2', 'ANALYSIS OF RESULT –COURSEWISE');
//second headding
$objPHPExcel->getActiveSheet()->mergeCells('G2:I2');
$objPHPExcel->getActiveSheet()->SetCellValue('G3', 'SEMESTER EXAMINATION  HELD DURING : '.$year);
//sub information
//line gap
$objPHPExcel->getActiveSheet()->mergeCells('A4:V4');
//1
$objPHPExcel->getActiveSheet()->mergeCells('B5:F5');
$objPHPExcel->getActiveSheet()->SetCellValue('B5', 'NAME OF THE INSTITUTION:-'.$clg);
//2
$objPHPExcel->getActiveSheet()->mergeCells('G5:J5');
$objPHPExcel->getActiveSheet()->SetCellValue('G5', 'NAME OF THE COURSE:-'.$branch);
//3
$objPHPExcel->getActiveSheet()->mergeCells('K5:Q5');
$objPHPExcel->getActiveSheet()->SetCellValue('K5', 'DATE OF INSPECTION:- '.$year);
//line gap
$objPHPExcel->getActiveSheet()->mergeCells('A6:V6');
//row 1
//col 1
$objPHPExcel->getActiveSheet()->mergeCells('B7:C7');

$objPHPExcel->getActiveSheet()->SetCellValue('B7', 'SEMESTER');
//col 2
$objPHPExcel->getActiveSheet()->SetCellValue('D7', 'NO OF STUDENTS APPEARED');
//col 3
$objPHPExcel->getActiveSheet()->SetCellValue('E7', 'No of DISTINCTION');;
//col 4
$objPHPExcel->getActiveSheet()->SetCellValue('F7', 'No of  I  class');;
//col 5
$objPHPExcel->getActiveSheet()->SetCellValue('G7', 'No of II class');;
//col 6
$objPHPExcel->getActiveSheet()->SetCellValue('H7', 'No of Total Pass');;
//col 7
$objPHPExcel->getActiveSheet()->SetCellValue('I7', '% age of pass');;
//col 8
$objPHPExcel->getActiveSheet()->mergeCells('J7:N7');
$objPHPExcel->getActiveSheet()->SetCellValue('J7', 'PASSED EXCEPT IN');;
//col 9
$objPHPExcel->getActiveSheet()->SetCellValue('O7', 'No of students  promoted including total pass');;
//col '.$rows.'
$objPHPExcel->getActiveSheet()->SetCellValue('P7', '%age of promoted Including total pass');;
//col 11
$objPHPExcel->getActiveSheet()->SetCellValue('Q7', 'SMP/Withheld cases');
//row 2
//col 1
$objPHPExcel->getActiveSheet()->SetCellValue('B8', 'ODD SEM');
$objPHPExcel->getActiveSheet()->SetCellValue('C8', 'EVEN SEM');
//col 8
$objPHPExcel->getActiveSheet()->SetCellValue('J8','SUB 1');
$objPHPExcel->getActiveSheet()->SetCellValue('K8','SUB 2');
$objPHPExcel->getActiveSheet()->SetCellValue('L8','SUB 3');
$objPHPExcel->getActiveSheet()->SetCellValue('M8','SUB 4');
$objPHPExcel->getActiveSheet()->SetCellValue('N8','SUB 5');

//merge cells
$objPHPExcel->getActiveSheet()->mergeCells('B15:E16');
$objPHPExcel->getActiveSheet()->mergeCells('F15:H15');
$objPHPExcel->getActiveSheet()->mergeCells('F16:H16');
$objPHPExcel->getActiveSheet()->mergeCells('J15:N16');
$objPHPExcel->getActiveSheet()->mergeCells('Q15:Q16');
$objPHPExcel->getActiveSheet()->mergeCells('B19:E25');
$objPHPExcel->getActiveSheet()->mergeCells('N19:Q25');

$objPHPExcel->getActiveSheet()->SetCellValue('B19','SIGN. OF HOD WITH SEAL');
$objPHPExcel->getActiveSheet()->SetCellValue('N19','SIGN. OF PRINCIPAL WITH SEAL');
//set height
$objPHPExcel->getActiveSheet()->getRowDimension('7')->setRowHeight(40);
//BORDER
//border 
$BStyle = array(
  'borders' => array(
    'allborders' => array(
      'style' => PHPExcel_Style_Border::BORDER_THIN
    )
  )
);
//$objPHPExcel->getActiveSheet()->getStyle('G2:I3')->applyFromArray($BStyle);
$objPHPExcel->getActiveSheet()->getStyle('B5:Q5')->applyFromArray($BStyle);
$objPHPExcel->getActiveSheet()->getStyle('B7:Q16')->applyFromArray($BStyle);
//set alignment
$objPHPExcel->getActiveSheet()->getStyle('B7:Q7')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
$objPHPExcel->getActiveSheet()->getStyle('G2:J3')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);

$objPHPExcel->getActiveSheet()->getStyle('F15:H15')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
$objPHPExcel->getActiveSheet()->getStyle('F16:H16')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
$objPHPExcel->getActiveSheet()->getStyle('F15:H15')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getActiveSheet()->getStyle('F16:H16')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$objPHPExcel->getActiveSheet()->getStyle('B19:E25')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$objPHPExcel->getActiveSheet()->getStyle('O15:O16')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getActiveSheet()->getStyle('B19:E25')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_BOTTOM);

$objPHPExcel->getActiveSheet()->getStyle('N19:Q25')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getActiveSheet()->getStyle('N19:Q25')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_BOTTOM);
//fill background color
//$objPHPExcel->getActiveSheet()->getStyle('G2:I3')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
//$objPHPExcel->getActiveSheet()->getStyle('B5:Q5')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
//$objPHPExcel->getActiveSheet()->getStyle('B7:Q11')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
//set background color
//$objPHPExcel->getActiveSheet()->getStyle('G2:I3')->getFill()->getStartColor()->setARGB('FFFFCC');
//$objPHPExcel->getActiveSheet()->getStyle('B5:Q5')->getFill()->getStartColor()->setARGB('FFCCFF');
//$objPHPExcel->getActiveSheet()->getStyle('B7:Q11')->getFill()->getStartColor()->setARGB('FFFF66');
//set font color
$objPHPExcel->getActiveSheet()->getStyle('G2:J3')->getFont()->getColor()->setRGB('FF0099');
$objPHPExcel->getActiveSheet()->getStyle('B5:Q5')->getFont()->getColor()->setRGB('33FF00');
$objPHPExcel->getActiveSheet()->getStyle('B7:Q7')->getFont()->getColor()->setRGB('FF0000');
$objPHPExcel->getActiveSheet()->getStyle('B8:Q9')->getFont()->getColor()->setRGB('FF3300');
$objPHPExcel->getActiveSheet()->getStyle('B9:Q16')->getFont()->getColor()->setRGB('0000CC');
$objPHPExcel->getActiveSheet()->getStyle('A1:C1')->getFont()->getColor()->setRGB('33FF00');//GREEN
//set font size
$objPHPExcel->getActiveSheet()->getStyle("G2:I2")->getFont()->setSize(14);
//wrap text(text adjustment)
foreach(range('B','Q') as $columnID) {
    $objPHPExcel->getActiveSheet()->getStyle($columnID."7")->getAlignment()->setWrapText(true);
}
//set font weight
$objPHPExcel->getActiveSheet()->getStyle("B7:Q7")->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("B5:Q5")->getFont()->setBold(true);
//set height
$objPHPExcel->getActiveSheet()->getColumnDimension("A")->setWidth('2');
$objPHPExcel->getActiveSheet()->getColumnDimension("B")->setWidth('9');
$objPHPExcel->getActiveSheet()->getColumnDimension("C")->setWidth('9');
$objPHPExcel->getActiveSheet()->getColumnDimension("D")->setWidth('17');
$objPHPExcel->getActiveSheet()->getColumnDimension("E")->setWidth('17');
$objPHPExcel->getActiveSheet()->getColumnDimension("F")->setWidth('17');
$objPHPExcel->getActiveSheet()->getColumnDimension("G")->setWidth('16');
$objPHPExcel->getActiveSheet()->getColumnDimension("H")->setWidth('16');
$objPHPExcel->getActiveSheet()->getColumnDimension("I")->setWidth('16');
$objPHPExcel->getActiveSheet()->getColumnDimension("J")->setWidth('6');
$objPHPExcel->getActiveSheet()->getColumnDimension("K")->setWidth('6');
$objPHPExcel->getActiveSheet()->getColumnDimension("L")->setWidth('6');
$objPHPExcel->getActiveSheet()->getColumnDimension("M")->setWidth('6');
$objPHPExcel->getActiveSheet()->getColumnDimension("N")->setWidth('6');
$objPHPExcel->getActiveSheet()->getColumnDimension("O")->setWidth('21');
$objPHPExcel->getActiveSheet()->getColumnDimension("P")->setWidth('18');
$objPHPExcel->getActiveSheet()->getColumnDimension("Q")->setWidth('10');

			//------------------------------------------------------
	$total1=0;$avg1=0;$total2=0;$avg2=0;
	function semister($semm,$month,$content)
	{
		global $branch,$year,$conn,$objPHPExcel,$rows;
	$sql="select * from student_details where (sem='$semm' and branch='$branch') and (year='$year' and (month='$month' and rd='REGULER'));";
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
			$avgpromote=sprintf ("%.2f",$avgpromote);
			$avgpass=($pass*100)/$count;
			$avgpass=sprintf ("%.2f",$avgpass);
			/*echo "sem:".$sem." :$mon<br />count:$count<br />Distinction:$dist<br />first class:$first<br />second:$second<br />pass:$pass<br />average of pass:$avgpass<br />
			failed in,<br />sub1:$sub1 | sub2:$sub2 | sub3:$sub3 | sub4:$sub4 | TOTAL:".($sub1+$sub2+$sub3+$sub4)."<br />promoted:$promote<br />average of promoted:$avgpromote
			<br /><br />";*/
			if($sem%2==0)
			{
				$s1="";
				$s2=$sem."sem";
			}
			else
			{
				$s1=$sem."sem";
				$s2="";
			}
			$content.="
			<tr>
				<td>$s1</td>
				<td> $s2</td>
				<td>$count</td>
				<td>$dist</td>
				<td>$first</td>
				<td>$second</td>
				<td>$pass</td>
				<td>$avgpass%</td>
				<td>$sub1</td>
				<td>$sub2</td>
				<td>$sub3</td>
				<td>$sub4</td>
				<td>".($sub1+$sub2+$sub3+$sub4)."</td>
				<td>$promote</td>
				<td>$avgpromote%</td>
				<td></td>
			</tr>
			";
			//rows
			
			$objPHPExcel->getActiveSheet()->SetCellValue('B'.$rows.'', "$s1");
			$objPHPExcel->getActiveSheet()->SetCellValue('C'.$rows.'', "$s2");
			$objPHPExcel->getActiveSheet()->SetCellValue('D'.$rows.'', "$count");
			$objPHPExcel->getActiveSheet()->SetCellValue('E'.$rows.'', "$dist");
			$objPHPExcel->getActiveSheet()->SetCellValue('F'.$rows.'', "$first");
			$objPHPExcel->getActiveSheet()->SetCellValue('G'.$rows.'', "$second");
			$objPHPExcel->getActiveSheet()->SetCellValue('H'.$rows.'', "$pass");
			$objPHPExcel->getActiveSheet()->SetCellValue('I'.$rows.'', "$avgpass%");
			$objPHPExcel->getActiveSheet()->SetCellValue('J'.$rows.'', "$sub1");
			$objPHPExcel->getActiveSheet()->SetCellValue('K'.$rows.'', "$sub2");
			$objPHPExcel->getActiveSheet()->SetCellValue('L'.$rows.'', "$sub3");
			$objPHPExcel->getActiveSheet()->SetCellValue('M'.$rows.'', "$sub4");
			$objPHPExcel->getActiveSheet()->SetCellValue('N'.$rows.'', "".($sub1+$sub2+$sub3+$sub4)."");
			$objPHPExcel->getActiveSheet()->SetCellValue('O'.$rows.'', "$promote");
			$objPHPExcel->getActiveSheet()->SetCellValue('P'.$rows.'', "$avgpromote%");
			$objPHPExcel->getActiveSheet()->SetCellValue('Q'.$rows.'', "");
			
			$rows++;
			
		}
		return $content;
	}

	for($i=1;$i<=5;$i+=2)
	{
		$month="nov";
	//echo "odd    : ";
		$content=semister($i,$month,$content);
	}
	//echo "<br /><br />";
	for($i=2;$i<=6;$i+=2)
	{
		$month="may";
	//echo "even:";
		$content=semister($i,$month,$content);
	}
//-----------------------------------------------------------word-doc-------------------------------------------------------------------
$words= "
		<style>
			table{width:90%;}	
			#ha,#hb{font-size:20px;color:red}
			#bl,#bc,#br{color:purple}
			#bl{position:relative;left:5%;top:0px}
			#bc{position:relative;left:20%;top:0px}
			#br{position:relative;left:40%;top:0px}
			@media only screen and (max-width: 1150px)
			{
				#br{position:relative;left:30%;top:0px}
			}
			@media only screen and (max-width: 1000px)
			{
				#bl{position:relative;left:10%;top:0px}
				#bc{position:relative;left:28%;top:0px}
				#br{position:relative;left:50%;top:0px}
			}
			@media only screen and (max-width: 700px)
			{
				#bl{position:relative;left:5%;top:0px}
				#bc{position:relative;left:20%;top:0px}
				#br{position:relative;left:40%;top:0px}
			}
		</style>
		
			<div id='baa'>
				<center>
					<h1 id='ha'>ANALYSIS OF RESULT -COURSEWISE</h1>
					<h2  style='color:green' id='hb'>SEMESTER EXAMINATION  HELD DURING <u>$year</u></h2>
				</center><br />
					<b id='bl'>NAME OF THE INSTITUTION:GPT SORAB</b>
					<b id='bc'>NAME OF THE COURSE:-$branch</b>
					<b id='br'>DATE OF INSPECTION: <u>$year</u></b>
					<br /><br />
					<table id='ba'>
						<tr>
							<th colspan='2'>SEMESTER</th>
							<th>NO OF STUDENTS APPEARED</th>
							<th>No of DISTINCTION </th>
							<th>No of  I  class</th>
							<th>No of II class</th>
							<th>No of Total Pass</th>
							<th>% age of pass</th>
							<th colspan='5'>PASSED EXCEPT IN</th>
							<th>No of students  promoted including total pass</th>
							<th>%age of promoted Including total pass</th>
							<th>SMP/ With held cases</th>
						</tr>
						<tr>
							<td id='h'>ODD SEM</td>
							<td id='h'>EVEN SEM</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td id='h'>1 Sub</td>
							<td id='h'>2 Sub</td>
							<td id='h'>3 Sub</td>
							<td id='h'>4 Sub</td>
							<td id='h'>TOTAL</td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						$content
					</table>
			<br /><br />
			</div>
			
";
echo "$words";
$objPHPExcel->getActiveSheet()->SetCellValue('F15', 'Total %');
$objPHPExcel->getActiveSheet()->SetCellValue('F16', 'Avg %');

$objPHPExcel->getActiveSheet()->SetCellValue('O15', 'Total %');
$objPHPExcel->getActiveSheet()->SetCellValue('O16', 'Avg %');
// Save Excel 2007 file
$objPHPExcel->getDefaultStyle();
$writer = new PHPExcel_Writer_Excel2007($objPHPExcel);
$writer->save('sdba/temp/course.xlsx');
echo "<br /><br /><center><a href='sdba/temp/course.xlsx'  id='download' class='download'>download</a></center>";

			$file = fopen('sdba/temp/word.doc', 'w');
			fwrite($file, $words);
			fclose($file);
/*
echo "<br /><br /><center><a href='word.doc'  id='download' class='download'>download</a></center>";
*/
//---------------------------------------------------------------word-the-end-----------------------------------------------------------------------
}
	else
{
	echo "<pre>no database found in $year year</pre>";
}
$conn->close();
//echo "<script>window.location.assign('http:\\sheet.xlsx')</script>";
?>
<?php include("footer.php") ?>