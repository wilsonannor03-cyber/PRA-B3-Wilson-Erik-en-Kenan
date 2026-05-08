<?php
require_once __DIR__ . '/../../../config/config.php';
 
session_start();
 
if (!isset($_SESSION['user_id'])) {
    die("Je moet ingelogd zijn.");
}
 
$categorie = $_POST['categorie'] ?? '';
$medewerker = $_POST['medewerker'] ?? '';
$afdeling = $_POST['afdeling'] ?? '';
$kolom_id = $_POST['kolom_id'] ?? null;
$beschrijving = $_POST['beschrijving'] ?? '';
$deadline = $_POST['deadline'] ?? '';
$status = $_POST['status'] ?? 'todo';
 
if (empty($categorie) || empty($medewerker) || empty($beschrijving) || empty($deadline)) {
    header("Location: ../../../resources/views/tasks/create.php?error=Vul alle verplichte velden in");
    exit;
}
 
$user_id = $_SESSION['user_id'];
 
$query = "INSERT INTO takenlijst
(categorie, medewerker, afdeling, kolom_id, beschrijving, deadline, status, user_id)
VALUES
(:categorie, :medewerker, :afdeling, :kolom_id, :beschrijving, :deadline, :status, :user_id)";
 
$statement = $conn->prepare($query);
 
$statement->execute([
    ":categorie" => $categorie,
    ":medewerker" => $medewerker,
    ":afdeling" => $afdeling,
    ":kolom_id" => $kolom_id,
    ":beschrijving" => $beschrijving,
    ":deadline" => $deadline,
    ":status" => $status,
    ":user_id" => $user_id
]);
 
$msg = "Taak succesvol toegevoegd!";
 
header("Location: ../../../index.php?bericht=" . urlencode($msg));
exit;