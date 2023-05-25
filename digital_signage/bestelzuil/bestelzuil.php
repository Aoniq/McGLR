<?php 
require_once "config.inc.php";

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);

header("Content-Type: application/json"); 
  
$data = json_decode(file_get_contents("php://input")); 
  
$bestelnummer = intval($data->bestelnummer);

if (isset($data->product)){
	//dit is een bestelling
	if ($bestelnummer == 0){
		//bepaal het opvolgende nieuwe bestelnummer
		$sql = "SELECT max(bestelnummer) as max FROM bestellingen";
		$result = mysqli_query($mysqli, $sql);
		if ($result != false){
			while($row = mysqli_fetch_array($result)) {	
				$max = intval($row['max']);
			}
		}
		$bestelnummer = $max+1;
	}

	$sql = "INSERT INTO bestellingen (bestelnummer, productnaam, aantal, prijs) VALUES (".$bestelnummer.",'".$data->product."',".$data->aantal.",".$data->prijs.")"; 
				
	$result = mysqli_query($mysqli, $sql); 
	
	echo $bestelnummer;
}
else {
	//dit is een betaling
	$sql = "UPDATE bestellingen SET betaald= 1 WHERE bestelnummer = ". $bestelnummer;
	$result = mysqli_query($mysqli, $sql); 
	echo "OK";
}
?> 