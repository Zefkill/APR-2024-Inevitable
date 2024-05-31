<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Kroegen uit Plaats</title>

</head>

<body>

    <form action="#" method="post">

        <label for="placeName">Plaatsnaam</label>

        <input type="text" name="placeName">

        <input type="submit" value="Selecteren" name="selectCityName">

    </form>



    <?php

        // Neem selectiecriterim over uit het formulier

        if (isset($_POST["selectCityName"]))

        {

            $selector = "%" . $_POST["placeName"] . "%";

        }

        else

        { //Of vul het selectiecriterium met wildcards

            $selector = "%%";

        };



        // Met selector de gegevens in de tabel kroeg selecteren 

        $qrySelectBars = $dbconn->prepare("SELECT id, naam, plaats FROM kroeg

                                            WHERE plaats LIKE :selector");

        $qrySelectBars->bindValue("selector", $selector);

        $qrySelectBars->execute();

        $selectedBars = $qrySelectBars->fetchAll(PDO::FETCH_ASSOC);

        ?>



        <table>

            <thead>

                <th>leverancier</th>

                <th>Kroegnaam</th>

                <th>Plaatsnaam</th>

            </thead>

            <tbody>



        <?php

        foreach ($selectedBars as $barData)

        {

            echo "<tr>";

            echo "<td>$barData["id"]</td>";

            echo "<td>$barData["naam"]</td>";

            echo "<td>$barData["plaats"]</td>";

            echo "</tr>";

        }




    ?>

    </tbody>

    </table>

</body>

</html>