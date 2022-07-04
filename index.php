<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="wrapper">
        <h1>index</h1>
        <form action="index.php" method="POST">
            <fieldset>
                <legend>Create a new account</legend>
                <label>
                    <span>Nom :</span>
                    <input type="text" name="nom">
                </label>
                <label>
                    <span>Prénom :</span>
                    <input type="text" name="prenom">
                </label>
                <label>
                    <span>Username :</span>
                    <input type="text" name="login">
                </label>
                <label>
                    <span>MDP :</span>
                    <input type="password" name="pass">
                </label>
                <label>
                    <span>MDP vérification :</span>
                    <input type="password" name="repass">
                </label>
                <input type="submit" name="submit">
            </fieldset>
        </form>
    </div>
    
</body>
</html>