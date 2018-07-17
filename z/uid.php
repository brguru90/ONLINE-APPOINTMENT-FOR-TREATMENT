<?php 
echo md5($_SERVER['REMOTE_ADDR'] . $_SERVER['HTTP_USER_AGENT'])."<br />";
echo $_SERVER['REMOTE_ADDR']."<br />";
echo $_SERVER['HTTP_USER_AGENT']."<br />";
//echo getenv('REMOTE_ADDR');
//echo $_SERVER['HTTP_X_FORWARDED_FOR']."<br />";
function create_guid() {     
    $uid = uniqid("", true);
    $data = $namespace;
    $data .=",". $_SERVER['REQUEST_TIME'];
    $data .= ",". $_SERVER['HTTP_USER_AGENT'];
    $data .= ",". $_SERVER['LOCAL_ADDR'];
    $data .= ",". $_SERVER['LOCAL_PORT'];
    $data .= ",". $_SERVER['REMOTE_ADDR'];
    $data .= ",". $_SERVER['REMOTE_PORT'];
	echo $data;
  }
  create_guid();
  echo "<br />".$_SERVER['PHP_SELF'];
?>