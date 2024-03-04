<?php
session_start();
$succes = null;

if (isset($_GET['succes']) && $_GET['succes'] === "inscription") {
  $succes = true;
}
$code_erreur = null;
if (isset($_GET['erreur'])){
  $code_erreur = (int) $_GET['erreur'];
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="./style.css" >
    <script src="./script.js" defer></script>
</head>
<body>
  <fieldset>
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
    <?php 
      if($code_erreur === 1){
        ?><div class="erreur">Vos identifiants sont incorrects</div>
      <?php
      }
      ?>
  </fieldset>
</body>
</html>