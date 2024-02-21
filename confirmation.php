<?php
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="./styleConfirmation.css" >
    <script src="./script.js" defer></script>
</head>
<body>
    <h1>Félicitation pour votre inscription !!!</h1>
    <h2>Vous pouvez maintenant vous connecter:</h2>
    <form action="./src/authentification.php" method="post"></form>
    <label for="mail">Mail :</label>
    <input type="email" id="mail" name="mail" required>
    <label for="password">Mot de passe :</label>
    <input type="password" id="password" name="password" required>
    <input type="submit" name="submit" value="Se connecter">
</body>
</html>