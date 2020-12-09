<?php


$servername = "localhost";
$databasename = "database2";
$username = "root";
$password = "";


// create connection
$conn = new mysqli($servername, $username, $password, $databasename);

// check connection
if ($conn->connect_error) {
  die("Connection failed: ". $conn->connect_error);
}











 ?>
