<?php include("includes/connection.php") ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Verlanglijst</title>
    <link rel="stylesheet" href="css/main.css">
  </head>
  <body>


    <form id="insert" method="post">
      <input type="text" name="product" placeholder="Productnaam">
      <input type="text" name="prijs" placeholder="Prijs">
      <input type="text" name="besch" placeholder="Omschrijving">
      <input type="text" name="waar" placeholder="Waar">
      <input type="text" name="site" placeholder="Link">
      <button type="submit" name="add">Toevoegen</button>
      <button type="submit" name="clear">Verwijder alles</button>
    </form>

    <?php

      if(isset($_POST['add'])) {

        $product = $_POST['product'];
        $prijs =  $_POST['prijs'];
        $omschrijving = $_POST['besch'];
        $waar = $_POST['waar'];
        $site =  $_POST['site'];

        $query = "INSERT INTO verlanglijst (product,prijs,omschrijving,waar,website) values ('$product', '$prijs', '$omschrijving', '$waar', '$site')";
        mysqli_query($conn, $query);
      }

      if(isset($_POST['clear'])) {
        $query = "DELETE FROM verlanglijst WHERE 1";
        mysqli_query($conn, $query);
      }


     ?>

    <?php
    error_reporting(0);

      $sql = "SELECT product, prijs, omschrijving, waar, website FROM verlanglijst";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        echo "<table><tr> <th>Product</th> <th>Prijs in €</th> <th>Omschrijving</th> <th>Waar te koop?</th> <th>Website</th> </tr>";
        // data van elke rij eronder printen
        while ($row = $result->fetch_assoc()) {
          echo "<tr><td>".$row["product"]."</td><td>".$row["prijs"]."</td><td>".$row["omschrijving"]."</td><td>".$row["waar"]."</td><td>".$row["website"]."</td>";
        }
        echo "</table>";
      } else {
        echo "<p style='text-align:center; margin-top:20px;'>Er staan geen dingen op je verlanglijst, voeg dingen toe via het formulier hier boven.</p>";
      }


     ?>

  </body>
</html>
