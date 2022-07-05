<?php
    if (isset($_SESSION['nom_utilisateur'])){ 
        echo '<ul>
            <li>        
                <a href="index.php" class="menu">Accueil</a>
            </li>
            <li>        
                <a href="mon_compte.php" class="menu">Mon Compte</a>
            </li>
            <li>        
                <a href="deconnexion.php" class="menu">Déconnexion</a>
            </li>
        </ul>';
        } else {
        echo '<ul>
            <li>        
                <a href="index.php" class="menu">Accueil</a>
            </li>
            <li>        
                <a href="connexion.php" class="menu">Connexion</a>
            </li>
            <li>        
                <a href="inscription.php" class="menu">Inscription</a>
            </li>
        </ul>';

    }
?>