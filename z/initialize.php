<?php
include("std_detail.php");//sudent_details
include("db.php");
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
}
include("sdba/subject.php");//subjects
include("sdba/staff.php");//staff_details
include("sdba/admin_ins.php");//login
include("sdba/search_db.php");//search_db
include("sdba/note_db.php");//notes
$sql = "create table feedback
(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(20)NOT NULL,
msg VARCHAR(2000) NOT NULL
);";
$conn->query($sql);
$conn->close();
echo "<script>
			alert('completed');
			history.go(-1);
	</script>";	
?>