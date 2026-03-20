<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require_once '../components/head.php'; ?>
</head>
<body>
<header>
    <?php require_once '../components/header.php'; ?>
</header>
<main>
 <div class="container">

        <h1>Nieuwe taak</h1>

        <form action="<?php echo $base_url; ?>/app/Http/Controllers/taskController.php" method="POST">

            <div class="form-group">
                <label for="taakNaam">Naam taak:</label>
                <input type="text" name="taakNaam" id="taakNaam" class="form-input" required>
            </div>

            <div class="form-group">
                <label for="categorie">Categorie</label>
                <input type="text" name="categorie" id="categorie" class="form-input" required>
            </div>

            <div class="form-group">
                <label for="medewerker">Medewerker</label>
                <input type="text" name="medewerker" id="medewerker" class="form-input" required>
            </div>

            <div class="form-group">
                <label for="overigeInfo">Overige info</label>
                <textarea name="overigeInfo" id="overigeInfo" rows="4" class="form-input"></textarea>
            </div>

            <input type="submit" value="Verstuur melding">

        </form>
    </div>
</main>
</body>
</html>