<?php

  // connectie informatie
  $servername = "localhost";
  $databasename = "database2";
  $username = "root";
  $password = "";

  // connectie maken
  $conn = new mysqli($servername, $username, $password, $databasename);

  // check de connectie
  if ($conn->connect_error) {
    die ("Connection failed: " . $conn->connect_error);
  }
  else {
    header("Location: /Database%202/Overzicht/");
  }






 ?>
