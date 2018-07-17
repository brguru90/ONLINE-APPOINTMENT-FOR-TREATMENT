<?php include('log_details.php');?>
<!DOCTYPE html>
<html>
<head>
<title id="title">update</title>
<?php include("header.php") ?>
			<!-----------------------------------------------------//navigation----------------------------------------------------------------->
<?php include("styl.php"); ?><br />
<div id="kk" style="background: linear-gradient(to bottom right,violet 15%,pink 30%,bisque 45%,skyblue 55%,aqua 65%,lightgreen 80%,lime 90% );width:100%;">
<div id="jj">
<?php
include("db.php");

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
}

$reg=$_GET["reg"];
$sql="select * from student_details_main where reg='$reg'";
$results=$conn->query($sql);
if ($results->num_rows == 0) 
{
	echo "<script>alert('record for $reg register number is not present');history.go(-1);</script>";
}
else
{
	echo "<b id='upp'>Update details:</b><br /><br />";
	while($row = $results->fetch_assoc()) 
			{
$reg=$row["reg"];
$name=$row["name"];
$branch=$row["branch"];
$sem=$row["sem"];
$ex1=$row["ex1"];
$ex2=$row["ex2"];
$ex3=$row["ex3"];
$ex4=$row["ex4"];
$ex5=$row["ex5"];
$ex6=$row["ex6"];
$ex7=$row["ex7"];
$ex8=$row["ex8"];
$ex9=$row["ex9"];
$ex_total=$ex1+$ex2+$ex3+$ex4+$ex5+$ex6+$ex7+$ex8+$ex9;
$ia1=$row["ia1"];
$ia2=$row["ia2"];
$ia3=$row["ia3"];
$ia4=$row["ia4"];
$ia5=$row["ia5"];
$ia6=$row["ia6"];
$ia7=$row["ia7"];
$ia8=$row["ia8"];
$ia9=$row["ia9"];
$ia_total=$ia1+$ia2+$ia3+$ia4+$ia5+$ia6+$ia7+$ia8+$ia9;
$total=$ex_total+$ia_total;
$result=$row["result"];
$year=$row["year"];
$month=$row["month"];
$reguler=$row["rd"];
	echo "
	<style>
	.myform2 table{background:transparent;border:solid white 1px;}
	#updt{color:white;}
	.mytb2 th,.mytb2 td{color:blue;}
	.mytb2 td{padding:10px 10px 10px 10px}
	.mytb2 th{padding:10px 10px 10px 10px}
	#upp{color:white;background-color:purple;font-size:18px;padding:5px 10px 5px 10px;}
	</style>
	<form action='update.php' method='post'  class='myform2' >
<table class='mytb2'>
<tr>
	<th>entered reg no</th>
	<td><input type='text' required='required' value='$reg' onfocus='this.blur()' name='reg' id='myip2' /></td>

	<th>enter name</th>
	<td><input type='text' required='required' value='$name' name='name' id='myip2' /></td>
</tr>
<tr>
	<th><b>choose branch</b></th>
	<td><select name='branch' id='myip2' >
";
$br=array('cs','civil','ec','cp');
foreach($br as $ii)
	{
		if($ii==$branch)
		{
			echo "<option value='$ii' selected='selected'>".$ii."</option>";
			
		}
		else
		{
			echo "<option>".$ii."</option>";
		}
			
	}	

echo "
		</select>
	</td>

	<th><b>choose sem</b></th>
	<td><select name='sem' id='myip2' >
";
for($ii=1;$ii<=6;$ii++)
	{
		if($ii==$sem)
		{
			echo "<option value='$ii' selected='selected'>".$ii."</option>";
			
		}
		else
		{
			echo "<option>".$ii."</option>";
		}
			
	}	

echo "
		</select>
	</td>
</tr>
<!------------------------->
<tr>
	<th>enter marks of subject 1</th>
	<td><input type='text' required='required' value='$ex1' name='ex1' id='myip2'   maxlength='3' onfocus='select()' /></td>
	<th>enter marks of internal 1</th>
	<td><input type='text' required='required' value='$ia1' name='ia1' id='myip2'   maxlength='2' onfocus='select()' /></td>
</tr>
<tr>
	<th>enter marks of subject 2</th>
	<td><input type='text' required='required' value='$ex2' name='ex2' id='myip2'   maxlength='3' onfocus='select()' /></td>
	<th>enter marks of internal 2</th>
	<td><input type='text' required='required' value='$ia2' name='ia2' id='myip2'   maxlength='2' onfocus='select()' /></td>
</tr>
<tr>
	<th>enter marks of subject 3</th>
	<td><input type='text' required='required' value='$ex3' name='ex3' id='myip2'   maxlength='3' onfocus='select()' /></td>
	<th>enter marks of internal 3</th>
	<td><input type='text' required='required' value='$ia3' name='ia3' id='myip2'   maxlength='2' onfocus='select()' /></td>
</tr>
<tr>
	<th>enter marks of subject 4</th>
	<td><input type='text' required='required' value='$ex4' name='ex4' id='myip2'   maxlength='3' onfocus='select()' /></td>
	<th>enter marks of internal 4</th>
	<td><input type='text' required='required' value='$ia4' name='ia4' id='myip2'   maxlength='2' onfocus='select()' /></td>
</tr>
<tr>
	<th>enter marks of subject 5</th>
	<td><input type='text' required='required' value='$ex5' name='ex5' id='myip2'   maxlength='3' onfocus='select()' /></td>
	<th>enter marks of internal 5</th>
	<td><input type='text' required='required' value='$ia5' name='ia5' id='myip2'   maxlength='2' onfocus='select()' /></td>
</tr>
<tr>
	<th>enter marks of subject 6</th>
	<td><input type='text' required='required' value='$ex6' name='ex6' id='myip2'   maxlength='3' onfocus='select()' /></td>
	<th>enter marks of internal 6</th>
	<td><input type='text' required='required' value='$ia6' name='ia6' id='myip2'   maxlength='2' onfocus='select()' /></td>
</tr>
<tr>
	<th>enter marks of subject 7</th>
	<td><input type='text' required='required' value='$ex7' name='ex7' id='myip2'   maxlength='3' onfocus='select()' /></td>
	<th>enter marks of internal 7</th>
	<td><input type='text' required='required' value='$ia7' name='ia7' id='myip2'   maxlength='2' onfocus='select()' /></td>
</tr>
<tr>
	<th>enter marks of subject 8</th>
	<td><input type='text' required='required' value='$ex8' name='ex8' id='myip2'   maxlength='3' onfocus='select()' /></td>
	<th>enter marks of internal 8</th>
	<td><input type='text' required='required' value='$ia8' name='ia8' id='myip2'   maxlength='2' onfocus='select()' /></td>
</tr>
<tr>
	<th>enter marks of subject 9</th>
	<td><input type='text' required='required' value='$ex9' name='ex9' id='myip2'   maxlength='3' onfocus='select()' /></td>
	<th>enter marks of internal 9</th>
	<td><input type='text' required='required' value='$ia9' name='ia9' id='myip2'   maxlength='2' onfocus='select()' /></td>
</tr>

<!------------------------->
<tr>
	<th>enter result</th>
	<td><select name='result' >
	";
$RE=array('FAIL','PASS','FIRS','DIST');
foreach($RE as $ii)
	{
		if(preg_match('/'.$ii.'/i',$result))
		{
			echo "<option value='$ii' selected='selected'>".$ii."</option>";
			
		}
		else
		{
			echo "<option>".$ii."</option>";
		}
			
	}	

echo "
	<th>enter year</th>
	<td><input type='number' required='required' value='$year' name='year' id='myip2'   maxlength='4' onfocus='select()' /></td>
</tr>
<tr>
	<th><b>Choose month of examination:</b></th>
	<td><select name='month' >
";
$mn=array('may','nov');
foreach($mn as $ii)
	{
		if($ii==$month)
		{
			echo "<option value='$ii' selected='selected'>".$ii."</option>";
			
		}
		else
		{
			echo "<option>".$ii."</option>";
		}
			
	}	

echo "
		</select>
	</td>
	<th><b>is reguler ?</b></th>
	<td><select name=reguler >
";
	$mm=array('reguler','backed','detain');
	foreach($mm as $ii)
	{
		if($ii==$reguler)
		{
			echo "<option value='$ii' selected='selected'>".$ii."</option>";
			
		}
		else
		{
			echo "<option>".$ii."</option>";
		}
			
	}
echo "
		</select>
	</td>
</tr>
</table>
<br /><input type='submit' value='update' id='updt' class='sub'/><br />
</form><br />";
			}//while end
			echo "<b>note:</b>absent student must be represented with -1</div></div>";
}
$conn->close();
?>
<?php include("footer.php") ?>	