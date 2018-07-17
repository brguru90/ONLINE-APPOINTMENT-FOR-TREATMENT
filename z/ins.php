<?php include('log_details.php');?>
<!DOCTYPE html>
<html>
<head>
<title id="title">insert</title>
<?php include("header.php") ?>
			<!-----------------------------------------------------//navigation----------------------------------------------------------------->
<?php include("styl.php"); ?><br />
<div id="kk" style="background: linear-gradient(to bottom right,violet 15%,pink 30%,bisque 45%,skyblue 55%,aqua 65%,lightgreen 80%,lime 90% );">
<div id="jj">
<style>
	.myform2 table{background:transparent;border:solid white 1px;}
	#updt{color:white;}
	.mytb2 th,.mytb2 td{color:blue;}
	.mytb2 td{padding:10px 10px 10px 10px}
	.mytb2 th{padding:10px 10px 10px 10px}
	#upp{color:white;background-color:purple;font-size:18px;padding:5px 10px 5px 10px;}
</style>
<form action="ins_db.php" method="post"  class="myform2" >
<b id="upp">Insert details:</b><br /><br />
<table class="mytb2">
<tr>
	<th>enter reg no</th>
	<td><input type="text" required="required" maxlength="10" value="" name="reg" id="myip2"  pattern="[0-9]{3}[a-zA-Z]{2}[0-9]{5}" /></td>

	<th>enter name</th>
	<td><input type="text" required="required" value="" name="name" id="myip2" /></td>
</tr>
<tr>
	<th><b>choose branch</b></th>
	<td><select name="branch" id="myip2" >
			<option>CS</option>
			<option>CIVIL</option>
			<option>EC</option>
			<option>CP</option>
		</select>
	</td>

	<th><b>choose sem</b></th>
	<td><select name="sem" id="myip2" >
			<option>1</option>
			<option>2</option>
			<option>3</option>
			<option>4</option>
			<option>5</option>
			<option>6</option>
		</select>
	</td>
</tr>
<!------------------------->
<tr>
	<th>enter marks of subject 1</th>
	<td><input type='number' required='required' value='' name='ex1' id='myip2' maxlength="2"/></td>
	<th>enter marks of internal 1</th>
	<td><input type='number' required='required' value='' name='ia1' id='myip2' /></td>
</tr>
<tr>
	<th>enter marks of subject 2</th>
	<td><input type='number' required='required' value='' name='ex2' id='myip2' /></td>
	<th>enter marks of internal 2</th>
	<td><input type='number' required='required' value='' name='ia2' id='myip2' /></td>
</tr>
<tr>
	<th>enter marks of subject 3</th>
	<td><input type='number' required='required' value='' name='ex3' id='myip2' /></td>
	<th>enter marks of internal 3</th>
	<td><input type='number' required='required' value='' name='ia3' id='myip2' /></td>
</tr>
<tr>
	<th>enter marks of subject 4</th>
	<td><input type='number' required='required' value='' name='ex4' id='myip2' /></td>
	<th>enter marks of internal 4</th>
	<td><input type='number' required='required' value='' name='ia4' id='myip2' /></td>
</tr>
<tr>
	<th>enter marks of subject 5</th>
	<td><input type='number' required='required' value='' name='ex5' id='myip2' /></td>
	<th>enter marks of internal 5</th>
	<td><input type='number' required='required' value='' name='ia5' id='myip2' /></td>
</tr>
<tr>
	<th>enter marks of subject 6</th>
	<td><input type='number' required='required' value='' name='ex6' id='myip2' /></td>
	<th>enter marks of internal 6</th>
	<td><input type='number' required='required' value='' name='ia6' id='myip2' /></td>
</tr>
<tr>
	<th>enter marks of subject 7</th>
	<td><input type='number' required='required' value='' name='ex7' id='myip2' /></td>
	<th>enter marks of internal 7</th>
	<td><input type='number' required='required' value='' name='ia7' id='myip2' /></td>
</tr>
<tr>
	<th>enter marks of subject 8</th>
	<td><input type='number' required='required' value='' name='ex8' id='myip2' /></td>
	<th>enter marks of internal 8</th>
	<td><input type='number' required='required' value='' name='ia8' id='myip2' /></td>
</tr>
<tr>
	<th>enter marks of subject 9</th>
	<td><input type='number' required='required' value='' name='ex9' id='myip2' /></td>
	<th>enter marks of internal 9</th>
	<td><input type='number' required='required' value='' name='ia9' id='myip2' /></td>
</tr>
<!------------------------->
<tr>
	<th>enter result</th>
	<td><select name='result' >
			<option>Fail</option>
			<option>Pass</option>
			<option>Firs</option>
			<option>Dist</option>

	<th>enter year</th>
	<td><input type="number" required="required" pattern="[0-9]{4}" value="" name="year" id="myip2" /></td>
</tr>
<tr>
	<th><b>Choose month of examination:</b></th>
	<td><select name="month" >
			<option>may</option>
			<option>nov</option>
		</select>
	</td>

	<th><b>is reguler ?</b></th>
	<td><select name="reguler" >
			<option>reguler</option>
			<option>backed</option>
			<option>detain</option>
		</select>
	</td>
</tr>
</table>
<br /><input type="submit" value="insert" id="updt" class="sub"/><br />
<b>note:</b>absent student must be represented with -1
</form>		
</div>
</div>
<?php include("footer.php") ?>	