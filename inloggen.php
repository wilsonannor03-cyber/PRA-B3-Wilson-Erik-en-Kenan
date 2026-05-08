<?php 
session_start();
if (isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Inloggen</title>
    <link rel="stylesheet" href="public/css/main.css">
</head>
<body>
 
<div class="container">
    <h1>Inloggen</h1>
 
    <?php if (isset($_GET['error'])): ?>
        <p style="color:red;">
            <?= htmlspecialchars($_GET['error']) ?>
        </p>
    <?php endif; ?>
 
    <form method="POST" action="login.php">
 
        <div class="form-group">
            <label>Gebruikersnaam</label>
            <input type="text" name="username" class="form-input" required>
        </div>
 
        <div class="form-group">
            <label>Wachtwoord</label>
            <input type="password" name="password" class="form-input" required>
        </div>
 
        <br>
 
        <button type="submit">Inloggen</button>
 
    </form>
</div>
 
</body>
</html>