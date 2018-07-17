<?php
$ab=1;
/*
echo sizeof($data);
echo count($data);
*/
	while(isset($data[$ab]) && $ab<=25)
	{
		
		if($data[$ab]=="AB ")
		{
			$data[$ab]=-1;//absent student represened as -1
			//echo "guruprasad<br />";
		}
		if($data[$ab]=="")
		{
			$data[$ab]=0;//converting empty string to integer zero
		}
		//echo $data[$ab]."guru$ab ,";
		$ab++;
	}
//input values for DB
$reg=$data[1];
$name=$data[2];
$sem=$data[3];
$branch=substr("$reg",3,2);//getting 2 character appears ofter 3 character from begining(optional)
//$img=basename( $_FILES["fileToUpload"]["name"]);//uploading image name(optional)
if(preg_match("/ck/i",$branch))
{$branch="cp";}
if(preg_match("/ce/i",$branch))
{$branch="civil";}
$img="no img";
$ex1=$data[4];	
$ex2=$data[5];	
$ex3=$data[6];	
$ex4=$data[7];	
$ex5=$data[8];	
$ex6=$data[9];	
$ex7=$data[10];	
$ex8=$data[11];	
$ex9=$data[12];
$ex_total=$data[13];
$ia1=$data[14];
$ia2=$data[15];
$ia3=$data[16];
$ia4=$data[17];
$ia5=$data[18];
$ia6=$data[19];
$ia7=$data[20];
$ia8=$data[21];
$ia9=$data[22];
$ia_total=$data[23];
$total=$data[24];
$result=$data[25];
$month=$_POST["month"];
$data[27]=$year=$_POST["year"];
$part=substr($reg,5,2);
$dtn="REGULER";
			//determing either the result of student for the reguler subject or not
			if($month=="may")
			{
				if($part==$val[1] && $sem!=2)
				{
					$dtn="BACKED";
				}
				if($part==$val[3] && $sem!=4)
				{
					//echo "$name,$sem,".substr($reg,5,2)." : $val[2],$month<br />";
					$dtn="BACKED";
				}
				if($part==$val[5] && $sem!=6)
				{
					$dtn="BACKED";
				}
			}
			else
			{
				if($part==$val[0] && $sem!=1)
				{
					$dtn="BACKED";
				}
				if($part==$val[2] && $sem!=3)
				{
					$dtn="BACKED";
				}
				if($part==$val[4] && $sem!=5)
				{
					//echo "$name,$sem,".substr($reg,5,2)." : $val[2],$month<br />";
					$dtn="BACKED";
				}
			}
			
			if($part==$val[1] || $part==$val[3] || $part==$val[5] || $part==$val[0] || $part==$val[2] || $part==$val[4])
				{}else{$dtn="detain";}
			
	//missing values for row are highlighted by red color
	if($reg=="null" || $reg=="" || $reg==0)
	{
		//echo "<b style='color:violet'>$name :this document can not inserted,pls mention register no</b><br />";
		echo "<style>#a$abc td{color:red;}</style>";
	}
	//if the lenght of parameter exceeded is represented by color red
	if(strlen($reg)>10 || strlen($name)>50 || strlen($sem)>6 || strlen($branch)>50 ||strlen($year)!=4)
	{
		echo "<b style='color:red'>length of parameter are greater for $reg</b><br />";
		continue;//skip this row only
	}
	/*
	foreach($data as $value)
	{  
		if(!isset($data[$c+1])){break;}
		echo "<td>$value  </td>";//display
	}
	*/
	$i=0;
	while(isset($data[$i]))
	{
		echo "<td>".$data[$i]  ."</td>"; 	//display the multiple coloumn of single row
		$i++;
	}
	
	ins($reg,$name,$sem,$branch,$img,$ex1,$ex2,$ex3,$ex4,$ex5,$ex6,$ex7,$ex8,$ex9,$ex_total,$ia1,$ia2,$ia3,$ia4,$ia5,$ia6,$ia7,$ia8,$ia9,$ia_total,$total,$result,$year,$abc,$month,$dtn);//inserting csv details into database
	
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
	

  ?>