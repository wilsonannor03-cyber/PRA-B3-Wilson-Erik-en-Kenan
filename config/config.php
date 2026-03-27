<?php

//IEDER VOOR ZICH:

#### TODO
//Hernoem dit bestand naar 'config.php' en vul jouw eigen database-gegevens in.
//Deze config wordt hierna _niet_ meegestuurd naar je groepsgenoten. Zo kan iedereen zijn eigen wachtwoord, etc. invullen.

$dbHost = 'localhost';
$dbName = 'takenlijst';
$dbUser = 'root';
$dbPass = '';

//De url waarop jouw project staat. Géén slash aan het einde.
$base_url = 'http://localhost/B3%20PRA%20project/PRA%20B3%20Wilson,%20Eric%20en%20Kenan/index.php';

try {
    $conn = new PDO("mysql:host=$dbHost;dbname=$dbName;charset=utf8", $dbUser, $dbPass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Database verbinding mislukt: " . $e->getMessage();
    exit;
}