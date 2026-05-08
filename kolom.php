<?php
session_start();
require_once 'config/config.php';
 
if (!isset($_SESSION['user_id'])) {
    header("Location: inloggen.php");
    exit;
}
 
$melding = "";
 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
 
    $kolomnaam = trim($_POST['kolomnaam'] ?? '');
 
    if (empty($kolomnaam)) {
        $melding = "Vul een kolomnaam in.";
    } else {
        $query = "INSERT INTO kolom (kolomnaam) VALUES (:kolomnaam)";
        $stmt = $conn->prepare($query);
 
        $stmt->execute([
            ':kolomnaam' => $kolomnaam
        ]);
 
        header("Location: kolom.php?success=1");
        exit;
    }
}
?>
 
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Kolom toevoegen</title>
    <link rel="stylesheet" href="public/css/main.css">
</head>
<body>
 
<div class="container">
 
    <h1>Nieuwe kolom toevoegen</h1>
 
    <?php if (isset($_GET['success'])): ?>
        <p style="color:green;">Kolom succesvol toegevoegd!</p>
    <?php endif; ?>
 
    <?php if (!empty($melding)): ?>
        <p style="color:red;"><?= htmlspecialchars($melding) ?></p>
    <?php endif; ?>
 
    <form method="POST">
 
        <div class="form-group">
            <label>Kolomnaam:</label>
            <input type="text" name="kolomnaam" required class="form-input">
        </div>

        <button type="submit" class="add-column-btn">Toevoegen</button>

    </form>
 <a href="index.php" class="home-button">Terug naar homepagina</a>
</div>
 
</body>
</html>
 