<?php
require_once("dbconnect.php");
require_once("nav.html");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>leverancier</th>
                <th>adres</th>
                <th>postcode</th>
                <th>stad</th>
                <th>land</th>
                <th>email</th>
                <th>domeinnaam</th>
                <th> telefoonnummer</th>
                
            </tr>
        </thead>
        <tbody>
            <?php 
        try {    
           $query = "SELECT * From supplier";
           $get_planes =  $dbconn->prepare($query);
           $get_planes->execute();
           $planes = $get_planes->fetchAll();
           if($planes){
            foreach($planes as $plane){
               ?>
               <tr>
                <td><?=$plane["id"]?></td>
                <td><?=$plane["company"]?></td>
                <td><?=$plane["streetaddress"]?></td>
                <td><?=$plane["zipcode"]?></td>
                <td><?=$plane["city"]?></td>
                <td><?=$plane["country"]?></td>
                <td><?=$plane["emailaddress"]?></td>
                <td><?=$plane["domain"]?></td>
                <td><?=$plane["telephonenumber"]?></td>


               </tr>
               <?php
            }
           }
        }catch(PDOExeption $e){
                echo "HET LOOPT FOUT" . $e->getMessage();}
        
            ?>
        </tbody>
    </table>
</body>
</html>