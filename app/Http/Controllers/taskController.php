<?php
require_once '../config/conn.php'; // database connectie

$action = $_POST['action'] ?? '';

if ($action === 'update') {

    // waarden uit formulier halen
    $id = $_POST['id'];
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);

    // controleren of velden leeg zijn
    if (empty($title) || empty($content)) {
        die("Vul zowel een titel als content in.");
    }

    // query maken
    $query = "UPDATE berichten SET title = :title, content = :content WHERE id = :id";

    // statement voorbereiden
    $stmt = $conn->prepare($query);

    // query uitvoeren
    $stmt->execute([
        ':title' => $title,
        ':content' => $content,
        ':id' => $id
    ]);

    // terug naar homepage
    header("Location: ../index.php");
    exit;
}


if ($action === 'delete') {

    // id ophalen
    $id = $_POST['id'];

    // delete query
    $query = "DELETE FROM berichten WHERE id = :id";

    // statement voorbereiden
    $stmt = $conn->prepare($query);

    // uitvoeren
    $stmt->execute([
        ':id' => $id
    ]);

    // terug naar homepage
    header("Location: ../index.php");
    exit;
}
?>