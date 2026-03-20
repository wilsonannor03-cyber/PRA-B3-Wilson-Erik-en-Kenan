<?php
require_once 'config.php';

try {
    $conn = new PDO("mysql:host=$dbHost;dbname=$dbName;charset=utf8", $dbUser, $dbPass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $categorie = $_POST['categorie'] ?? '';
    $medewerker = $_POST['medewerker'] ?? '';
    $deadline = $_POST['deadline'] ?? '';

    if (empty($categorie) || empty($medewerker) || empty($deadline)) {
        throw new Exception("Vul alle velden in.");
    }

    $query = "INSERT INTO meldingen (categorie, medewerker, deadline)
              VALUES (:categorie, :medewerker, :deadline)";

    $statement = $conn->prepare($query);
    $statement->execute([
        ':categorie' => $categorie,
        ':medewerker' => $medewerker,
        ':deadline' => $deadline
    ]);

    echo "Melding succesvol toegevoegd!";

} catch (PDOException $e) {
    echo "Database fout: " . $e->getMessage();
} catch (Exception $e) {
    echo "Fout: " . $e->getMessage();
}
?>