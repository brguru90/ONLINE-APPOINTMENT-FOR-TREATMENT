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
<style>
li a{font-size:15px;font-weight:bold;}
.not{border:none;background-color:PowderBlue;background:transparent url("images/form1.png") no-repeat;background-size:cover;text-transform: capitalize;word-wrap: break-word;}
.not td{border:none;color:black;text-align:left;padding:5px 5px 5px 5px;}
td{border:solid 1px blue}
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
$sql="select * from notes order by id";
$conn->query($sql);
$res=$conn->query($sql);
if ($res->num_rows > 0) 
{
echo "<form action='admin_notes_del.php' method='post'>
		<table border='2' class='not'>
			<tr style='border-bottom:solid 1px black;'>
				<td style='padding-top:10px'>Notification</td>
				<td style='padding-top:10px'>URL</td>
				<td colspan='2'></td>
			</tr>";

	while($row = $res->fetch_assoc()) 
	{
		$id=$row['id'];
		$note=$row['note'];
		$link=$row['link'];
		
		echo "
			<tr>
				<td style='width:400px'>$note</td>
				<td style='width:150px'>$link</td>
				<td style='width:50px'><u><a style='width:20px;color:black' href='admin_notes_updt.php?id=$id'>modify</a></u></td>
				<td style='width:100px'><input type='checkbox' name='note[$id]' value='del' />delete</td>
				";	

	}
	echo "</tr></table><br />
	<input type='submit' value='Delete marked' style='width:200px' class='sub'/>
	<input type='button' value='+' class='sub' onclick='insert()'/>
	</form>";
}
$conn->close();
?> 
<script>
function insert()
{
	var text="<br /><form action='admin_note_ins.php' method='post'><table ><tr><td>NOTE:</td><td>LINK:</td></tr><tr><td><textarea name='note'></textarea></td><td><textarea name='link'></textarea></td></tr></table><br /><input type='submit' value='submit' class='sub'/></form>";
	document.getElementById('form').innerHTML=text;
}
</script>
<div id='form'></div>
<?php include("footer.php") ?>