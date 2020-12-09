<?php

require("dbh.inc.php");

if (isset($_POST['submit'])) {
  $rArtist = $_POST['rArtist'];
  $rTitle = $_POST['rTitle'];
  $artist = $_POST['artist'];
  $title = $_POST['title'];

    $query = mysqli_query($conn, "SELECT * FROM songs WHERE artist='$rArtist' && title='$rTitle'");
    if(mysqli_num_rows($query) > 0) {
      $sql = "UPDATE songs SET artist='$artist', title='$title' WHERE artist='$rArtist' && title='$rTitle'";
      mysqli_query($conn, $sql);
      header("location:index.php");
    } else {
      echo "Combination of artist and song doesn't exist.";
    }
}


 ?>
