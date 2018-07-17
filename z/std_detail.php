<?php
include("db.php");
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
}
$sql = "create table student_details_main
(
reg VARCHAR(10) NOT NULL,
name VARCHAR(50) NOT NULL,
sem VARCHAR(6) NOT NULL,
branch VARCHAR(50),
img VARCHAR(100),
ex1 INT,
ex2 INT,
ex3 INT,
ex4 INT,
ex5 INT,
ex6 INT,
ex7 INT,
ex8 INT,
ex9 INT,
ex_total INT,
ia1 INT,
ia2 INT,
ia3 INT,
ia4 INT,
ia5 INT,
ia6 INT,
ia7 INT,
ia8 INT,
ia9 INT,
ia_total INT,
total INT,
result varchar(4),
year VARCHAR(4),
month VARCHAR(10),
rd varchar(10)
);";
if ($conn->query($sql) === TRUE) {
   //echo "table created successfully<br />";
}
$sql = "create table student_details
(
reg VARCHAR(10) NOT NULL,
name VARCHAR(50) NOT NULL,
sem VARCHAR(6) NOT NULL,
branch VARCHAR(50),
img VARCHAR(100),
ex1 INT,
ex2 INT,
ex3 INT,
ex4 INT,
ex5 INT,
ex6 INT,
ex7 INT,
ex8 INT,
ex9 INT,
ex_total INT,
ia1 INT,
ia2 INT,
ia3 INT,
ia4 INT,
ia5 INT,
ia6 INT,
ia7 INT,
ia8 INT,
ia9 INT,
ia_total INT,
total INT,
result varchar(4),
year VARCHAR(4),
month VARCHAR(10),
rd varchar(10)
);";
if ($conn->query($sql) === TRUE) {
   //echo "table created successfully<br />";
}
$sql = "create table sem_details
	(
	reg VARCHAR(10) NOT NULL,
	sem VARCHAR(6) NOT NULL,
	branch VARCHAR(50),
	year VARCHAR(4),
	rd varchar(10)
	);";
	$conn->query($sql);
$conn->close();
?>