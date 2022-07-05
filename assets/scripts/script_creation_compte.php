<?php
    function redirect($url) { 
        // active la mise en mémoire tampon d'entrée
        ob_start(); 
        header('Location: '.$url);
        // désactive la mise en mémoire tampon de sortie
        ob_end_flush();
        //arrête le reste du code de la page si la redirection est ignorée. La façon de le faire est d’ajouter die() ou exit() après votre redirection 
        die(); 
    }
    $message = '';
    if(isset($_POST['submit'])) {
        $username = '';
        require './assets/scripts/script_connexion_bdd.php';
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
            $message = "Mots de passe non identiques !";
            return $message;
        }
        // On prépare la requête SQL adéquate :
        $req = $pdo->prepare("SELECT id FROM users WHERE user_login=?");
        // On déclare la gestion des messages PDO :
        $req -> setFetchMode(PDO::FETCH_ASSOC);
        // On exécute la requête :
        $req -> execute(array($login));
        /* On récupère le résultat de la requête (1 seul résultat possible puisque le champ user_login est déclaré 'unique' dans la table users) et on le sotcke dans un tableau :
        */
        $tab = $req->fetchAll();
        /* Si le login choisi lors de la saisie correspond à celui d'un utilisateur déjà existant, on invite l'utilisateur a choisir un autre login (pour rappel, user_login est déclaré unique dans la table users) :
        */
        if (!empty($tab)) {
            $message = "L'utilisateur existe déjà !";
            return $message;
        } else {
        /* Si le login n'existe pas déjà dans la base
        */
            // On encrypte le mot de passe via la fonction password_hash() :
            $encrypted_password = password_hash($pass, PASSWORD_DEFAULT);
            // On prépare la requête SQL adéquate :
            $ins = $pdo -> prepare("INSERT INTO users(user_lastname,user_firstname,user_login,user_password,user_date) VALUES(?,?,?,?,now())");
            // On exécute la requête :
            $ins -> execute(array($nom,$prenom,$login,$encrypted_password));
            session_start();
            $_SESSION['compte_creation']= "Compte créé avec succès.";
            redirect('index.php');
        }
    }
        
?>