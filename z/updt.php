<?php include('log_details.php');?>
<!DOCTYPE html>
<html>
<head>
<title id="title">update</title>
<?php include("header.php") ?>
			<!-----------------------------------------------------//navigation----------------------------------------------------------------->
<?php include("styl.php"); ?><br />
<div id="kk">
<div id="jj">
<form action="updt_db.php" method="get"  class="myform" >
<table class="mytb">
<caption>Update details:</caption>
<tr>
	<th>enter reg no</th>
	<td><input pattern="[0-9]{3}[a-zA-Z]{2}[0-9]{5}" type="text" required="required" value="139CS13099" name="reg" id="myip"   maxlength="10" onfocus="this.value=''" /></td>
</tr>

</table>
<br /><input type="submit" value="insert"  id='updt' style='color:white'  class='sub'/><br />
</form>		
</div>
</div>
<?php include("footer.php") ?>	