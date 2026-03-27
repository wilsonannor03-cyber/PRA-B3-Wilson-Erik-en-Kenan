<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once 'resources/views/components/head.php'; ?>
    <title>Takenbord</title>
</head>
<body>
    <?php require_once 'resources/views/components/header.php'; ?>
_____________________________________________________________________________
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


        <div class="overlay" id="login-overlay">
            <div class="popup">
                <button class="close-btn" id="close-login-menu">&times;</button>
                <form id="login">
                    <label for="username">Gebruikersnaam:</label>
                    <input type="text" id="username">
                    <br>
                    <label for="password">Wachtwoord:</label>
                    <input type="text" id="password">
                    <br>
                    <button type="submit" id="login">Log in</button>
                </form>
            </div>
        </div>
    </main>
    <footer></footer>
    <script>
        if (localStorage.getItem('loggedIn') == "true") {
            showLoggedIn();
        };

        document.getElementById('show-login-menu').addEventListener('click', function() {
            if (localStorage.getItem('loggedIn') == "true") {
                if (confirm('Weet je zeker dat je uit wil loggen?')) {
                    localStorage.setItem("loggedIn","false");
                    window.location.reload();
                }
            }
            else {
                document.getElementById('login-overlay').style.display = 'flex';
            }
        });

        document.getElementById('close-login-menu').addEventListener('click', function() {
            document.getElementById('login-overlay').style.display = 'none';
        });

        document.getElementById('login').addEventListener('click', function() {
            event.preventDefault()
            localStorage.setItem("loggedIn","true")
            showLoggedIn();
        });
        
        function showLoggedIn() {
            document.getElementsByClassName('tasks-column')[0].style.display = 'inline';
            document.getElementsByClassName('tasks-column')[1].style.display = 'inline';
            document.getElementsByClassName('tasks-column')[2].style.display = 'inline';
            document.getElementsByClassName('tasks-column')[3].style.display = 'inline';
            document.getElementById('show-login-menu').textContent = 'Log Uit'
        }
    </script>
</body>