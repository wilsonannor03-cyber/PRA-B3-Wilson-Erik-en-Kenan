<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nieuwe taak</title>
 
    <?php require_once __DIR__.'/../components/head.php'; ?>
    <link rel="stylesheet" href="../../../public/css/main.css">
</head>
<body>
 
<?php require_once __DIR__.'/../components/header.php'; ?>
 
<?php
require_once '../../../config/config.php';
 
$kolommenStmt = $conn->query("SELECT * FROM kolom");
$kolommen = $kolommenStmt->fetchAll();
?>
 
<main>
<div class="container">
 
    <h1>Nieuwe taak</h1>
 
    <form action="<?php echo $base_url; ?>/../app/Http/Controllers/taskController.php" method="POST">
 
        <div class="form-group">
            <label>Categorie</label>
            <input type="text" name="categorie" class="form-input" required>
        </div>
 
        <div class="form-group">
            <label>Medewerker</label>
            <input type="text" name="medewerker" class="form-input" required>
        </div>
 
        <div class="form-group">
            <label>Afdeling</label>
            <input type="text" name="afdeling" class="form-input" required>
        </div>
 
        <div class="form-group">
            <label>Kolom</label>
            <select name="kolom_id" class="form-input" required>
                <option value="">-- Kies kolom --</option>
 
                <?php foreach ($kolommen as $kolom): ?>
                    <option value="<?= $kolom['ID'] ?>">
                        <?= htmlspecialchars($kolom['kolomnaam']) ?>
                    </option>
                <?php endforeach; ?>
 
            </select>
        </div>
 
        <div class="form-group">
            <label>Beschrijving</label>
            <textarea name="beschrijving" rows="4" class="form-input" required></textarea>
        </div>
 
        <div class="form-group">
            <label>Deadline</label>
            <input type="date" name="deadline" class="form-input" required>
        </div>
 
        <div class="form-group">
            <label>Status</label>
            <select name="status" class="form-input">
                <option value="todo">Moet gedaan worden</option>
                <option value="bezig">Bezig</option>
                <option value="check">Controle</option>
                <option value="klaar">Klaar</option>
            </select>
        </div>
 
        <input type="submit" value="Taak toevoegen">
 
    </form>
<a href="../../../index.php" class="home-button">Terug naar homepagina</a> 
    <?php if(isset($_GET['bericht'])): ?>
        <div class="bericht"><?= htmlspecialchars($_GET['bericht']) ?></div>
    <?php endif; ?>
 
</div>
</main>
 
</body>
</html>
 