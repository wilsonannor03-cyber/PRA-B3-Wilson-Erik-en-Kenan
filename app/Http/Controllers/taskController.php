<?php
$categorie = $_POST['categorie'] ?? '';
$medewerker = $_POST['medewerker'] ?? '';
$beschrijving = $_POST['medewerker'] ?? '';
$deadline = $_POST['deadline'] ?? '';

if (empty($categorie) || empty($medewerker) || empty($beschrijving) || empty($deadline)) {
    header("Location: ../../../resources/views/tasks/create.php?error=Vul alle verplichte velden in");
    exit;
}

require_once __DIR__ . '/../../../config/conn.php';

$query = "INSERT INTO takenlijst (categorie, medewerker, beschrijving, deadline)
          VALUES (:categorie, :medewerker, :beschrijving, :deadline)";

$statement = $conn->prepare($query);
$statement->execute([
    ":categorie" => $categorie,
    ":medewerker" => $medewerker,
    ":beschrijving" => $beschrijving,
    ":deadline" => $deadline
]);
$msg = "Uw nieuwe taak is toegevoegt! U kunt nu terug naar de home pagina";
header("location: ../../../resources/views/tasks/create.php?bericht=$msg");

exit;
?>