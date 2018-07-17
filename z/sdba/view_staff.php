
<html>
<?php include("styl.php"); ?>
<div id="kk" style='height:350px'>
<div id="jj">
<form action="view_staff0.php" method="post"  class="myform" >
<table class="mytb">
<caption>view staff wise:</caption>
<tr>
	<th><b>enter year:</b></th>
	<td><input type="number" required="required" value="2014" name="year" id="myip"  maxlength="4" onfocus="this.value=''" /></td>
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
	<td><select name="semister" id="myip" >
			<option value="1">Odd</option>
			<option value="2">Even</option>
		</select>
	</td>
</tr>
<tr>
	<td colspan="2" id="myip" >
		<input type="submit" value="submit" name="submit" class="sub" />
	</td>
</tr>
</table>
</form>		
</div>
</div>
</html>