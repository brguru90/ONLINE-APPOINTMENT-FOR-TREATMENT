<?php
$text=file_get_contents("count.txt");
$count=explode("=",$text);
//setcookie('visitor', '', time() - 3600);
if(!isset($_COOKIE['visitor']))//check whether the user aleready visited or not within that day by checking the cookie
{
	$count[1]+=1;
	file_put_contents("count.txt","count=$count[1]");
		date_default_timezone_set("Asia/Calcutta");
		$hrs=date("h");
		$hrs=12-$hrs;
		if(date("a")=="am")
		$hrs=12+$hrs;
		setcookie("visitor","Counted",time()+((60*60)*$hrs)); //vsitors per day
		//echo $hrs;
}
// $_COOKIE['visitor'];
?>