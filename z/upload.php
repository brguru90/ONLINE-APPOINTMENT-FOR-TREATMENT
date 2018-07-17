<?php include('log_details.php');?>
<!DOCTYPE html>
<html>
<head>
<title id="title">upload</title>
<style>
#help{
	background-color:white;
}
#help td *{
	padding-left:10px;
	padding-right:10px;
}
#help a{
	float:right;
}
</style>
<?php include("header.php") ?>
			<!-----------------------------------------------------//navigation----------------------------------------------------------------->
				<?php include("styl.php"); ?>
<div id="kk" >
<div id="jj">
<form action="sdba/upload0.php" method="post" enctype="multipart/form-data"  class="myform" >
<table class="mytb" >
<caption>Upload details here:</caption>
<tr>
	<td colspan='2'></td>
</tr>
<tr>
	<th><b>enter year:</b></th>
	<td><input type="number" required="required" value="2014" name="year" id="myip"  maxlength="4" onfocus="this.value=''" /></td>
</tr>
<tr>
	<th><b>Choose month of examination:</b></th>
	<td><select name="month" id="myip" >
			<option>may</option>
			<option>nov</option>
		</select>
	</td>
</tr>
<tr>
	<th><b>choose branch</b></th>
	<td><select name="branch" id="myip" >
			<option>CS</option>
			<option>CIVIL</option>
			<option>EC</option>
			<option>CP</option>
		</select>
	</td>
</tr>
<tr>
	<th><b>choose File to upload exam result</b></th>
	<td><input type="file" name="exam" style="font-size:20px;width:200px;height:40px;padding:0px 0px 0px 0px;"></td>
</tr>
<tr>
	<td colspan='2'></td>
</tr>
<tr>
	<td colspan='2'></td>
</tr>
<tr>
	<th><b>choose File to upload subject details</b></th>
	<td><input type="file" name="subject" style="font-size:20px;width:200px;height:40px;padding:0px 0px 0px 0px;"></td>
</tr>
<tr>
	<td colspan='2'></td>
</tr>
<tr>
	<td colspan='2'></td>
</tr>
<tr>
	<th><b>choose File to upload sem1 result</b></th>
	<td><input type="file" name="sem1" style="font-size:20px;width:200px;height:40px;padding:0px 0px 0px 0px;"></td>
</tr>
<tr>
	<th><b>choose File to upload sem2 result</b></th>
	<td><input type="file" name="sem2" style="font-size:20px;width:200px;height:40px;padding:0px 0px 0px 0px;"></td>
</tr>
<tr>
	<th><b>choose File to upload sem3 result</b></th>
	<td><input type="file" name="sem3" style="font-size:20px;width:200px;height:40px;padding:0px 0px 0px 0px;"></td>
</tr>
<tr>
	<th><b>choose File to upload sem4 result</b></th>
	<td><input type="file" name="sem4" style="font-size:20px;width:200px;height:40px;padding:0px 0px 0px 0px;"></td>
</tr>
<tr>
	<th><b>choose File to upload sem5 result</b></th>
	<td><input type="file" name="sem5" style="font-size:20px;width:200px;height:40px;padding:0px 0px 0px 0px;"></td>
</tr>
<tr>
	<th><b>choose File to upload sem6 result</b></th>
	<td><input type="file" name="sem6" style="font-size:20px;width:200px;height:40px;padding:0px 0px 0px 0px;"></td>
</tr>
<tr>
	<td colspan="2" id="myip" >
		<input type="submit" value="Upload" class="sub" />
		<input type="button" value="Help" class="sub" id='shows' />
	</td>
</tr>
</table><br />
<table class="mytb" id="help">
<tr style='padding:0px 0px 0px 0px'>
	<td colspan='2' style='padding:10px 0px 10px 0px'>
		<h3 style='color:Fuchsia;font-family:guru;font-weight:bold;'>Order of excel sheet columns:</h3>
	</td>
</tr>
<tr style='padding:0px 0px 0px 0px'>
	<td style='padding:0px 0px 0px 0px'>
		<b>For subject details:</b>Sem, subject order number, subjct code, subject name, staff member
	</td>
	<td style='padding:0px 0px 0px 0px'>
		- <a style='color:#1E90FF;text-decoration:underline;font-family:guru' href='images/staff.jpg'>Click Here to View Format</a>
	</td>
</tr>
<tr style='padding:0px 0px 0px 0px'>
	<td style='padding:0px 0px 0px 0px'>
		<b>For semister details:</b>Single row with reguler student register number
	</td>
	<td style='padding:0px 0px 0px 0px'>
		- <a style='color:#1E90FF;text-decoration:underline;font-family:guru' href='images/std.jpg'>Click Here to View Format</a>
	</td>
</tr>
<tr style='padding:0px 0px 0px 0px'>
	<td style='padding:0px 0px 0px 0px'>
		<b>For Resultsheet details:</b>
	</td>
	<td style='padding:0px 0px 0px 0px'>
		- <a style='color:#1E90FF;text-decoration:underline;font-family:guru' href='images/result.jpg'>Click Here to View Format</a>
	</td>
</tr>
</table>
</form>
<script>
$(document).ready(function(){
	$("#help").hide();	
	$("#shows").click(function(){
			$("#help").show();						 
	});
	$("input[type='file']").click(function(){
			$("#help").hide();						 
	});
	$("input[type='number']").click(function(){
			$("#help").hide();						 
	});
	$("input[type='submit']").click(function(){
			$("#help").hide();						 
	});
	$("select").click(function(){
			$("#help").hide();						 
	});
});
</script>
</div>
</div>
<?php include("footer.php") ?>