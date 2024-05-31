<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bevestiging toevoegen product</title>
</head>
<body>
    <?php
        // Annuleer knop is ingedrukt, terug sturen naar het menu (index-pagina)
        if(isset($_POST["AnnulProduct"]))
        {
            echo "<h2>De toevoeg-actie wordt nu afgebroken.</h2>";
            header('Refresh: 3; url=index.php');
            exit();
        }

        // Niet op annuleren gedrukt, maar ook niet op "Voeg toe", dan hoort er geen
        // toegang te zijn tot dit programma. Foutboodschap en terug naar menu.
        if(!isset($_POST["AddProduct"]))
        {
            echo "<h2>Niet geautoriseerde toegang.</h2>";
            header('Refresh: 3; url=index.php');
            exit();
        }

        require_once("dbconnect.php");
        // Controle uitvoeren: Brouwer mag niet voorkomen in de tabel.
        $readProduct = $dbconn->prepare("SELECT * FROM supplier 
                                        WHERE company = :companyname");
        $readProduct->bindValue("productname", $_POST["Productname"]);
        $readProduct->execute();

        if($readProduct->rowCount() > 0)
        {
            echo "<h2>Naam van de leverancier komt al voor in de database.</h2>";
            header('Refresh: 3; url=add-product.php');
            exit();
        }
    ?>

    <form action="add-product3.php" method="post">
        <label for="Productname2">Naam van de leverancier</label>
        <input type="text" name="Productname2" value="<?php echo $_POST["Productname"];?>" ><br>
        <label for="country2">Land van vestiging</label>
        <input type="text" name="country2" value=<?php echo $_POST["country"]; ?> ><br><br>
        <input type="submit" value="Annuleer" name="AnnulProduct2">
        <input type="submit" value="Ja dat klopt" name="AddProduct2" >
    </form>


</body>
</html>