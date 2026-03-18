<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once 'resources/views/components/head.php'; ?>
    <title>Takenbord</title>
</head>
<body>
    <?php require_once 'resources/views/components/header.php'; ?>
    <main>
        <div class="tasks-column">
            <h3>Moet gedaan worden</h3>
            <div class="tasks">
                <?php include('placeholdertasks.php');?>
            </div>
        </div>

        <div class="tasks-column">
            <h3>Bezig</h3>
            <div class="tasks">
                <?php include('placeholdertasks.php');?>
            </div>
        </div>

        <div class="tasks-column">
            <h3>Moet gecontroleerd worden</h3>
            <div class="tasks">
                <?php include('placeholdertasks.php');?>
            </div>
        </div>

        <div class="tasks-column">
            <h3>klaar</h3>
            <div class="tasks">
                <?php include('placeholdertasks.php');?>
            </div>
        </div>


        <div class="login-overlay">
            <div class="login-popup">
                <button class="close-btn" id="close-login-menu">&times;</button>
                <form id="login">
                    <label for="username">Gebruikersnaam:</label>
                    <input type="text" id="username">
                    <br>
                    <label for="password">Wachtwoord:</label>
                    <input type="text" id="password">
                    <br>
                    <button type="submit">Log in</button>
                </form>
            </div>
        </div>
    </main>
    <footer></footer>
    <script>
        document.getElementById('show-login-menu').addEventListener('click', function() {
            document.getElementsByClassName('login-overlay')[0].style.display = 'flex';
        })
            document.getElementById('close-login-menu').addEventListener('click', function() {
            document.getElementsByClassName('login-overlay')[0].style.display = 'none';
        })
    </script>
</body>