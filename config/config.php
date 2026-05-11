<?php

//IEDER VOOR ZICH:

#### TODO
//Hernoem dit bestand naar 'config.php' en vul jouw eigen database-gegevens in.
//Deze config wordt hierna _niet_ meegestuurd naar je groepsgenoten. Zo kan iedereen zijn eigen wachtwoord, etc. invullen.

$dbHost = 'strato';
$dbName = 'takenlijst';
$dbUser = 'dbu2010185';
$dbPass = 'kVVnkH6uM2APrF!';

//De url waarop jouw project staat. Géén slash aan het einde.
$base_url = 'http://praopdracht.test/PRA-B3-Wilson-Erik-en-Kenan/';

try {
    $conn = new PDO("mysql:host=$dbHost;dbname=$dbName;charset=utf8", $dbUser, $dbPass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Database verbinding mislukt: " . $e->getMessage();
    exit;
}