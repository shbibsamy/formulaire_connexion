<?php
    require './assets/scripts/script_connexion_bdd.php';
    // On cherche l'utilisateur dans la base
    //
    // Garnissage brut des données (juste pour l'exemple) :
    if(isset($_POST['submit'])) {
        $_POST["login"] = "alaindeloin";
        $_POST["pass"] = "azertyuiop";
        // On nettoie ce que l'utilisateur a saisi afin de s'assurer que ce n'est pas du code malveillant :
        $login = htmlspecialchars($_POST["login"]); 
        $pass = htmlspecialchars($_POST["pass"]);
        /* Il faut toujours construire les requêtes SQL via les fonctions prepare() et execute()
        Pour cela on enverra les paramètres par référence dans la requête préparée via la syntaxe ?
        Autant de ? il y aura au sein de la requête préparée, autant il devra y en avoir au sein du tableau envoyé à la fonction execute()
        On prépare donc la requête SQL adéquate :
        */
        $res = $pdo -> prepare("SELECT * FROM users WHERE user_login = ?");
        // On déclare la gestion des erreurs PDO :
        $res -> setFetchMode(PDO::FETCH_ASSOC);
        // On exécute la requête :
        $res -> execute(array($login));
        /* On récupère le résultat de la requête (1 seul résultat possible puisque le champ user_login est déclaré 'unique' dans la table users) et on le sotcke dans un tableau :
        */
        $tab = $res -> fetchAll();
        /* Test permettant de déterminer si la requête à renvoyé un résultat (si le tableau est vide - fonction empty() -, aucun utilisateur n'existe avec ce 'user_login') :
        */
        if(empty($tab)) {
            echo "L'utilisateur n'existe pas.";
        } else {
            /* Maintenant nous allons devoir traiter le mot de passe.
            En effet les mots de passe ne doivent jamais être inscrits en brut dans la BDD.
            Ils doivent être cryptés par une méthode que nous verrons plus loin.
            Nous allons donc 'décryter' - fonction password_verify() - le mot de passe qu'a renvoyé la requête et le comparer à celui saisi par l'utilisateur :
            */
            if (password_verify($pass, $tab[0]["user_password"])) {
                echo "L'utilisateur existe et le mot de passe est OK.";
            } else {
                echo "L'utilisateur existe mais mot de passe est incorrect !";
            }
        }
    }
?>