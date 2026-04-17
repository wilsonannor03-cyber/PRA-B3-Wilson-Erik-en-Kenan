<?php
require_once 'config.php';
 
session_start();
 
if (!isset($_SESSION['user_id'])) {
    die("Je moet ingelogd zijn.");
}
 
$id = $_GET['id'] ?? null;
 
if (!$id) {
    die("Geen taak geselecteerd.");
}
 
$query = "DELETE FROM takenlijst
          WHERE id = :id
          AND user_id = :user_id";
 
$stmt = $conn->prepare($query);
 
$stmt->execute([
    ':id' => $id,
    ':user_id' => $_SESSION['user_id']
]);
 
header("Location: index.php");
exit;
 