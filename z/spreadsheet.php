<?php include('log_details.php');?>
<!DOCTYPE html>
<html>
<head>
<title id="title">spreadsheet</title>
<?php include("header.php") ?>		
<?php include("styl.php") ?>	
<style>
li a{font-size:15px;font-weight:bold;}
</style>
			<!-----------------------------------------------------//navigation----------------------------------------------------------------->
			<div id="kk" style='height:350px'>
			<div id="jj">
				<ul>
					<li>
						<a href="upload.php">UPLOAD</a><br />
						<b style='color:blue'>(Here we can store the student result data to the data base through uploading the<br /> 
						Excel sheet in the three format,. VIZ xlsx,xls,csv )</b>
					</li>
					
					<li><a href="download.php">DOWNLOAD</a></li>
					<b style='color:blue'>(Here we can download the student results from DataBase in xlsx formats )</b>
					
					<li><a href="admin_subject_man.php">subject and staff details managment</a></li>
					<b style='color:blue'>(Here we can view and delete the subject details )</b>
				</ul>
			</div>
			</div>
<?php include("footer.php") ?>		