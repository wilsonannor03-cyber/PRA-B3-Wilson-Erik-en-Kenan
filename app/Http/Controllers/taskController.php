<?php
require_once __DIR__ . '/../../../config.php';
 
session_start();
 
if (!isset($_SESSION['user_id'])) {
    die("Je moet ingelogd zijn.");
}
 
$categorie = $_POST['categorie'] ?? '';
$medewerker = $_POST['medewerker'] ?? '';
$beschrijving = $_POST['beschrijving'] ?? '';
$deadline = $_POST['deadline'] ?? '';
$status = $_POST['status'] ?? 'todo';
 
if (empty($categorie) || empty($medewerker) || empty($beschrijving) || empty($deadline)) {
    header("Location: ../../../resources/views/tasks/create.php?error=Vul alle verplichte velden in");
    exit;
}
 
$user_id = $_SESSION['user_id'];
 
$query = "INSERT INTO takenlijst
(categorie, medewerker, beschrijving, deadline, status, user_id)
VALUES (:categorie, :medewerker, :beschrijving, :deadline, :status, :user_id)";
 
$statement = $conn->prepare($query);
 
$statement->execute([
    ":categorie" => $categorie,
    ":medewerker" => $medewerker,
    ":beschrijving" => $beschrijving,
    ":deadline" => $deadline,
    ":status" => $status,
    ":user_id" => $user_id
]);
 
$msg = "Taak succesvol toegevoegd!";
 
header("Location: ../../../index.php?bericht=" . urlencode($msg));
exit;