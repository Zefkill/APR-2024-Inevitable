<?php
require_once("dbconnect.php");

if(isset($_GET['country_filter']) && !empty($_GET['country_filter'])) {
    // Country filter is set, constructing SQL query with the specified country
    $country_filter = $_GET['country_filter'];
    $sql = "SELECT * FROM supplier WHERE country = '$country_filter'";
} else {
    // No country filter set, show all supplier
    $sql = "SELECT * FROM supplier";
}

// Executing the query
$result = $dbconn->query($sql);

// Checking for results
if ($result->num_rows > 0) {
    // Displaying results
    while($row = $result->fetch_assoc()) {
        echo "Name: " . $row["name"]. " - Country: " . $row["country"]. "<br>";
    }
} else {
    echo "No results found";
}

?>

