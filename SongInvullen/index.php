<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Favoriete song invullen</title>
  </head>
  <body>

    <form method="post">
      <label for="artist">Artiest:</label>
      <input autocomplete="off" type="text" name="artist">
      <label for="title">Titel:</label>
      <input autocomplete="off" type="text" name="title">
      <input type="submit" name="submit">
    </form>

    <?php
    if(isset($_POST['submit'])) {
      require_once('connection.php');

      $artist = $_POST['artist'];
      $title = $_POST['title'];

      $query = "INSERT INTO songs (artist, title) values ('$artist', '$title')";
      mysqli_query($conn, $query);
    }
     ?>




  </body>
</html>
