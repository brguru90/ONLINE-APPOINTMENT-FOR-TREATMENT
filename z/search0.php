<!DOCTYPE html>
<html>
<head>
<title id="title">view</title>
<?php
 include("header.php"); 
 include("styl.php");
 ?>			
<style>
li a{font-size:15px;font-weight:bold;}
table{background:transparent;}
caption{background:transparent;}
td{border:solid 1px blue;padding:5px 5px 5px 5px}
</style>
<script src="api/jquery.js"></script>
<script>
$(document).ready(function(){
	
});
</script>
			<!-----------------------------------------------------//navigation----------------------------------------------------------------->
			<div id="kk">
			<div id="jj">
			<!-----------------------------------------------------//navigation----------------------------------------------------------------->
<?php
//return file name of all php pages
$page=array();
$allpages=scandir(getcwd());
foreach($allpages as $p)
{
	$filename=explode(".",$p);
	if(isset($filename[1]))
	{
		if(preg_match("/php/i",$filename[1]))
		{
			$page[]=$p;
		}
	}
}
$cur=getcwd();//get current directory
recurse_copy($cur,"$cur/../search");//make a extra copy and search reesult will be redirected to copyied files
//$search="upload view";
if(isset($_GET["query"]))
{
	$_SESSION["query"]=$_GET["query"];
}
	$search=$_SESSION["query"];
	$_REQUEST["name"]="1";
//$page=array("home.php","view.php","upload.php","ins.php","login.php","send.php","spreadsheet.php","update.php","del.php","initialize.php","about.php","modify.php");//name of the pages
$count=0;
$query=array();
$url=array();
$description=array();
$words=explode(" ",$search);
$flag=0;
$queries=array();
$q=0;
$detail=array();
$replace=array();
$r1=array("/</","/>/","/\"/","/\?php/","/\?>/");
$r2=array(" "," ","'","start_php","end_php");
foreach($page as $values)
{
	?>
	<?php
	$contents[$values]=file_get_contents($values);
	$data[$values]=explode(" ",$contents[$values]);
	//echo sizeof($data[$key]);
	for($i=0;$i<sizeof($data[$values]);$i++)
	{
		for($j=0;$j<sizeof($words);$j++)
		{
			if(preg_match("/$words[$j]/i",$data[$values][$i]))
			{
				$queries[$values][$q]=$words[$j];
				$details[$values][$q]=preg_replace($r1,$r2,$data[$values][$i]);
				$q++;
				$flag++;
			}
		}
	}
	//echo "<br /><br /><br /><br /><br />";
	$found[$values]=$flag;
	$flag=0;
	$q=0;
}
function recurse_copy($src,$dst)
{ 
    $dir = opendir($src); 
	if(file_exists($dst)!=1)
	{
		mkdir($dst); 
	}
    while(false !== ( $file = readdir($dir)) )
	{ 
        if (( $file != '.' ) && ( $file != '..' ))
		{ 
            if ( is_dir($src . '/' . $file) )
			{ 
				recurse_copy($src . '/' . $file,$dst . '/' . $file); 
			} 
            else
			{ 
                copy($src . '/' . $file,$dst . '/' . $file); 
			} 
        } 
    } 
    closedir($dir); 
} 
include("db.php");
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
}

//search the input in pre-stored database 
$sql="select * from search_db;";
$res=$conn->query($sql);
if ($res->num_rows > 0) 
{
	$i=0;
	while($row = $res->fetch_assoc()) 
	{
		$temp="";
		for($j=0;$j<sizeof($words);$j++)
		{
			if($row["query"]==$temp)
				continue;
			if(preg_match("/$words[$j]/i",$row["query"]))
			{
				$query[$i]=$row["query"];
				$temp=$row["query"];
				$description[$i]=$row["description"];
				$url[$i]=$row["url"];
				$i++;
			}
		}
	}
}
else{}
//display the input searched in the database
echo "<table>";
if($query!=0)
echo "<caption>".sizeof($query)."- result for $search</caption>";
for($i=0;$i<sizeof($query);$i++)
{
	if($query==0){exit;}
	echo "<tr><td><a href='$url[$i]'>$query[$i]</a></td></tr>";
	echo "<tr><td>$description[$i]</td></tr>";
	//echo "<tr><td colspan='2'></td></tr>";
}
echo "</table><br />";
	//displaying it too danger because hacker can access php file text by searching a word in a php!!!
	echo "<input class='sub' type='button' value='see more' onclick='document.getElementById(\"more\").style.display=\"block\";' /><br />";
$free="";	
//display the input searched in the pages
$free.="<br /><table style='display:none' id='more'>";
foreach($found as $key=>$values)
{
	if($values>0)
	{
		$count++;
		for($i=0;$i<sizeof($queries[$key]);$i++)
		{
			$free.="<tr>";
			$free.="<td><a href='../search/$key'>";
			$free.=$queries[$key][$i]."</a></td>";
			$free.="<td>".$details[$key][$i]."</td>";
			$free.="</tr>";
		}
	}
}
if($count==0)
{
	$free.="<tr><td colspan='2'>No reult founs!</td></tr>";
}
$free.="</table>";
if(isset($_REQUEST["name"]))
{more();}
function more()
{
	global $free;
	echo $free;
}
?>
			</div>
			</div>
<?php include("footer.php") ?>	