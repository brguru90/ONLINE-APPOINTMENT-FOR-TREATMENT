<?php
session_start();
	if (!isset($_SESSION['admin']))
	{
		header('Location: home.php');
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
</style>
			<!-----------------------------------------------------//navigation----------------------------------------------------------------->
			<div id="kk" >
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
$sql="select * from feedback;";
$result=$conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
	echo "<style>
			.mytb th{color:purple;font-size:18px}
			.a{width:30%}
			.b{width:60%}
			.c{width:10%}
			.mytb td,.mytb th{border:solid white 1px;padding:15px 5px 15px 5px;}
			.mytb{width:100%;color:blue;text-transform: capitalize;background:transparent url(\"images/form1.png\") no-repeat;background-size:cover;}
		</style>
		<form action='admin_fb_del.php' method='post'>
		<center><table class='mytb'>
			<tr>
				<th id='myip' class='a'>name</th>
				<th id='myip' class='b'>Comments</th>
				<th id='myip' class='c'>Delete</th>
			</tr>";
			
    while($row = $result->fetch_assoc()) 
	{
		$name=$row['name'];
		$msg=$row['msg'];
		$id=$row['id'];
		if(strlen($row['name'])>1)
		{
			echo "<tr>
					<td>$name</td>
					<td>$msg</td>
					<td><input type='checkbox' name='fb[$id]' value='del' /></td>
				</tr>";
		}
    }
	echo "<br /></table>
	   	  <input type='submit' value='Delete marked' style='width:200px' class='sub'/>
		  </form>
			</center>";
	
}
$conn->close();
?> 
</div>
</div>
<?php include("footer.php") ?>