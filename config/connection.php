<?php 
//create connection
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "customer_care";

//connect with data base mysql
$conn = mysqli_connect($servername,$username,$password,$dbname);
if(!$conn)
{ 
	die('could not connect'.mysqli_error());
	
}

?>