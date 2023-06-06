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

// Check of er een POST-verzoek is verzonden
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Controleer of de pincode en bestelnummer zijn verzonden
    if (isset($_POST['pin']) && isset($_SESSION['bestelnummer'])) {
        $pin = $_POST['pin'];
        $bestelnummer = $_SESSION['bestelnummer'];

        // Markeer de items als betaald in de database
        $updateQuery = "UPDATE bestellingen SET betaald = 1 WHERE bestelnummer = ?";
        $stmt = $connection->prepare($updateQuery);
        $stmt->bind_param("s", $bestelnummer);
        $stmt->execute();
        $stmt->close();

        // Stuur de gebruiker terug naar index.php of een andere gewenste bestemming
        header("Location: index.php");
        session_destroy();
        exit();
    }
}

include_once('afreken_view.php');
?>
