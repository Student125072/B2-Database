<?php

  //variabelen voor database informatie
  $servername = "localhost";
  $databasename = "database2";
  $username = "root";
  $password = "";

  //connectie maken
  $conn = new mysqli($servername, $username, $password, $databasename);

  //connectie checken, zonder een succesvolle aan te geven
  if ($conn->connect_error) {
    die("Connection failed: " .$conn->connect_error);
  }

 ?>
