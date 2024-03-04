<?php
session_start();
$succes = null;

if (isset($_GET['succes']) && $_GET['succes'] === "inscription") {
  $succes = true;
}
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
    <?php
    if ($succes){?>
    <h1>Félicitation pour votre inscription !!!</h1>
    <?php }?>
    <h2>Vous pouvez maintenant vous connecter:</h2>
    <form action="./src/authentification.php" id="connexion" method="POST">
      <label for="mail">Mail :</label>
      <input type="email" id="mail" name="mail" required>
      <label for="password">Mot de passe :</label>
      <input type="password" id="password" name="password" required>
      <input type="submit" name="submit" value="Se connecter">
    </form>
</body>
</html>