<?php
require_once("dbconnect.php");

if(isset($_POST["search"])){
    $search = $_POST["search"];
    
    // Zoek in zowel de categorieën als de producten
    $stmt = $dbconn->prepare("
        SELECT id, name, 'category' AS type FROM category WHERE name LIKE :search
        UNION
        SELECT id, name, 'product' AS type FROM product WHERE name LIKE :search
    ");
    $stmt->bindParam(':search', $searchParam);
    
    $searchParam = '%' . $search . '%';

    $stmt->execute();

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    foreach ($results as $row) {
        if ($row['type'] === 'category') {
            echo "Categorie ID: " . $row['id'] . ", Naam: " . $row['name'] . "<br>";
        } elseif ($row['type'] === 'product') {
            echo "Product ID: " . $row['id'] . ", Naam: " . $row['name'] . "<br>";
        }
    }
}
?>

