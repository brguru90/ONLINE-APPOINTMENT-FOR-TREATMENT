<?php
$text2=file_get_contents("likes.txt");
$count2=explode("=",$text2);
$count2[1]+=1;
file_put_contents("likes.txt","likes=$count2[1]");
echo "<script>window.location.assign('home.php')</script>";
//echo "total no of visitors:$count[1]";
//header('Location:index.html');
//echo "<script>history.go(-1)</script>";
?>