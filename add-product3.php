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
        if(isset($_POST["AnnulProduct2"]))
        {
            echo "<h2>De toevoeg-actie wordt nu afgebroken.</h2>";
            header('Refresh: 3; url=add-Product.php');
            exit();
        }

        // Niet op annuleren gedrukt, maar ook niet op "Voeg toe", dan hoort er geen
        // toegang te zijn tot dit programma. Foutboodschap en terug naar menu.
        if(!isset($_POST["AddProduct2"]))
        {
            echo "<h2>Niet geautoriseerde toegang.</h2>";
            header('Refresh: 3; url=index.php');
            exit();
        }

        require_once("dbconnect.php");
        // Controle uitvoeren: Brouwer mag niet voorkomen in de tabel.
        $insrtProduct = $dbconn->prepare("INSERT INTO `supplier`(`name`, `country`) 
                                        VALUES (:suppliername, :countryabbr)");
        $insrtProduct->bindValue("Productname", $_POST["Productname2"]);
        $insrtProduct->bindValue("countryabbr", $_POST["country2"]);
        $insrtProduct->execute();

        echo "<h2>De product is toegevoegd.</h2>";
        header('Refresh: 3; url=add-product.php');
        exit();

    ?>
    
</body>
</html>