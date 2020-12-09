<?php

  $servername = "localhost";
  $databasename = "database2";
  $username = "root";
  $password = "";

  //connectie
  $conn = new mysqli($servername, $username, $password, $databasename);

  //check
  if ($conn->connect_error) {
    die ("Connection failed..");
  }

 ?>
