<?php
require_once 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $conn = new PDO("mysql:host=$dbHost;dbname=$dbName;charset=utf8", $dbUser, $dbPass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $categorie = $_POST['categorie'] ?? '';
        $medewerker = $_POST['medewerker'] ?? '';
        $beschrijving = $_POST['beschrijving'] ?? '';
        $deadline = $_POST['deadline'] ?? '';

        if (empty($categorie) || empty($medewerker) || empty($beschrijving) || empty($deadline)) {
            throw new Exception("Vul alle velden in.");
        }

        $query = "INSERT INTO meldingen (categorie, medewerker, beschrijving, deadline)
                  VALUES (:categorie, :medewerker, :beschrijving, :deadline)";

        $statement = $conn->prepare($query);
        $statement->execute([
            ':categorie' => $categorie,
            ':medewerker' => $medewerker,
            ':beschrijving' => $beschrijving,
            ':deadline' => $deadline
        ]);

        echo "Melding succesvol toegevoegd!";

    } catch (PDOException $e) {
        echo "Database fout: " . $e->getMessage();
    } catch (Exception $e) {
        echo "Fout: " . $e->getMessage();
    }
}
?>