<?php
require_once 'config/config.php';
 
if (!isset($_SESSION['user_id'])) {
    die("Je moet ingelogd zijn.");
}
 
$user_id = $_SESSION['user_id'];
 
$filter = $_GET['filter'] ?? '';
 
$query = "SELECT * FROM takenlijst WHERE user_id = :user_id";
 
$params = [':user_id' => $user_id];
 
if (!empty($filter)) {
    $query .= " AND status = :status";
    $params[':status'] = $filter;
}
 
$query .= " ORDER BY deadline ASC";
 
$stmt = $conn->prepare($query);
$stmt->execute($params);
 
$taken = $stmt->fetchAll();
 
 
function toonTaken($taken, $status) {
 
    $gevonden = false;
 
    foreach ($taken as $taak) {
 
        if ($taak['status'] == $status) {
 
            $gevonden = true;
 
            echo "<div class='task'>";
 
            echo "<p>" . htmlspecialchars($taak['beschrijving']) . "</p>";
            echo "<small>Deadline: " . $taak['deadline'] . "</small>";
 
            echo "<br><br>";
 
            echo "<a href='bewerken.php?id=" . $taak['id'] . "'>✏️ Bewerken</a>";
            echo " | ";
            echo "<a href='delete.php?id=" . $taak['id'] . "' onclick='return confirm(\"Weet je zeker?\")'>🗑 Verwijderen</a>";
 
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
 
        <!-- FILTER -->
        <form method="GET" style="margin: 20px;">
            <label>Filter taken: </label>
 
            <select name="filter" onchange="this.form.submit()">
                <option value="">Alles</option>
                <option value="todo" <?= ($filter == 'todo') ? 'selected' : '' ?>>Moet gedaan worden</option>
                <option value="bezig" <?= ($filter == 'bezig') ? 'selected' : '' ?>>Bezig</option>
                <option value="check" <?= ($filter == 'check') ? 'selected' : '' ?>>Controle</option>
                <option value="klaar" <?= ($filter == 'klaar') ? 'selected' : '' ?>>Klaar</option>
            </select>
        </form>
 
        <!-- BOARD -->
 
        <div class="tasks-column">
            <h3>Moet gedaan worden</h3>
            <div class="tasks">
                <?php toonTaken($taken, 'todo'); ?>
            </div>
        </div>
 
        <div class="tasks-column">
            <h3>Bezig</h3>
            <div class="tasks">
                <?php toonTaken($taken, 'bezig'); ?>
            </div>
        </div>
 
        <div class="tasks-column">
            <h3>Moet gecontroleerd worden</h3>
            <div class="tasks">
                <?php toonTaken($taken, 'check'); ?>
            </div>
        </div>
 
        <div class="tasks-column">
            <h3>Klaar</h3>
            <div class="tasks">
                <?php toonTaken($taken, 'klaar'); ?>
            </div>
        </div>
 
    </main>
 
</body>
</html>