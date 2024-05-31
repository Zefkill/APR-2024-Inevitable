<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<header>
    <?php require_once("nav.html");?>
</header>

<body>
    <h2>Bedankt voor uw klacht!</h2>
    <?php
    // Verkrijg en toon de ingediende gegevens
    // if(isset($_POST("exampleform")));
    $naam = $_POST['naam'];
    $telefoonnummer = $_POST['telefoonnummer'];
    $postcode = $_POST['postcode'];
    $geslacht = $_POST['geslacht'];
    $klacht = $_POST['klacht'];
    
    echo "<p>Naam: $naam</p>";
    echo "<p>Telefoonnummer: $telefoonnummer</p>";
    echo "<p>Postcode: $postcode</p>";
    echo "<p>Geslacht: $geslacht</p>";
    echo "<p>Klacht: $klacht</p>";
    ?>

<footer>
    <p>&copy; 2024 Inevitable Computers - Alle rechten voorbehouden.</p>
  </footer>
</body>
</html>