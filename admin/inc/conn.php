<?php
$severname=	"localhost";
$username= "root";
$pass="";
$dbname="sellpets";
$conn= mysqli_connect($severname, $username, $pass, $dbname);

if (!$conn) 
{
die( " connect is error: " .mysqli_connect_error());
} else{
	echo "";
}
?>