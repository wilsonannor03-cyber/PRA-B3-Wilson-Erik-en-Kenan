<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<header>
    <?php require_once 'resources/views/components/header.php'; ?>
</header>
<main>
 <div class="container">
        <h1>Nieuwe taak</h1>

        <form action="<?php echo $base_url; ?>/app/Http/Controllers/taskController.php" method="POST">

            <div class="form-group">
                <label for="attractie">Naam taak:</label>
                <input type="text" name="attractie" id="attractie" class="form-input" required>
            </div>

  
            <div class="form-group">
                <label for="attractie">Categorie</label>
                <input type="text" name="attractie" id="attractie" class="form-input" required>
            </div>

            <div class="form-group">
                <label for="attractie">Medewerker</label>
                <input type="text" name="attractie" id="attractie" class="form-input" required>
            </div>

            <div class="form-group">
                <label for="overige_info"></label>
                <textarea name="overige_info" id="overige_info" rows="4" class="form-input"></textarea>
            </div>

            <input type="submit" value="Verstuur melding">

        </form>
    </div>
</main>
</body>
</html>