<?php
include "connection.php";
$user = $_POST['user'];
$pwd = $_POST['pwd'];


$query = "use lab;";
$resultQuery = mysqli_query($handler,$query);

$query1 = "create table userlogin(username varchar(15),password char(6));";
$resultTable = mysqli_query($handler,$query1);
if($resultTable)
echo "table created"."<br>";
else
echo "table not created "."<br>";


$query2 = "insert into userlogin values('$user','$pwd');";
$resultInsert = mysqli_query($handler,$query2);
if($resultInsert)
echo "values inserted";
else
echo "values not inserted";


$query3 = "select *from userlogin;";
$resultSelect = mysqli_query($handler,$query3);

$rowcheck = mysqli_num_rows($resultSelect);
if($rowcheck>0)
{
	while($record = mysqli_fetch_assoc($resultSelect))
	{
		echo $record['username']." ".$record['password']."<br>";
	}
}
$query4 = "delete from userlogin where username=\"cse1\";";
$resultDelete = mysqli_query($handler,$query4);
if($resultDelete)
echo "record deleted successfully";
else
echo "error:".$query4." ".mysqli_error($handler);
?>