<?php
//$conn->query("drop table subjects;");
$sql = "create table subjects
(
id INT(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
branch VARCHAR(40),
sem INT,
year INT(4),
sub1 VARCHAR(80),
sub2 VARCHAR(80),
sub3 VARCHAR(80),
sub4 VARCHAR(80),
sub5 VARCHAR(80),
sub6 VARCHAR(80),
sub7 VARCHAR(80)
);";
if ($conn->query($sql) === TRUE)
{
  // echo "inserted<br />";
}
/*
	$sql="select * from subjects;";
	$result=$conn->query($sql);
	if ($result->num_rows < 1) 
	{
		$sql="insert into subjects (branch,sem,year,sub1,sub2,sub3,sub4,sub5,sub6,sub7) values('cs',1,2014,'Applied Mathematics - I','Applied Science','Concepts of  Electrical & Electronic Engineering','Introduction to Computer Concepts','Applied Science Lab','Basic Electronics lab','Basic Computer Skills lab');";
		if ($conn->query($sql) === TRUE) {}
		$sql="insert into subjects (branch,sem,year,sub1,sub2,sub3,sub4,sub5,sub6,sub7) values('cs',2,2014,'Applied Mathematics-II','English Communication','Digital Electronics','Programming with  C','Digital Lab','Programming with C Lab','Multimedia  Lab');";
		if ($conn->query($sql) === TRUE) {}
		$sql="insert into subjects (branch,sem,year,sub1,sub2,sub3,sub4,sub5,sub6,sub7) values('cs',3,2014,'Computer Organisation','Data Structures Using C','Computer Networks','Data Structures lab','PC Hardware and Networking lab','Web Design lab','');";
		if ($conn->query($sql) === TRUE) {}
		$sql="insert into subjects (branch,sem,year,sub1,sub2,sub3,sub4,sub5,sub6,sub7) values('cs',4,2014,'OOP with C++','Database Management Systems','Operating System','Software Engineering','OOP with C++ lab','DBMS lab','Linux lab');";
		if ($conn->query($sql) === TRUE) {}
		$sql="insert into subjects (branch,sem,year,sub1,sub2,sub3,sub4,sub5,sub6,sub7) values('cs',5,2014,'Basic Management  Skills and Indian Constitution.','Programming with Java','Web Programming','Programming with Java Lab','Web Programming Lab','CASP','Project work - I');";
		if ($conn->query($sql) === TRUE) {}
		$sql="insert into subjects (branch,sem,year,sub1,sub2,sub3,sub4,sub5,sub6,sub7) values('cs',6,2014,'Software Testing','Network Security and Management','Mobile Computing','Software Testing Lab','Network Security Lab','Project Work - II','');";
		if ($conn->query($sql) === TRUE) {}
		else{
			//echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
*/
?>