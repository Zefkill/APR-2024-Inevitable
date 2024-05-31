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
                <th>product</th>
                <th>prijs</th>
               
                
            </tr>
        </thead>
        <tbody>
            <?php 
        try {    
           $query = "SELECT * From product WHERE categoryid= 10";
           $get_products =  $dbconn->prepare($query);
           $get_products->execute();
           $products = $get_products->fetchAll();
           if($pproducts){
            foreach($products as $product){
               ?>
               <tr>
                <td><?=$product["name"]?></td>
                <td><?=$product["price"]?></td>
                


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