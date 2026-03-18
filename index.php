<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <title>Takenbord</title>
    <link rel="stylesheet" href="public/css/main.css">
</head>
<body>
    <header>
        <div class="page-title"><img src="img/icon.png"><h1>Takenbord Developerland</h1></div>
        <button id="show-login-menu">Log in</button>
    </header>
    <main>
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