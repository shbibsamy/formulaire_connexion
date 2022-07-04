<?php
    if(isset($_POST['submit'])) {
        require 'connexion.php';
        // On nettoie ce que l'utilisateur a saisi afin de s'assurer que ce n'est pas du code malveillant :
        $nom = htmlspecialchars($_POST["nom"]);
        $prenom = htmlspecialchars($_POST["prenom"]);
        $login = htmlspecialchars($_POST["login"]);
        $pass = htmlspecialchars($_POST["pass"]);
        $repass = htmlspecialchars($_POST["repass"]);
        /* Ici l'utilisateur souhaitant s'inscrire devait taper 2 fois le mot de passe qu'il souhaite définir pour son compte
        Donc il y a 2 variables pour le mot de passe correspondant aux valeurs des 2 champs de mot de passe
        */
        // On teste si les 2 mots de passe saisis sont identiques
        if($pass != $repass) {
            echo "Mots de passe non identiques !";
        }
        // On prépare la requête SQL adéquate :
        $req = $pdo->prepare("SELECT id FROM users WHERE user_login=?");
        // On déclare la gestion des erreurs PDO :
        $req -> setFetchMode(PDO::FETCH_ASSOC);
        // On exécute la requête :
        $req -> execute(array($login));
        /* On récupère le résultat de la requête (1 seul résultat possible puisque le champ user_login est déclaré 'unique' dans la table users) et on le sotcke dans un tableau :
        */
        $tab = $req->fetchAll();
        /* Si le login choisi lors de la saisie correspond à celui d'un utilisateur déjà existant, on invite l'utilisateur a choisir un autre login (pour rappel, user_login est déclaré unique dans la table users) :
        */
        if (!empty($tab)) {
            echo "Login existe déjà !";
        } else {
        /* Si le login n'existe pas déjà dans la base
        */
            // On encrypte le mot de passe via la fonction password_hash() :
            $encrypted_password = password_hash($pass, PASSWORD_DEFAULT);
            // On prépare la requête SQL adéquate :
            $ins = $pdo -> prepare("INSERT INTO users(user_lastname,user_firstname,user_login,user_password,user_date) VALUES(?,?,?,?,now())");
            // On exécute la requête :
            $ins -> execute(array($nom,$prenom,$login,$encrypted_password));
        }
    }
        
?>