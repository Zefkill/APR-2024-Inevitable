<?php
require_once("dbconnect.php");?>
<header>
    <?php require_once("nav.html");?>
</header>
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
            <th>betaald bedrag</th>
            <th>datum betaald</th>
            <th>bezorg datum</th>
            <th>klantennummer</th>


               
                
            </tr>
        </thead>
        <tbody>
            <?php 
        try {    
           $query = "SELECT * From purchase  ";
           $get_orders =  $dbconn->prepare($query);
           $get_orders->execute();
           $orders = $get_orders->fetchAll();
           if($orders){
            foreach($orders as $order){
               ?>
               <tr>
               <td><?=$order["id"]?></td>
               <td><?=$order["purchasedate"]?></td>
               <td><?=$order["paidamount"]?></td>
               <td><?=$order["paidinfulldate"]?></td>
               <td><?=$order["deliverydate"]?></td>
                <td><?=$order["clientid"]?></td>
                


               </tr>
               <?php
            }
           }
        }catch(PDOExeption $e){
                echo "HET LOOPT FOUT" . $e->getMessage();}
        
            ?>
        </tbody>
    </table>
    <footer>
    <p>&copy; 2024 Inevitable Computers - Alle rechten voorbehouden.</p>
  </footer>
</body>
</html>