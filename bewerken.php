<?php
session_start();
require_once 'config/config.php';
if (!isset($_SESSION['user_id'])) {
    die("Je moet ingelogd zijn.");
}

$id = $_GET['id'] ?? null;
 
if (!$id) {
    die("Geen taak gekozen.");
}
 
 $query = "SELECT * FROM takenlijst WHERE id = :id AND user_id = :user_id";
$stmt = $conn->prepare($query);
$stmt->execute([
    ':id' => $id,
    ':user_id' => $_SESSION['user_id']
]);
 
$taak = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$taak) {
    die("Taak niet gevonden.");
}
?>
 
<!DOCTYPE html>
<html lang="nl">
<head>
    <title>Taak bewerken</title>
    <?php require_once 'resources/views/components/head.php'; ?>
</head>
<body>
<?php require_once 'resources/views/components/header.php'; ?>
<h1>Taak bewerken</h1>
 
<form method="POST" action="update.php">
 
    <input type="hidden" name="id" value="<?= $taak['ID'] ?>">
 
    <label>Beschrijving</label>
    <input type="text" name="beschrijving" value="<?= htmlspecialchars($taak['beschrijving']) ?>">
 
    <label>Status</label>
    <select name="kolom_id">
        <option value="2" <?= $taak['kolom_id'] == '2' ? 'selected' : '' ?>>Moet Gedaan Worden</option>
        <option value="3" <?= $taak['kolom_id'] == '3' ? 'selected' : '' ?>>Bezig</option>
        <option value="4" <?= $taak['kolom_id'] == '4' ? 'selected' : '' ?>>Controle</option>
        <option value="5" <?= $taak['kolom_id'] == '5' ? 'selected' : '' ?>>Klaar</option>
    </select>

    <label>Afdeling</label>
    <input type="text" name="afdeling" value="<?= htmlspecialchars($taak['afdeling']) ?>">

    <label>Deadline</label>
    <input type="date" name="deadline" value="<?= $taak['deadline'] ?>">
 
    <button type="submit">Opslaan</button>
 
</form>
 
</body>
</html>
 