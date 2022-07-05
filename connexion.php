<?php session_start(); ?>
<?php require './assets/scripts/script_connexion_utilisateur.php' ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/styles.css">
    <title>Connexion</title>
</head>
<body>
    <div class="wrapper">
        <header>
            <h1>Connexion</h1>
            <?php require 'menu.php'; ?>
        </header>  
        <main>
            <form action="#" method="POST">
                <fieldset>
                    <legend>Renseignez vos données</legend>
                    <label>
                        <span>Pseudo :</span>
                        <input type="text" name="login" required autofocus>
                    </label>
                    <label>
                        <span>MDP :</span>
                        <input type="password" name="pass" required>
                    </label>
                    <input type="submit" name="submit">
                </fieldset>
            </form>
            <?php echo "<div class='message'><span>$message</span></div>" ?>
        </main>
    </div>
</body>
</html>