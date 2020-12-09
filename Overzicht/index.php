<?php require ('includes/dbh.inc.php'); ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Overzicht Songs</title>
    <style>
    #changing {
      margin-top: 150px;
    }
      input, label{
        display: block;
      }
      input {
        border: 2px solid black;
        border-radius: 5px;
      }
      button {
        margin-top: 10px;
      }
      #clear {
        float: left;
        margin: 20px;
      }
    </style>
  </head>
  <body>


  <?php

    $sql = "SELECT id, artist, title FROM songs";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table><tr><th>Artist</th><th>Title</th></tr>";
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>".$row["artist"]."</td><td>".$row["title"]."</td></tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }

  $conn->close();

   ?>

   <?php require_once('includes/update.php') ?>

   <form id="changing" method="post">
     <label for="rArtist">Te Vervangen Artiest:</label>
     <input autocomplete="off" type="text" name="rArtist">
     <label for="rTitle">Te Vervangen Nummer:</label>
     <input autocomplete="off" type="text" name="rTitle">
     <label for="artist">Artiest:</label>
     <input autocomplete="off" type="text" name="artist" value="">
     <label for="title">Titel:</label>
     <input autocomplete="off" type="text" name="title">
     <button type="submit" name="submit">Verzenden</button>
   </form>

   <a href="/Database%202/SongInvullen/index.php">Voeg hier nummers toe.</a>

  </body>
</html>
