<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    require_once("nav.html");
    ?>
<br>
<form action="resultaatzoek.php" method = "POST">
        <textarea id="searchtype" name="searchtype"  rows="1" required></textarea>
        <input type="submit" name = "search" value="zoeken" >
        </form>
</body>
</html>