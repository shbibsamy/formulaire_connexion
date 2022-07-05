<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/styles.css">
    <title>Bienvenue</title>
</head>
<body>
    <div class="wrapper">
        <header>
            <h1>Accueil Utilisateur</h1>
            <?php require 'menu.php'; ?>
        </header>
        <main>
            <div class="infos">
                <h2>Bienvenue</h2>
                <span>Nom d'utilisateur : <?php echo $_SESSION["nom_utilisateur"] ?></span>
            </div>
        </main>
    </div>
</body>
</html>