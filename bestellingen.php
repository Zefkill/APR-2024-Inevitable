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
            <th>orderdatum</th>
            <th>klantennummer</th>
            </tr>
        </thead>
        <tbody>
            <?php 
        try {    
           $query = "SELECT * From purchase  ";
           $get_planes =  $dbconn->prepare($query);
           $get_planes->execute();
           $planes = $get_planes->fetchAll();
           if($planes){
            foreach($planes as $plane){
               ?>
               <tr>
               <td><?=$plane["id"]?></td>
               <td><?=$plane["purchasedate"]?></td>
                <td><?=$plane["clientid"]?></td>
                


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