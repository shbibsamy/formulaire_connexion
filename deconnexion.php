<?php
    session_start();
    function redirect($url) { 
        // active la mise en mémoire tampon d'entrée
        ob_start();
        header('Location: '.$url);
        // désactive la mise en mémoire tampon de sortie
        ob_end_flush();
        //arrête le reste du code de la page si la redirection est ignorée. La façon de le faire est d’ajouter die() ou exit() après votre redirection 
        die(); 
    }
    session_destroy();
    session_unset();
    echo 'déconexxion en cours';
    redirect('index.php');
?>