<?php
require_once 'config.php';
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $conn = new PDO("mysql:host=$dbHost;dbname=$dbName;charset=utf8", $dbUser, $dbPass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
        $categorie = $_POST['categorie'] ?? '';
        $medewerker = $_POST['medewerker'] ?? '';
        $afdeling = $_POST['afdeling'] ?? '';
        $beschrijving = $_POST['beschrijving'] ?? '';
        $deadline = $_POST['deadline'] ?? '';
 
        if (empty($categorie) || empty($medewerker) || empty($afdeling) || empty($beschrijving) || empty($deadline) || empty($afdeling)) {
            throw new Exception("Vul alle velden in.");
        }
 
       $query = "INSERT INTO takenlijst (categorie, medewerker, afdeling, beschrijving, deadline, status, user_id)
VALUES (:categorie, :medewerker, :afdeling, :beschrijving, :deadline, :status, :user_id)";
 
        $statement = $conn->prepare($query);
        $statement->execute([
            ':categorie' => $categorie,
            ':medewerker' => $medewerker,
            ':afdeling' => $afdeling,
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