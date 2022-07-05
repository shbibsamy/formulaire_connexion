<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/styles.css">
    <title>Accueil</title>
</head>
<body>
    <div class="wrapper">
        <header>
            <h1>Accueil</h1>
            <?php require 'menu.php'; ?>
        </header>
        <main>
            <div class="presentation">
                <h2>Bienvenue !</h2>
                <?php 
                if(isset($_SESSION['compte_creation'])) {
                    echo $_SESSION['compte_creation'];
                } else if (isset($_SESSION['nom_utilisateur'])){
                    echo "Rebienvenue à vous, ".$_SESSION['nom_utilisateur']. " !";
                } else {
                    echo "<span>Vous n'êtes pas encore connecté(e). Veuillez vous connecter ou vous inscrire pour accèder à notre service.</span>";
                }

                ?>
            </div>
        </main>
    </div>
</body>
</html>