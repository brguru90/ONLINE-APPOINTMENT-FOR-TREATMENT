<?php
session_start();
	if (!isset($_SESSION['admin']))
	{
		header('Location:home.php');
	} 
	
?>
<!DOCTYPE html>
<html>
<head>
<title id="title">Admin</title>
<?php include("header.php") ?>		
<?php include("styl.php") ?>	
<style>
li a{font-size:15px;font-weight:bold;}
.admin{border:none;background-color:PowderBlue;width:680px;text-transform: capitalize;}
.admin td,.admin th{border:none;color:blue;}
.im{width:198px;height:198px;border:solid silver 10px;border-radius:200px;}
</style>
			<!-----------------------------------------------------//navigation----------------------------------------------------------------->
			<div style='background-color:pink;'>
			<div id="jj">
<?php
include('db.php');
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
}
$sql="select * from login";
$res=$conn->query($sql);
if ($res->num_rows > 0) 
{
echo "<form action='admin_oper.php' method='post'>";
	while($row = $res->fetch_assoc()) 
	{
		$name=$row['name'];
		$user=$row['user'];
		$pwd=$row['pwd'];
		$email=$row['email'];
		$phno=$row['phno'];
		$status=$row['status'];
		$img=$row['images'];
		echo "
		<div id='kk' style='padding:10px 10px 10px 10px'>
			<table border='2' class='admin'>
			<caption style='background-color:PowderBlue'>name: $name</caption>
			
			<tr>
				<td style='width:305px;height:205px;padding-right:15px;padding-left:5px;'>
					<div class='imdiv' style='width:300px;height:200px;border:solid white 1px;background-color:white;'>
						<center><img src='$img' class='im' alt='img'/></center>
					</div>
				</td>
				<td style='line-height:35px;padding-left:25px;border-left:solid silver 5px'>user: $user<br />
				password: $pwd<br />
				Email ID: $email<br />
				Ph no: $phno<br />
				status<br />";
				if("activated"==$status)
				{	
					echo "<label><input type='radio' name='user[$user]' value='activated'  checked='checked' />activate</label>";
					echo "<label><input type='radio' name='user[$user]' value='deactivated'/>deactivated</label>";
				}
				else
				{	
					echo "<label><input type='radio' name='user[$user]' value='activated' />activate</label>";
					echo "<label><input type='radio' name='user[$user]' value='deactivated' checked='checked'  />deactivated</label>";	
				}	
		echo "</td>
			</tr></table></div><br />";
	}
	echo "
	<input type='submit' value='submit' class='sub'/>
	</form>";
}
		
//else {echo "Error: " . $sql . "<br>" . $conn->error;}

$conn->close();
?> 
<?php include("footer.php") ?>