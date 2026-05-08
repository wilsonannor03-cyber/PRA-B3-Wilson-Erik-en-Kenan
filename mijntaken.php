<?php
session_start();

require_once 'config/config.php';
 
if (!isset($_SESSION['user_id'])) {
    die("Je moet ingelogd zijn.");
}
 
$user_id = $_SESSION['user_id'];
 
$query = "SELECT * FROM takenlijst
          WHERE user_id = :user_id
          ORDER BY deadline ASC";
 
$stmt = $conn->prepare($query);
$stmt->execute([':user_id' => $user_id]);
 
$taken = $stmt->fetchAll();
?>
 
<!DOCTYPE html>
<html lang="nl">
<head>
    <title>Mijn taken</title>
    <?php require_once 'resources/views/components/head.php'; ?>
    <link rel="stylesheet" href="public/css/main.css">
</head>
 
<body>
 
<?php require_once 'resources/views/components/header.php'; ?>
 
<main>
 
<h1>Mijn taken</h1>
 
<?php if (empty($taken)): ?>
    <p>Je hebt nog geen taken.</p>
<?php endif; ?>
 
<?php foreach ($taken as $taak): ?>
    <div class="task">
        <p><?= htmlspecialchars($taak['beschrijving']) ?></p>
        <small>Deadline: <?= $taak['deadline'] ?></small>
        <br>
        <small>Status: <?= $taak['status'] ?></small>
    </div>
<?php endforeach; ?>
 
</main>
 
</body>
</html>