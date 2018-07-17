<?php include('log_details.php');?>
<html>
<head>
<title id="title">view staff wise</title>
<?php include("header.php") ?>
<?php include("sdba/view_staff.php"); ?>
<?php include("styl.php"); ?><br /><br />
<?php
echo "<div id='baa'>";
$year=$_POST['year'];
$branch=$_POST['branch'];
$a=$_POST['semister'];
$contents="";
//view data in subject wise
include("db.php");
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
}
$member="";
$sub="";
$sem="";
$branch0="";
		
		//$a=2;
		if($a==1)
		{
			$sql="select * from staff_details where (year='$year' AND branch='$branch') and ((sem='1' or sem='3') or sem='5') order by id";
		}
		else
		{
			$sql="select * from staff_details where (year='$year' AND branch='$branch') and ((sem='2' or sem='4') or sem='6') order by id";
		}
		
		//$sql="select * from staff_details where year='$year' AND branch='$branch' order by id";
		$res=$conn->query($sql);
		if ($res->num_rows > 0) 
		{
			//start---------------------------------------------------
			
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
$objPHPExcel->getProperties()->setTitle("ANALYSIS OF RESULT –STAFF");
$objPHPExcel->getProperties()->setSubject("RESULT ANAYSIS");
$objPHPExcel->getProperties()->setDescription("IT IS CREATED BY GURUPRASAD BR.");

// Add some data
$objPHPExcel->setActiveSheetIndex(0);
//TOPIC
$objPHPExcel->getActiveSheet()->mergeCells('A1:C1');
$objPHPExcel->getActiveSheet()->SetCellValue('A1', "$clg");
$objPHPExcel->getActiveSheet()->mergeCells('B2:H2');
$objPHPExcel->getActiveSheet()->SetCellValue('B2', 'ANALYSIS OF RESULT –STAFF WISE');
//HEADDING
$objPHPExcel->getActiveSheet()->mergeCells('B4:H4');
$objPHPExcel->getActiveSheet()->SetCellValue('B4', "Semester Examination Held During :$year");
$objPHPExcel->getActiveSheet()->mergeCells('B6:H6');
$objPHPExcel->getActiveSheet()->SetCellValue('B6', "Branch:$branch");
$objPHPExcel->getActiveSheet()->SetCellValue('B8', 'Sr.No');
$objPHPExcel->getActiveSheet()->SetCellValue('C8', 'Name Of The Staff Member');
$objPHPExcel->getActiveSheet()->SetCellValue('D8', 'Name of the Subject Handled');
$objPHPExcel->getActiveSheet()->SetCellValue('E8', 'Sem/Course');
$objPHPExcel->getActiveSheet()->SetCellValue('F8', 'No Of Students Attended');
$objPHPExcel->getActiveSheet()->SetCellValue('G8', 'No of students Passed');
$objPHPExcel->getActiveSheet()->SetCellValue('H8', '% age of Students Passed');

foreach(range('B','H') as $columnID) {
	$objPHPExcel->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
  //  $objPHPExcel->getActiveSheet()->getStyle($columnID."4")->getAlignment()->setWrapText(true);
}
//border 
$BStyle = array(
  'borders' => array(
    'allborders' => array(
      'style' => PHPExcel_Style_Border::BORDER_THIN
    )
  )
);
$objPHPExcel->getActiveSheet()->getStyle('B2:H2')->applyFromArray($BStyle);

//ALIGNMENT
$objPHPExcel->getActiveSheet()->getStyle('B2:H2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);


//set font color
$objPHPExcel->getActiveSheet()->getStyle('B2:H2')->getFont()->getColor()->setRGB('FF0033');
$objPHPExcel->getActiveSheet()->getStyle('B8:H8')->getFont()->getColor()->setRGB('FF0099');

$objPHPExcel->getActiveSheet()->getStyle('A1:C1')->getFont()->getColor()->setRGB('33FF00');//GREEN
$objPHPExcel->getActiveSheet()->getStyle('B4:H6')->getFont()->getColor()->setRGB('6600FF');
//set font size
$objPHPExcel->getActiveSheet()->getStyle("B2:H2")->getFont()->setSize(18);
//set height
$objPHPExcel->getActiveSheet()->getRowDimension('8')->setRowHeight(20);
$objPHPExcel->getActiveSheet()->getRowDimension('2')->setRowHeight(25);
//set font weight
$objPHPExcel->getActiveSheet()->getStyle("B2:H2")->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("B8:H8")->getFont()->setBold(true);


			//-------------------------------------------------------\\
			$sr=0;
			$rows="9";
			while($row = $res->fetch_assoc()) 
			{
				$sr++;
				$order=$row["sub_order"];
				$sub=$row["subject"];
				$member=$row["member"];
				$sem=$row["sem"];
				$branch=$row["branch"];
					if($sem=="1" || $sem=="3" || $sem=="5")
					{
						$month="nov";
					}
					else
					{
						$month="may";
					}	
					//echo "odd    : ";
					$content=display($sem,$month,$order);
					//content-------------------------------------------
				$contents.="<tr>
					<td>$sr</td>
					<td>$member</td>
					<td>$sub</td>
					<td>$sem/$branch</td>";
					//content
$objPHPExcel->getActiveSheet()->SetCellValue("B$rows", "$sr");
$objPHPExcel->getActiveSheet()->SetCellValue("C$rows", "$member");
$objPHPExcel->getActiveSheet()->SetCellValue("D$rows", "$sub");
$objPHPExcel->getActiveSheet()->SetCellValue("E$rows", "$sem/$branch");
$objPHPExcel->getActiveSheet()->SetCellValue("F$rows", $content[0]);
$objPHPExcel->getActiveSheet()->SetCellValue("G$rows", $content[1]);
$objPHPExcel->getActiveSheet()->SetCellValue("H$rows", $content[2]);
$rows++;
					for($i=0;$i<=2;$i++)
					{
							$contents.="<td>$content[$i]</td>";
						
					}
				$contents.="</tr>";
				//content---------------------------------------------\\
			}
			//end------------------------------------------------------
			//end------------------------------------------------------\\
		}
	function display($sem,$months,$sub0)
	{
		global $conn,$member,$sub,$branch,$year;
		$sql="select * from student_details where (year='$year' and branch='$branch') and (month='$months' and (sem='$sem' and rd='reguler'))";
		$res=$conn->query($sql);
		if ($res->num_rows > 0) 
		{
			$pass=0;
			$count=0;
			while($row = $res->fetch_assoc()) 
			{
				$ex_sub_no="ex".$sub0;
				$ia_sub_no="ia".$sub0;
				//echo $row["name"]."<br />";
				if($row["$ex_sub_no"]!=-1)
				{
					$count++;
					if(($row["$ex_sub_no"]+$row["$ia_sub_no"])>=45)
					{
						if($row["$ex_sub_no"]>=35)
						{
							$pass++;
						
						}
					}
			
				}
			}
			$avgpass=($pass*100)/$count;
			$avgpass = sprintf ("%.2f",$avgpass);
			/*
			echo "<br />attended:$count<br />";
			echo "passed:$pass<br />";
			echo "average pass:$avgpass<br /><br /><br />";
			*/
			$content[0]=$count;
			$content[1]=$pass;
			$content[2]=$avgpass."%";
			return($content);
		}
	}
	echo "<br /><center><h2 style='color:green'>Course:$branch</h2></center><br />
		<table border='2' id='ba'>
				<tr id='firstrow'>
						<th>Sl No</th>
						<th>Name Of The Staff Member </th>
						<th>Name of the Subject Handled</th>
						<th>Sem/Course</th>
						<th>No Of Students Attended</th>
						<th>No of students Passed </th>
						<th>%age of Students Passed</th>
				</tr>
						$contents
		</table><br />";
	if(isset($objPHPExcel))
	{
		//echo $rows;
		$objPHPExcel->getActiveSheet()->getStyle('B8:H'.($rows-1))->applyFromArray($BStyle);
		$objPHPExcel->getActiveSheet()->getStyle("B9:H$rows")->getFont()->getColor()->setRGB('6600FF');
		$rows1=$rows+4;
		$rows2=$rows1+5;
		$objPHPExcel->getActiveSheet()->mergeCells("B$rows1:D$rows2");
		$objPHPExcel->getActiveSheet()->SetCellValue("B$rows1", 'Signature of the HOD');
		$objPHPExcel->getActiveSheet()->mergeCells("F$rows1:H$rows2");
		$objPHPExcel->getActiveSheet()->SetCellValue("F$rows1", 'Signature of the Principal');
		$objPHPExcel->getActiveSheet()->getStyle("B$rows1:H$rows2")->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_BOTTOM);
		$objPHPExcel->getActiveSheet()->getStyle("B$rows1:H$rows2")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objPHPExcel->getActiveSheet()->getStyle("B$rows1:H$rows2")->getFont()->setBold(true);
		$objPHPExcel->getDefaultStyle();
		$writer = new PHPExcel_Writer_Excel2007($objPHPExcel);
		$writer->save('sdba/temp/staff.xlsx');	
	}
	
$conn->close();
echo "</div>";
// Save Excel 2007 file
echo "<br /><br /><center><a href='sdba/temp/staff.xlsx'  class='download'>download</a></center>";
?>
<?php include("footer.php") ?>