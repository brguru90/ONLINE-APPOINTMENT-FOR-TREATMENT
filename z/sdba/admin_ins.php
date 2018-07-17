<?php
$sql = "create table login
(
name VARCHAR(20) NOT NULL,
user VARCHAR(20) UNIQUE,
pwd VARCHAR(20) NOT NULL,
email VARCHAR(20) UNIQUE NOT NULL,
images VARCHAR(200),
phno DECIMAL(12) NOT NULL,
status  varchar(20)
);";
$conn->query($sql);
$sql="insert into login (name,user,pwd,email,images,phno,status) values('gajanana','gaja','1234','gajap143@gmail.com','img/default.png',1234567890,'deactivated');";
$conn->query($sql);
$sql="insert into login (name,user,pwd,email,images,phno,status) values('guruprasad','guru','9611','brguru90@gmail.com','img/default.png',9482399078,'activated');";
$conn->query($sql);
$sql="insert into login (name,user,pwd,email,images,phno,status) values('sathyanarayana','sathya','1234','sathyanarayanasathish@gmail.com','img/default.png',7760751566,'deactivated');";
$conn->query($sql);
$sql="insert into login (name,user,pwd,email,images,phno,status) values('sunil kumar sp','suni','1234','sunisp3@gmail.com','img/default.png',9480395416,'deactivated');";
$conn->query($sql);
$sql="insert into login (name,user,pwd,email,images,phno,status) values('jnanasudar','sundar','1234','jnanasudar00@gmail.com','img/default.png',7760076647,'deactivated');";
$conn->query($sql);
?>