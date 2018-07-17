<?php
session_start();
	if (isset($_COOKIE['user']))
	{
		$_SESSION['user']=$_COOKIE['user'];
	}
	if (!isset($_SESSION['user']) && !isset($_SESSION['admin']))
	{
		$_SESSION['location']= 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
		header('Location:login_form.php');
	}
	
?>
<!DOCTYPE html>
<html>
<head>
<title id="title">Admin</title>
<script src="api/jquery.js"></script>
<script>
$(document).ready(function(){
	$(".sub").click(function(){
   $("input[type='text']").css({"padding-top":"6px","width":"200px"});//set font of all text input element to guru
   });
   $("body").mouseover(function(){
   $(".sub").css({"padding":"6px","width":"200px","height":"44px"});//set font of all text input element to guru
   });
});
</script>
<?php include("header.php") ?>		
<?php include("styl.php") ?>	
<style>
li a{font-size:15px;font-weight:bold;}
.not{font-size:12px;border:none;background:transparent url("images/form1.png") no-repeat;background-size:cover;text-transform: capitalize;word-wrap: break-word;border-collapse: unset;}
.not td,.not th{border:none;color:black;text-align:left;padding:1px 1px 1px 1px;}
.not tr th{color:black;text-align:left;padding:5px 5px 5px 5px;}
.not td,.not th{border:solid 1px white}
.not #gap td{border-top:solid 2px white}
.add td,.not th{padding:2px 2px 2px 2px;border:solid 1px white}
.add input{padding:16px;width:200px;}
.add input[type='number']{padding:12.5px;width:200px;}
.add select{padding:14px;width:200px;}
.fr td,.fr th{padding-top:15px;}
</style>
			<!-----------------------------------------------------//navigation----------------------------------------------------------------->
			<div id="kk">
			<div id="jj" style='background-color:pink'>
<?php
include('db.php');
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
}
			
$sql="select * from sub_details order by year,branch,sem,id";
$res=$conn->query($sql);
if ($res->num_rows > 0) 
{
echo "<form action='admin_subject_del.php' method='post'>
<table class='not'>
<tr>
	<th>SEM</th>
	<th>BRANCH</th>
	<th>STAFF MEMBER</th>
	<th>SUBJECT NAME</th>
	<th>SUBJECT CODE</th>
	<th>SUBJECT ORDER</th>
	<th>YEAR</th>
	<th></th>
</tr>";
$sem1=0;
	while($row = $res->fetch_assoc()) 
	{
		$id=$row['id'];
		$sem=$row['sem'];
		$temp=$sem1;
		$sem1=$sem;
		$sub_order=$row['sub_order'];
		$sub_code=$row['sub_code'];
		$sub_name=$row['sub_name'];
		$staff_member=$row['staff_member'];
		$branch=$row['branch'];
		$year=$row['year'];
		//to check whether sem is different from previous
			if($temp!=$sem)
			{
				echo "<tr id='gap'>";	
			}
			else
			{
				echo "<tr>";	
			}
		echo "
				<td >$sem</td>
				<td style='text-transform:uppercase'>$branch</td>
				<td>$staff_member</td>
				<td style='text-transform:uppercase'>$sub_name</td>
				<td style='text-transform:uppercase'>$sub_code</td>	
				<td>$sub_order</td>				
				<td>$year</td>
				<td style='width:100px'><input type='checkbox' name='subject[$id]' value='del' />delete</td>
			</tr>";
	}
	echo "</table><br />
	<input type='submit' value='Delete marked' style='width:200px' class='sub'/>
	<input type='button' value='+' class='sub' onclick='insert()'/>
	</form>";
}
$conn->close();
?> 
<script>
function insert()
{
	var text="<br /><form action='admin_subject_ins.php' method='post' class='add'><table style='border:solid 1px white;'><tr class='fr'><th>staff member</th><th>Sem:</th><th>Branch:</th><th>Year:</th></tr><tr><td><input type='text' required='required' value='' name='staff_member' /></td><td><select name='sem'><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option></select></td><td><select name='branch' ><option>CS</option><option>CIVIL</option><option>EC</option><option>CP</option></select></td><td><input type='number' required='required' value='' name='year' /></td></tr><tr><th>subject name:</th><th>subject code:</th><th>subject order</th></tr><tr><td><input type='text' required='required' value='' name='sub_name' /></td><td><input type='text' required='required' value='' name='sub_code' /></td><td><input type='text' required='required' value='' name='sub_order' /></td><td><input type='submit' value='submit' class='sub' style='padding:6px;'/></td></tr></table></form>";
	document.getElementById('form').innerHTML=text;
}
</script>
<div id='form'></div>
<?php include("footer.php") ?>