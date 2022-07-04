<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/styles.css">

    <title>Connexion</title>
</head>
<body>
    <div class="wrapper">
        <h1>Connexion</h1>
        <form action="index.php" method="POST">
            <fieldset>
                <legend>Renseignez vos données</legend>
                <label>
                    <span>Username :</span>
                    <input type="text" name="login">
                </label>
                <label>
                    <span>MDP :</span>
                    <input type="password" name="pass">
                </label>
                <input type="submit" name="submit">
            </fieldset>
        </form>
    </div>
</body>
</html>