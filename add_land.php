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
<form action="leveranciers compleet.php" method = "POST">
        <textarea id="searchtype" name="searchtype"  rows="2" pattern="[A-Za-z]{2}"required></textarea>
        <input type="submit" name = "add"  >
        </form>
</body>
</html>