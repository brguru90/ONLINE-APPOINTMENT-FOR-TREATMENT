<?php
$sql = "create table notes
(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
note VARCHAR(767) NOT NULL UNIQUE,
link varchar(500) default '#'
);";
$conn->query($sql);
$conn->query('insert into notes (note,link) values ("guru","#");');
$conn->query('insert into notes (note,link) values ("about","about.php");');
$conn->query('insert into notes (note,link) values ("VIEW","view.php");');
$conn->query('insert into notes (note,link) values ("download","download.php");');
$conn->query('insert into notes (note,link) values ("upload","upload.php");');
?>