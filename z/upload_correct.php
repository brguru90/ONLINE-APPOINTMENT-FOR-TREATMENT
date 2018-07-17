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
<form action="sdba/upload1.php" method="post" enctype="multipart/form-data"  class="myform" >
<table class="mytb" >
<caption>Upload details here:</caption>
<tr>
	<th><b>enter year:</b></th>
	<td><input type="number" required="required" value="2014" name="year" id="myip"  maxlength="4" onfocus="this.value=''" /></td>
</tr>
<tr>
	<th><b>choose file</b></th>
	<td><input type="file" name="fileToUpload" required="required" style="font-size:20px;width:200px;height:40px;padding:0px 0px 0px 0px;"></td>
</tr>
<tr>
	<td colspan="2" id="myip">
		<input type="submit" value="upload" class="sub" />
	</td>
</tr>
<tr>
	<td colspan='2' style='padding:0px 0px 0px 10px;'>
		<b style='border:solid 1px blue;color:purple;font-family:guru2'><b style='color:red'>Note:</b>the xlsx format is as [register number,sem,reguler] even without skipping a row at begining.</b>
	</td>
</tr>
</table>
</form>
</div>
</div>
<?php include("footer.php") ?>