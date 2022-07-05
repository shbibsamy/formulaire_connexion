<?php require './assets/scripts/script_creation_compte.php'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/styles.css">

    <title>Créer un nouveau compte</title>
</head>
<body>
    <div class="wrapper">
        <header>
            <h1>Créer un nouveau compte</h1>
            <?php require 'menu.php'; ?>
        </header>
        <main>
            <form action='#' method='POST'>
                <fieldset>
                    <legend>Renseignez vos données</legend>
                    <label>
                        <span>Nom :</span>
                        <input type='text' name='nom'required autofocus>
                    </label>
                    <label>
                        <span>Prénom :</span>
                        <input type='text' name='prenom' required>
                    </label>
                    <label>
                        <span>Username :</span>
                        <input type='text' name='login' required>
                    </label>
                    <label>
                        <span>MDP :</span>
                        <input type='password' name='pass' required>
                    </label>
                    <label>
                        <span>MDP vérification :</span>
                        <input type='password' name='repass' required>
                    </label>
                    <input type='submit' name='submit'>
                </fieldset>
            </form>
            <?php echo "<div class='message'><span>$message</span></div>"; ?>
        </main>
    </div>
</body>
</html>