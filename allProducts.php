<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <?php 
    require_once("dbconnect.php");
    require_once("nav.html");?>
</header>

<form method="GET" action="">
    <label for="supplier">Filter by Supplier:</label>
    <input type="text" name="supplier" id="supplier" value="<?= isset($_GET['supplier']) ? htmlspecialchars($_GET['supplier']) : '' ?>">
    <button type="submit">Filter</button>
</form>

<table>
    <thead>
        <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Product Description</th>
            <th>Supplier</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        try {    
            $query = "SELECT p.name, p.price, p.description, s.company 
                      FROM product p 
                      JOIN supplier s ON p.id = s.id";
            
            if (isset($_GET['supplier']) && !empty($_GET['supplier'])) {
                $supplier_name = '%' . $_GET['supplier'] . '%';
                $query .= " WHERE s.company LIKE :supplier_name";
                $get_planes = $dbconn->prepare($query);
                $get_planes->bindParam(':supplier_name', $supplier_name, PDO::PARAM_STR);
            } else {
                $get_planes = $dbconn->prepare($query);
            }

            $get_planes->execute();
            $planes = $get_planes->fetchAll();
            if($planes){
                foreach($planes as $plane){
                ?>
                <tr>
                    <td><?=$plane["name"]?></td>
                    <td><?=$plane["price"]?></td>
                    <td><?=$plane["description"]?></td>
                    <td><?=$plane["company"]?></td>
                </tr>
                <?php
                }
            }
        } catch(PDOException $e) {
            echo "IETS WERKT NIET HEEEEEEEEELP >:( " . $e->getMessage();
        }
        ?>
    </tbody>
</table>
</body>
</html>
