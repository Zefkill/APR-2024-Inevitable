<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="#" method= "post">
        <input type="text" name= "selectPlace">
        <input type="submit" name= "execSelection" value= "Selecteer">
    </form>
    <?php
    require_once('dbconnect.php');
    if (isset($_POST["execSelection"]))
    {
        $selector = "%" . $_POST["selectPlace"] . "%";
    }
    else
    {
        $selector = "%%";
    }
 
    $readBar = $dbconn->prepare ("SELECT film.filmid, film.filmnaam, genre.genrenaam, film.releasejaar, film.regisseur, film.landherkomst, film.duur
                                    FROM film INNER JOIN genre ON film.genreid = genre.genreid
                                    WHERE film.filmnaam
                                    LIKE :selector");
 
    $readBar->bindValue("selector", $selector);
    $readBar->execute();
   
    $resultBars = $readBar->fetchAll(PDO::FETCH_ASSOC);
    ?>
 
    <table>
        <thead>
            <th>Film ID</th>
            <th>Film naam</th>
            <th>genrenaam</th>
            <th>releasejaar</th>
            <th>Regisseur</th>
            <th>landherkomst</th>
            <th>duur</th>
        </thead>
        <tbody>
 
        <?php
        foreach ($resultBars as $barData)
        {
            echo "<tr>";
            echo "<td>" . $barData["filmid"] . "</td>";
            echo "<td>" . $barData["filmnaam"] . "</td>";
            echo "<td>" . $barData["genrenaam"] . "</td>";
            echo "<td>" . $barData["releasejaar"] . "</td>";
            echo "<td>" . $barData["regisseur"] . "</td>";
            echo "<td>" . $barData["landherkomst"] . "</td>";
            echo "<td>" . $barData["duur"] . "</td>";
            echo "</tr>";
        }
       
       
        ?>
        </tbody>
    </table>
</body>
</html>