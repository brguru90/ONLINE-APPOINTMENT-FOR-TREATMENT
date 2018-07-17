<?php

$year='2014';
//$conn->query("drop table staff_details;");
$contents="";
//craete subject data
	$sql = "create table staff_details
	(
	id int(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	sub_order INT(1),
	subject VARCHAR(80),
	member VARCHAR(40) NOT NULL,
	branch VARCHAR(40) NOT NULL,
	sem VARCHAR(6) NOT NULL,
	year VARCHAR(6) NOT NULL
	);";
	if ($conn->query($sql) === TRUE) 
		{
			//echo "DB created";
		}
	$sql = "create table sub_details
	(
	id int(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	sem VARCHAR(6) NOT NULL,
	sub_order VARCHAR(5),
	sub_code VARCHAR(20),
	sub_name VARCHAR(80),
	staff_member VARCHAR(40) NOT NULL,
	branch VARCHAR(40) NOT NULL,
	year VARCHAR(6) NOT NULL
	);";
	if ($conn->query($sql) === TRUE) 
		{
			//echo "DB created";
		}
		/*
	$sql="select * from staff_details;";
	$result=$conn->query($sql);
	if ($result->num_rows < 1) 
	{
		$sql="insert into staff_details (sub_order,subject,member,branch,sem,year) values(4,'c-pgm','Nandan N','cs','2','$year')";$conn->query($sql);
		$sql="insert into staff_details (sub_order,subject,member,branch,sem,year) values(2,'JAVA','sayed Azmal','cs','5','$year')";$conn->query($sql);
		$sql="insert into staff_details (sub_order,subject,member,branch,sem,year) values(2'Data structure','Nandan N','cs','3','$year')";$conn->query($sql);
		$sql="insert into staff_details (sub_order,subject,member,branch,sem,year) values(3,'web pgm','Nandan N','cs','5','$year')";$conn->query($sql);
		$sql="insert into staff_details (sub_order,subject,member,branch,sem,year) values(4,'ICC','Deepa','cs','1','$year')";$conn->query($sql);
		$sql="insert into staff_details (sub_order,subject,member,branch,sem,year) values(3,'OS','Deepa','cs','4','$year')";$conn->query($sql);
		$sql="insert into staff_details (sub_order,subject,member,branch,sem,year) values(5,'DE','Latha','cs','2','$year')";$conn->query($sql);
		$sql="insert into staff_details (sub_order,subject,member,branch,sem,year) values(1,'OOP with C++','malthesha','cs','4','$year')";$conn->query($sql);
		$sql="insert into staff_details (sub_order,subject,member,branch,sem,year) values(2,'DBMS','Nandan N','cs','4','$year')";$conn->query($sql);
		$sql="insert into staff_details (sub_order,subject,member,branch,sem,year) values(4,'SE','Shwetha','cs','4','$year')";$conn->query($sql);
		
		$sql="insert into staff_details (sub_order,subject,member,branch,sem,year) values(5,'DE','Latha','cs','2','$year')";$conn->query($sql);
	}
	*/
	
?>