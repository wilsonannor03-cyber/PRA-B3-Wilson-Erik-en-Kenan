<?php
require_once 'config/config.php';
session_start();
 
if (!isset($_SESSION['user_id'])) {
    header("Location: inloggen.php");
    exit;
}
 
$user_id = $_SESSION['user_id'];
 
$filter = $_GET['filter'] ?? '';
$afdeling = $_GET['afdeling'] ?? '';
 
 
$kolommenStmt = $conn->query("SELECT * FROM kolom");
$kolommen = $kolommenStmt->fetchAll();
 
$query = "SELECT * FROM takenlijst WHERE user_id = :user_id";
$params = [':user_id' => $user_id];
 
if (!empty($filter)) {
    $query .= " AND status = :status";
    $params[':status'] = $filter;
}
 
if (!empty($afdeling)) {
    $query .= " AND afdeling = :afdeling";
    $params[':afdeling'] = $afdeling;
}
 
$query .= " ORDER BY deadline ASC";
 
$stmt = $conn->prepare($query);
$stmt->execute($params);
 
$taken = $stmt->fetchAll();
 
function toonTakenPerKolom($taken, $kolom_id) {
 
    $gevonden = false;
 
    foreach ($taken as $taak) {
 
        if (isset($taak['kolom_id']) && $taak['kolom_id'] == $kolom_id) {
 
            $gevonden = true;
 
            echo "<div class='task'>";
            echo "<p>" . htmlspecialchars($taak['beschrijving']) . "</p>";
            echo "<small>Deadline: " . $taak['deadline'] . "</small><br>";
            echo "<small>Afdeling: " . htmlspecialchars($taak['afdeling']) . "</small>";
 
            echo "<br><br>";
 
            echo "<a href='bewerken.php?id=" . $taak['ID'] . "'>✏️ Bewerken</a>";
            echo " | ";
            echo "<a href='delete.php?id=" . $taak['ID'] . "' 
                onclick='return confirm(\"Weet je zeker dat je deze taak wilt verwijderen?\")'>
                🗑 Verwijderen
                </a>"; 
            echo "</div>";
        }
    }
 
    if (!$gevonden) {
        echo "<p style='opacity:0.6;'>Geen taken</p>";
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once 'resources/views/components/head.php'; ?>
    <title>Takenbord</title>
    <link rel="stylesheet" href="public/css/main.css">
</head>
 
<body>
    <?php require_once 'resources/views/components/header.php'; ?>
    <main>
        
        <form method="GET" style="margin: 20px; display:flex; gap:20px;">
 
        <div>
            <label>Status: </label>
            <select name="filter" onchange="this.form.submit()">
                <option value="">Alles</option>
                <option value="todo" <?= ($filter == 'todo') ? 'selected' : '' ?>>Moet gedaan worden</option>
                <option value="bezig" <?= ($filter == 'bezig') ? 'selected' : '' ?>>Bezig</option>
                <option value="check" <?= ($filter == 'check') ? 'selected' : '' ?>>Controle</option>
                <option value="klaar" <?= ($filter == 'klaar') ? 'selected' : '' ?>>Klaar</option>
            </select>
        </div>
 
        <div>
            <label>Afdeling: </label>
            <select name="afdeling" onchange="this.form.submit()">
                <option value="">Alle afdelingen</option>
                <?php
                $afdelingen = array_unique(array_column($taken, 'afdeling'));
                foreach ($afdelingen as $afd) {
                    echo "<option value='" . htmlspecialchars($afd) . "' " . ($afdeling == $afd ? 'selected' : '') . ">" . htmlspecialchars($afd) . "</option>";
                }
                ?>
            </select>
        </div>
        <a href="kolom.php" class="new-column-btn">+ Nieuwe kolom</a>
 
    </form>
    
    <div class="columns">
    <?php foreach ($kolommen as $kolom): ?>
        <div class="tasks-column" style="display:flex;">
 
            <h3><?= htmlspecialchars($kolom['kolomnaam']) ?></h3>
 
            <div class="tasks">
                <?php toonTakenPerKolom($taken, $kolom['ID']); ?>
            </div>
 
        </div>
    <?php endforeach; ?>
    </div>
 
</main>
 
</body>
</html>