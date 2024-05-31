<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klacht Formelier</title>
    <link rel="stylesheet" href="style.css">
</head>

<header>
    <?php require_once("nav.html");?>
</header>
<body>
    <h2>Klachtenformulier</h2>
    
    <form action="klachtGeleverdProduct.php" method="POST">
        <label for="naam">Naam:</label><br>
        <input type="text" id="naam" name="naam" required><br><br>
        
        <label for="telefoonnummer">Telefoonnummer:</label><br>
        <input type="tel" id="telefoonnummer" name="telefoonnummer" pattern="[0-9]{10}" required><br><br>
        
        <label for="postcode">Postcode:</label><br>
        <input type="text" id="postcode" name="postcode" pattern="[0-9]{4}[A-Za-z]{2}" required><br><br>
        
        <label for="geslacht">Geslacht:</label><br>
        <input type="radio" id="man" name="geslacht" value="Man" required>
        <label for="man">Man</label>
        <input type="radio" id="vrouw" name="geslacht" value="Vrouw" required>
        <label for="vrouw">Vrouw</label><br><br>

        <label for="datum">Datum levering</label>
        <input type="date" id="date" name="date1" max="<?php echo(date('Y-m-d')); ?>" required><br><br>
       
        <label for="klacht">Beschrijf uw klacht:</label><br>
        <textarea id="klacht" name="klacht" rows="4" required></textarea><br><br>

        <input type="submit" value="Versturen" >
    </form>

    <footer>
    <p>&copy; 2024 Inevitable Computers - Alle rechten voorbehouden.</p>
  </footer>
</body>
</html>