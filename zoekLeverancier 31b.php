<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>leveranciers zoek op naam </title>

</head>

<body>
<?php
require_once("dbconnect.php");?>

    <form action="#" method="post">

        <label for="Name">naam</label>

        <input type="text" name="Name">

        <input type="submit" value="Selecteren" name="selectCityName">

    </form>



    <?php

        // Neem selectiecriterim over uit het formulier

        if (isset($_POST["selectCityName"]))

        {

            $selector = "%" . $_POST["Name"] . "%";

        }

        else

        { //Of vul het selectiecriterium met wildcards

            $selector = "%%";

        };



        // Met selector de gegevens in de tabel kroeg selecteren 

        $qrySelectsupplier = $dbconn->prepare("SELECT id, company, city FROM supplier

                                            WHERE company LIKE :selector");

        $qrySelectsupplier->bindValue("selector", $selector);

        $qrySelectsupplier->execute();

        $selectedsupplier = $qrySelectsupplier->fetchAll(PDO::FETCH_ASSOC);

        ?>



        <table>

            <thead>

                <th>leverancierid</th>

                <th>naam </th>

                <th>Plaatsnaam</th>

            </thead>

            <tbody>



        <?php

        foreach ($selectedsupplier as $supData)

        {


            echo "<tr>";
            echo "<td>" . $supData['id'] . "</td>";
            echo "<td>" . $supData['company'] . "</td>";
            echo "<td>" . $supData['city'] . "</td>";
            echo "</tr>";

        }




    ?>

    </tbody>

    </table>

</body>

</html>