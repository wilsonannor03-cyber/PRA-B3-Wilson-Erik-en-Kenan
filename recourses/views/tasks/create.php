<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<header>
 <div class="container">
        <h1>Nieuwe melding</h1>

        <form action="<?php echo $base_url; ?>/app/Http/Controllers/meldingenController.php" method="POST">

            <div class="form-group">
                <label for="attractie">Naam attractie:</label>
                <input type="text" name="attractie" id="attractie" class="form-input" required>
            </div>

  
            <div class="form-group">
                <label for="type">Type:</label>
                <select name="type" id="type" class="form-input" required>
                    <option value="">-- Kies type --</option>
                    <option value="mechanisch">Mechanisch</option>
                    <option value="elektrisch">Elektrisch</option>
                    <option value="software">Software</option>
                    <option value="overig">Overig</option>
                </select>
            </div>

            <div class="form-group">
                <label for="capaciteit">Capaciteit p/uur:</label>
                <input type="number" min="0" name="capaciteit" id="capaciteit" class="form-input" required>
            </div>

            <div class="form-group">
                <label for="melder">Naam melder:</label>
                <input type="text" name="melder" id="melder" class="form-input" required>
            </div>

            <!-- PRIORITEIT VINKJE -->
            <div class="form-group">
                <label>
                    <input type="checkbox" name="prioriteit" value="1">
                    Hoge prioriteit
                </label>
            </div>

            <!-- OVERIGE INFO TEKSTVAK -->
            <div class="form-group">
                <label for="overige_info">Overige info:</label>
                <textarea name="overige_info" id="overige_info" rows="4" class="form-input"></textarea>
            </div>

            <input type="submit" value="Verstuur melding">

        </form>
    </div>
</body>
</html>