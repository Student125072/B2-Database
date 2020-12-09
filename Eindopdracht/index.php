<?php include ("includes/connection.php") ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/master.css">
    <title>Verjaardagen</title>
  </head>
  <body>

    <form id="invoer" method="post">
      <input type="text" name="voornaam" placeholder="Voornaam...">
      <input type="text" name="achternaam" placeholder="Achternaam...">
      <input type="date" name="geboortedatum">
      <button type="submit" name="add">Toevoegen</button>
      <button type="submit" name="reset">Reset tabel</button>
    </form>

    <?php


      if(isset($_POST['add'])) {
        $voornaam = $_POST['voornaam'];
        $achternaam = $_POST['achternaam'];
        $geboortedatum = $_POST['geboortedatum'];

        $query = "INSERT INTO verjaardagen (voornaam, achternaam, geboortedatum) values ('$voornaam', '$achternaam', '$geboortedatum')";
        mysqli_query($conn, $query);

        header("location: index.php");
      }

        if (isset($_POST['reset'])) {
          $delete = "DELETE FROM verjaardagen WHERE 1";
          mysqli_query($conn, $delete);
          header("location: index.php");
        }

     ?>

     <?php
     // TABEL UITPRINTEN
     $sql = "SELECT voornaam, achternaam, geboortedatum FROM verjaardagen";
     $result = $conn->query($sql);

     $query = "SELECT geboortedatum FROM verjaardagen";
     $resultaat = mysqli_query($conn, $query);

     if ($result->num_rows > 0) {
         echo "<table id='bday'><tr><th>Voornaam</th><th>Achternaam</th><th>Geboortedatum</th><th>Leeftijd</th></tr>";

         // DATA VAN ELKE RIJ UITPRINTEN
         while($row = $result->fetch_assoc()) {
           $jaar = $row['geboortedatum'];
           $van = new DateTime($jaar);
           $naar = new DateTime('today');
           $leeftijd = $van->diff($naar)->y;

             echo "<tr><td>".$row["voornaam"]."</td><td>".$row["achternaam"]."</td><td>".$row["geboortedatum"]."</td><td>".$leeftijd."</td></tr>";
         }
         echo "</table>";
     } else {
         echo "Er zijn geen verjaardagen ingevoerd.";
     }


     $conn->close();
      ?>





  </body>
</html>
