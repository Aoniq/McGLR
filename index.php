<?php
session_start();

// Controleer of het bestelnummer al is ingesteld in de sessie
if (!isset($_SESSION['bestelnummer'])) {
    // Als het bestelnummer nog niet is ingesteld, genereer een nieuw bestelnummer
    $randomNumber = rand(1, 9999);
    $_SESSION['bestelnummer'] = $randomNumber;
}

ini_set('display_errors', 1);
include_once('config.php');

// Connect to database
$db = new SQLite3("./dbMacMedia.db");
$db->busyTimeout(5000);

// Create query and execute query
$query = "SELECT * FROM snacks";
$result = $db->query($query);

$bestelNummer = $_SESSION['bestelnummer'];

$bestelQuery = "SELECT * FROM bestellingen WHERE bestelnummer = ?";
$stmt = $connection->prepare($bestelQuery);
$stmt->bind_param("s", $_SESSION['bestelnummer']);
$stmt->execute();
$result = $stmt->get_result(); // Haal het resultaat op
$stmt->close();

// Variabelen voor totaal aantal en totaal prijs
$totaalAantal = 0;
$totaalPrijs = 0;

// Verwerk het resultaat
while ($row = $result->fetch_assoc()) {
    $aantal = $row['aantal'];
    $prijs = $row['prijs'];
    
    // Totaal aantal en totaal prijs bijwerken
    $totaalAantal += $aantal;
    $totaalPrijs += $prijs;
}

include_once('index_view.php');
?>
