<!DOCTYPE html>
<html>
<head>
<script
src="http://maps.googleapis.com/maps/api/js">
</script>
<script>
function initialize()
{
var mapOpt = {
   center:new google.maps.LatLng(14.367800,75.096783),
  zoom:14,
  mapTypeId:google.maps.MapTypeId.ROADMAP
  /*
HYBRID		Displays a photographic map + roads and city names
ROADMAP		Displays a normal, default 2D map
SATELLITE	Displays a photographic map
TERRAIN		Displays a map with mountains, rivers, etc.
*/
  };
var map=new google.maps.Map(document.getElementById("googleMap"),mapOpt);
}

google.maps.event.addDomListener(window, 'load', initialize);
</script>
<title id="title">about</title>
<?php
	include("header.php") ;
	include("db.php");
	include("styl.php")
?>		
<style>
@media only screen and (max-width: 1000px) 
{
	//#tbl{font-size:10px;}
	//body{width:1024px;}
}

li a
{
	font-size:15px;
	font-weight:bold;
}
table
{
	font-size:18px;
	background-color:pink;
	font-family:guru;
}
td
{	width:50%;
	height:400px;
	padding:20px 20px 20px 20px;
}
table
{	
	background: url("images/j.jpg") no-repeat center center;
	background-size:cover;
}
#im
{
	width:100%;
	height:350px;
}
.hed
{
	color:MediumBlue;
	font-size:55px;
	background-color:white;
	opacity:0.7;
	padding:5px 15px 5px 15px;
	border-radius:5px;
	font-family:guru4;
}
.hed2
{
	color:MediumBlue;
	font-size:28px;
	background-color:white;
	opacity:0.7;
	padding:5px 5px 5px 5px;
	border-radius:5px;
	text-align:center;
	font-weight:bold;
}
#googleMap{text-align:center}
.map{
	background: url("images/soraba.png") no-repeat center center;
	background-size: 92% 80%;
	
}
</style>
			<!-----------------------------------------------------//navigation----------------------------------------------------------------->
			<center>
				<b class='hed'>About college</b><br />
				
				<br />
			</center><br />
<table id="tbl">
		
		<center><img src="sa.gif" alt="sa" height="220" style='width:100%;margin-bottom:10px;'></center>
	<tr>
			<td>
				<br /><img id="im" src='images/clg.jpg'/ alt="clg" height="350px" width="300px">
			</td>
			<td><br /><br />
				<h2 class='hed2'>
					<?php 
						include("db.php");
						echo $clg
					?>
				</h2><br />
				<style="font-family: times; fint_color:darkblue;">
				
				Polytechnic Soraba is a technical institute offering three years Diploma courses. The institution is under the control of Department Of Technical Education, Government of Karnataka.<br />

				The institution was established in the year 1996, three year Diploma courses in the following branches were started.<br />

				1. DIPLOMA IN COMPUTER SCIENCE AND ENGINEERING<br />

				2. DIPLOMA IN ELECTRONICS AND COMMUNICATION ENGINEERING<br />

				3. DIPLOMA IN CIVIL ENGINEERING<br />

				4. COMMERCIAL PRACTICE<br />

				At present, the institution is offering four Diploma programmes of three years duration.
			</td>
	</tr>
	<tr>
			<td  id="googleMap" style="height:200px" class='map'>
			</td>
		
			<td style="padding-top:-40px;height:500px;font-family:guru0;">
					<h2 style='font-family:guru;text-decoration:underline;color:red'>Contact Us</h2><br />
				Government PolyTechnic,<br />
				Next to Govt. Hospital, Sagar Road,<br />
				Sorab taluk, Shimoga (D) -577429<br />
				Telephone: 08184-272539<br />
				E-mail: govtpoly_sorab@rediffmail.com <br />
			</td>
		
	</tr>
</table>
<p style='background-color:white'>This webpage is incompatable with the internet Explorer 6</p>
<?php include("footer.php") ?>		