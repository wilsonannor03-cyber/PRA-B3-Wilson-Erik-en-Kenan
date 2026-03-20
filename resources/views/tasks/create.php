<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <?php require_once __DIR__.'/../components/head.php'; ?>
</head>
<body>

     <?php require_once __DIR__.'/../components/header.php'; ?>

<main>
 <div class="container">
        <h1>Nieuwe taak</h1>

        <form action="<?php echo $base_url; ?>/app/Http/Controllers/taskController.php" method="POST">
           <div class="form-group">
                <label for="categorie">Categorie</label>
                <input type="text" name="categorie" id="categorie" class="form-input" required>
            </div>

            <div class="form-group">
                <label for="medewerker">Medewerker</label>
                <input type="text" name="medewerker" id="medewerker" class="form-input" required>
            </div>

            <div class="form-group">
                <label for="deadline">Deadline</label>
                <input type="date" name="deadline" id="deadline" class="form-input" required>
            </div>

            <input type="submit" value="Taak toevoegen">
        </form>
    </div>
   
</main>
</body>
</html>