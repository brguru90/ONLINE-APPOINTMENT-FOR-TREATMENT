<?php
include("db.php");
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
}
/*
if ($conn->query($sql) === TRUE)
		{
			echo "ok";
		} 
		else 
		{
			echo "Error: " . $sql . "<br>" . $conn->error;
			
		}
*/
?>

<center>
			
		<h2 style="text-decoration:underline;color:lime;font-family:guru9">Notifications</h2><br />
			<ul>
				<marquee  style='height:175px;width:90%;word-wrap:break-word' onmouseover="this.stop()" onmouseout="this.start()" scrollamount="1" scrolldelay="2" direction="down">
				<?php
				$sql="select * from notes order by id";
				$result=$conn->query($sql);
				if ($result->num_rows > 0) 
				{
					// output data of each row
					while($row = $result->fetch_assoc()) 
					{
						echo "<li><a href='".$row['link']."'>".$row['note']."</a></li>";
					}
				}
				?>
				</marquee>
		</ul>
</center>