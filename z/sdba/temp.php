<?php include('log_details.php');?>
<!DOCTYPE html>
<html>
<head>
<title id="title">upload</title>
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
	<th><b>choose File to upload exam result</b></th>
	<td><input type="file" name="exam" required="required" style="font-size:20px;width:200px;height:40px;padding:0px 0px 0px 0px;"></td>
</tr>
<tr>
	<td colspan='2'></td>
</tr>
<tr>
	<td colspan='2'></td>
</tr>
<tr>
	<th><b>choose File to upload subject details</b></th>
	<td><input type="file" name="subject" required="required" style="font-size:20px;width:200px;height:40px;padding:0px 0px 0px 0px;"></td>
</tr>
<tr>
	<td colspan='2'></td>
</tr>
<tr>
	<td colspan='2'></td>
</tr>
<tr>
	<th><b>choose File to upload sem1 result</b></th>
	<td><input type="file" name="sem1" required="required" style="font-size:20px;width:200px;height:40px;padding:0px 0px 0px 0px;"></td>
</tr>
<tr>
	<th><b>choose File to upload sem2 result</b></th>
	<td><input type="file" name="sem2" required="required" style="font-size:20px;width:200px;height:40px;padding:0px 0px 0px 0px;"></td>
</tr>
<tr>
	<th><b>choose File to upload sem3 result</b></th>
	<td><input type="file" name="sem3" required="required" style="font-size:20px;width:200px;height:40px;padding:0px 0px 0px 0px;"></td>
</tr>
<tr>
	<th><b>choose File to upload sem4 result</b></th>
	<td><input type="file" name="sem4" required="required" style="font-size:20px;width:200px;height:40px;padding:0px 0px 0px 0px;"></td>
</tr>
<tr>
	<th><b>choose File to upload sem5 result</b></th>
	<td><input type="file" name="sem5" required="required" style="font-size:20px;width:200px;height:40px;padding:0px 0px 0px 0px;"></td>
</tr>
<tr>
	<th><b>choose File to upload sem6 result</b></th>
	<td><input type="file" name="sem6" required="required" style="font-size:20px;width:200px;height:40px;padding:0px 0px 0px 0px;"></td>
</tr>
<tr>
	<td colspan="2" id="myip" >
		<input type="submit" value="upload" class="sub" />
	</td>
</tr>
</table>
</form>
</div>
</div>
<?php include("footer.php") ?>