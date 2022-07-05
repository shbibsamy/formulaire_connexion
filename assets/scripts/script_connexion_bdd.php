<?php
    define('USER',"samy_connexion"); // Nom d'utilisateur du compte phpMyAdmin
    define('PASSWD',""); // Mot de passe du compte utilisateur phpMyAdmin
    define('SERVER',"localhost"); // URL du serveur. Ici localhost puisque le serveur n'est pas hébergé en ligne
    define('BASE',"utilisateurs"); // Le nom de la base de données tel qu'il est déclaré dans phpMyAdmin

    $dsn="mysql:dbname=".BASE.";host=".SERVER;

    try{
        $pdo=new PDO($dsn,USER,PASSWD);
        return ("Connexion effectuée avec succès<br>");
    }
    catch(PDOException $e){
        return ("Échec de la connexion : ". $e->getMessage() . "<br>");
        exit();
    }
?>