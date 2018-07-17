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
			<div id="kk">
			<div id="jj">
			<ul>
					<li><a href="admin_account.php">Activate/Deactivate client account</a></li>
					<li><a href="admin_del.php">Delete a client account</a></li>
					<li><a href="initialize.php">Initiate some pre defined Data</a></li>
					<li><a href="admin_note.php">Manage notification</a></li>
					<li><a href="admin_subject_man.php">Subject and staff data Managment</a></li>
					<li><a href="admin_view_fb.php">View comments</a></li>
					<li><a href="send.php">Send a sms</a></li>
					<li><a href="admin_logout.php">Logout</a></li>
			</ul>
			</div>
			</div>
<?php include("footer.php") ?>