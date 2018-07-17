<?php
session_start();
	if (!isset($_SESSION['admin']))
	{
		header('Location:home.html');
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
table th{font-weight:bold;color:green;border-bottom:solid 1px blue;border-right:solid 1px blue;}
td,th{color:blue;padding:5px 5px 5px 5px;border:dotted 1px blue;}
table{border:solid 2px blue;border-collapse: unset}
</style>
			<!-----------------------------------------------------//navigation----------------------------------------------------------------->
			<div id="kk">
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
echo "<form action='admin_delete.php' method='post'>
	<table>
			<tr>
				<th>name</th>
				<th>user</th>
				<th>pwd</th>
				<th>email</th>
				<th>ph no</th>
				<th>delete</th>
			</tr>";
	while($row = $res->fetch_assoc()) 
	{
		$name=$row['name'];
		$user=$row['user'];
		$pwd=$row['pwd'];
		$email=$row['email'];
		$phno=$row['phno'];
		$status=$row['status'];
		echo "<tr>
				<td>$name</td>
				<td>$user</td>
				<td>$pwd</td>
				<td>$email</td>
				<td>$phno</td>
				<td>";
		
					echo "<input type='checkbox' name='user[$user]' value='delete' />";

		echo "</td>
			</tr>";
	}
	echo "
	</table>
	<input type='submit' value='submit'class='sub' />
	</form>";
}
		
//else {echo "Error: " . $sql . "<br>" . $conn->error;}

$conn->close();
?> 
<?php include("footer.php") ?>