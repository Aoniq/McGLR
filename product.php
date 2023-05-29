<?php
$snackID = $_GET['snackID'];

$db = new SQLite3("./dbMacMedia.db");
$db->busyTimeout(5000);

$snackQuery = "SELECT * FROM snacks WHERE ID = $snackID";
$snackResult = $db->query($snackQuery);

if ($snackResult->numColumns() > 0) {
    // Er zijn resultaten gevonden
    $row = $snackResult->fetchArray(SQLITE3_ASSOC);
    
    // Haal de waarden op
    $id = $row['ID'];
    $name = $row['snackName'];
    $price = $row['snackPrice'];
    // ... haal andere gewenste kolommen op
    
    // Doe iets met de waarden, zoals afdrukken of verwerken
    include_once('product_view.php');
} else {
    // Geen resultaten gevonden
    echo "Geen resultaten gevonden.";
}

?>
