
<?php
$conn->query("drop table search_db;");
$sql = "create table search_db
(
query varchar(100) primary key,
description varchar(500),
url varchar(200)
);";
if ($conn->query($sql) === TRUE) {
   //echo "table created successfully<br />";
}
else {echo "Error: " . $sql . "<br>" . $conn->error;}
$sql ="insert into search_db (query,description,url) values ('home index or  page','HOME PAGE','index.html')";
$conn->query($sql);

$sql ="insert into search_db (query,description,url) values ('view or analyse result staff wise','you can view the student data in staff wise using year and branch','view_staff_wise.php')";
$conn->query($sql);

$sql ="insert into search_db (query,description,url) values ('view or analyse result course wise','you can view the student data in course wise using year and branch','view_course_wise.php')";
$conn->query($sql);

$sql ="insert into search_db (query,description,url) values ('view or analyse result subject wise','you can view the student data in subject wise using year and branch','view_sub_wise.php')";
$conn->query($sql);

$sql ="insert into search_db (query,description,url) values ('upload student database','you can upload the student data base in various format.VIZ,xls,xlsx,csv in a pre defined format','upload.php')";
$conn->query($sql);

$sql ="insert into search_db (query,description,url) values ('Download data base','you can download a data base in a pre defined format','download.php')";
$conn->query($sql);
?>