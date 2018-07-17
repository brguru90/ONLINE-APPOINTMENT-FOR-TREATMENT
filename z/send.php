<?php
session_start();
	if (!isset($_SESSION['admin']))
	{
		header('Location:home.html');
	} 
	
?>
<html>
<?php
 echo "<br />
<input type='button' value='back' onclick='history.go(-1)' /><br />";
?>
<form method="post" action="sms/guru.php">
	enter no:
	<br><input type="text" name="to" value="" size="10" maxlength="10" />
	<br/>Message:
	<br><textarea name="msg" maxlength="140" rows="5" cols="30"></textarea>
	<br/><input type="submit" value="Send SmS"/>
</form>
</html>