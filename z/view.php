<?php include('log_details.php');?>
<!DOCTYPE html>
<html>
<head>
<title id="title">view</title>
<?php
 include("header.php") 
 ?>		
<?php include("styl.php") ?>	
<style>
li a{font-size:15px;font-weight:bold;}
</style>
			<!-----------------------------------------------------//navigation----------------------------------------------------------------->
			<div id="kk" style='height:350px'>
			<div id="jj">
				<ul>
					<li>
						<a href="view_sub_wise.php">RESULT ANALYSIS BY SUBJECT</a><br />
						<b style='color:blue'>(Here we can view the result Subject wise by providing year and Branch)</b>
					</li>
					<li>
						<a href="view_staff_wise.php">RESULT ANALYSIS BY STAFF</a><br />
						<b style='color:blue'>(Here we can view the result Staff wise by providing year and Branch)</b>
					</li>
					<li>
						<a href="view_course_wise.php">RESULT ANALYSIS BY COURSE</a><br />
						<b style='color:blue'>(Here we can view the result Staff wise by providing year and Branch)</b>
					</li>
				</ul>
			</div>
			</div>
<?php include("footer.php") ?>		