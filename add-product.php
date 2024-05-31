<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voeg product toe</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        include("nav.html");
    ?>
    <form action="add-product2.php" method="post">
        <label for="productname">Naam van de product</label>
        <input type="text" name="productname"><br>
        <label for="country">Land van vestiging</label>
        <input type="text" name="country"><br><br>
        <input type="submit" value="Annuleer" name="AnnulProduct">
        <input type="submit" value="Voeg toe" name="AddProduct" >
    </form>

</body>
</html>