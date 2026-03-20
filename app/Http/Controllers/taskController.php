<?php
$categorie = $_POST['categorie'] ?? '';
$medewerker = $_POST['medewerker'] ?? '';
$deadline = $_POST['deadline'] ?? '';

if (empty($categorie) || empty($medewerker) || empty($deadline)) {
    header("Location: ../../../resources/views/tasks/create.php?error=Vul alle verplichte velden in");
    exit;
}

require_once __DIR__ . '/../../../config/conn.php';

$query = "INSERT INTO takenlijst (categorie, medewerker, deadline)
          VALUES (:categorie, :medewerker, :deadline)";

$statement = $conn->prepare($query);
$statement->execute([
    ":categorie" => $categorie,
    ":medewerker" => $medewerker,
    ":deadline" => $deadline
]);

header("Location: ../../../resources/views/tasks/create.php?msg=Taak opgeslagen");
exit;
?>