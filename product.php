<?php
ini_set('display_errors', 1);

session_start();

include_once('config.php');

// Sla de bestelgegevens op in een database of een andere opslagmethode
$randomNumber = rand(1, 9999);
// Genereer een uniek bestelnummer en sla het op in de sessie
if (!isset($_SESSION['bestelnummer'])) {
    $_SESSION['bestelnummer'] = $randomNumber;
}

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
    
    if (isset($_POST['bestel'])) {
        $aantal = $_POST['aantal'];
        $totaalPrijs = $aantal * $price;

        $zoekQuery = "SELECT * FROM bestellingen WHERE productnaam = ? AND bestelnummer = ?";
        $stmt = $connection->prepare($zoekQuery);
        $stmt->bind_param("ss", $name, $_SESSION['bestelnummer']);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            // Product is al aanwezig in de bestellingen database met het bestelnummer van de sessie
            $row = $result->fetch_assoc();
            $oudeAantal = $row['aantal'];
            $oudeTotaalPrijs = $row['prijs'];

            $aantal += $oudeAantal;
            $totaalPrijs += $oudeTotaalPrijs;
            
            $updateQuery = "UPDATE bestellingen SET aantal = ?, prijs = ? WHERE productnaam = ? AND bestelnummer = ?";
            $stmt = $connection->prepare($updateQuery);
            $stmt->bind_param("ddss", $aantal, $totaalPrijs, $name, $_SESSION['bestelnummer']);
            $stmt->execute();
            $stmt->close();
        } else {
            // Product is nog niet aanwezig in de bestellingen database met het bestelnummer van de sessie
            $bestelQuery = "INSERT INTO bestellingen (bestelnummer, productnaam, aantal, prijs, betaald) VALUES (?, ?, ?, ?, 0)";
            $stmt = $connection->prepare($bestelQuery);
            $stmt->bind_param("ssdd", $_SESSION['bestelnummer'], $name, $aantal, $totaalPrijs);
            $stmt->execute();
            $stmt->close();
        }

        header("Location: index.php");
    }    

    // Doe iets met de waarden, zoals afdrukken of verwerken
    include_once('product_view.php');
} else {
    // Geen resultaten gevonden
    echo "Geen resultaten gevonden.";
}
?>
