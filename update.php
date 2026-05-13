<?php

require_once 'config/config.php';
 
session_start();

if (!isset($_SESSION['user_id'])) {

    die("Je moet ingelogd zijn.");

}
 
$id = $_POST['id'] ?? null;

$beschrijving = $_POST['beschrijving'] ?? '';

$kolom_id = $_POST['kolom_id'] ?? '';

$deadline = $_POST['deadline'] ?? '';

$afdeling = $_POST['afdeling'] ?? '';
 
if (!$id || empty($beschrijving) || empty($kolom_id) || empty($deadline) || empty($afdeling)) {

    die("Niet alle velden zijn ingevuld.");

}
 
$query = "UPDATE takenlijst 

          SET beschrijving = :beschrijving,

              kolom_id = :kolom_id,

              deadline = :deadline,

              afdeling = :afdeling

          WHERE id = :id 

          AND user_id = :user_id";
 
$stmt = $conn->prepare($query);
 
$stmt->execute([

    ':beschrijving' => $beschrijving,

    ':kolom_id' => $kolom_id,

    ':deadline' => $deadline,

    ':afdeling' => $afdeling,

    ':id' => $id,

    ':user_id' => $_SESSION['user_id']

]);
 
header("Location: index.php");

exit;
 