<?php include('log_details.php');?>
<!DOCTYPE html>
<html>
<head>
<title id="title">delete</title>
<?php include("header.php") ?>
<script>
$(document).ready(function(){
	var url=$(location).attr('href');
	$("#shows").click(function(){
		//alert("a");
			$("#aaaa").show();						 
	});
	$("#hides").click(function(){
		//alert("b");
			$("#aaaa").hide();						 
	});
});
</script>
			<!-----------------------------------------------------//navigation----------------------------------------------------------------->
<?php include("styl.php"); ?><br />
<div id="kk">
<div id="jj">
<form action="del_db.php" method="get"  class="myform" >
<table class="mytb">
<caption>delete details:</caption>
<tr id="aaaa">
	<th>enter reg no</th>
	<td><input type="text" pattern="[0-9]{3}[a-zA-Z]{2}[0-9]{5}" required="required" value="139CS13099" name="reg" id="myip"  maxlength="10" onfocus="this.value=''"  /></td>
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
	<th><b>choose sem</b></th>
	<td><select name="sem" id="myip" >
			<option>1</option>
			<option>2</option>
			<option>3</option>
			<option>4</option>
			<option>5</option>
			<option>6</option>
		</select>
	</td>
</tr>
<tr>
	<th>enter year</th>
	<td><input type="number" required="required" value="2014" name="year" id="myip"   maxlength="4" onfocus="this.value=''" /></td>
</tr>
<tr>
	<th><b>Choose month of examination:</b></th>
	<td><select name="month" >
			<option>may</option>
			<option>nov</option>
		</select>
	</td>
</tr>
<tr>
	<th><b>Delete record of:</b></th>
	<td>
		<label><input type='radio' name='opt' checked="checked" id='shows' value='reg'/>regster no</label>
		<label><input type='radio' name='opt' value='sem' id='hides' />sem</label>
	</td>
</tr>
</table>
<br /><input type="submit" value="delete"  id='updt' style='color:white'  class='sub'/><br />
</form>		
</div>
</div>
<?php include("footer.php") ?>	