<?php

session_start();

ini_set('display_errors', 1);
include_once('config.php');

if (!isset($_SESSION['bestelnummer'])) {
    // Als het bestelnummer nog niet is ingesteld, genereer een nieuw bestelnummer
    $randomNumber = rand(1, 9999);
    $_SESSION['bestelnummer'] = $randomNumber;
}

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

include_once('afreken_view.php')
?>