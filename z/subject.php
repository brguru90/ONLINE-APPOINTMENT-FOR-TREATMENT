
<?php
include("db.php");
// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE $dbname";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully<br />";
}
$conn->close();
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
}
//$conn->query("drop table subjects;");
$sql = "create table subjects
(
id INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
branch VARCHAR(40),
sem INT,
sub1 VARCHAR(50),
sub2 VARCHAR(50),
sub3 VARCHAR(50),
sub4 VARCHAR(50),
sub5 VARCHAR(50),
sub6 VARCHAR(50),
sub7 VARCHAR(50)
);";
if ($conn->query($sql) === TRUE)
{
  // echo "inserted<br />";
}
$sql="insert into subjects (branch,sem,sub1,sub2,sub3,sub4,sub5,sub6,sub7) values('cs',1,'Applied Mathematics - I','Applied Science','Concepts of  Electrical & Electronic Engineering','Introduction to Computer Concepts','Applied Science Lab','Basic Electronics lab','Basic Computer Skills lab');";
if ($conn->query($sql) === TRUE) {}
$sql="insert into subjects (branch,sem,sub1,sub2,sub3,sub4,sub5,sub6,sub7) values('cs',2,'Applied Mathematics-II','English Communication','Digital Electronics','Programming with  C','Digital Lab','Programming with C Lab','Multimedia  Lab');";
if ($conn->query($sql) === TRUE) {}
$sql="insert into subjects (branch,sem,sub1,sub2,sub3,sub4,sub5,sub6,sub7) values('cs',3,'Computer Organisation','Data Structures Using C','Computer Networks','Data Structures lab','PC Hardware and Networking lab','Web Design lab','');";
if ($conn->query($sql) === TRUE) {}
$sql="insert into subjects (branch,sem,sub1,sub2,sub3,sub4,sub5,sub6,sub7) values('cs',4,'OOP with C++','Database Management Systems','Operating System','Software Engineering','OOP with C++ lab','DBMS lab','Linux lab');";
if ($conn->query($sql) === TRUE) {}
$sql="insert into subjects (branch,sem,sub1,sub2,sub3,sub4,sub5,sub6,sub7) values('cs',5,'Basic Management  Skills and Indian Constitution.','Programming with Java','Web Programming','Programming with Java Lab','Web Programming Lab','CASP','Project Work – I*');";
if ($conn->query($sql) === TRUE) {}
$sql="insert into subjects (branch,sem,sub1,sub2,sub3,sub4,sub5,sub6,sub7) values('cs',6,'Software Testing','Network Security and Management','Mobile Computing','Software Testing Lab','Network Security Lab','Project Work-II','');";
if ($conn->query($sql) === TRUE) {}
else{
	//echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>