<?php
session_start();
$code_erreur= null;
if (isset($_GET['erreur'])){
  $code_erreur = (int) $_GET['erreur'];
  
}


?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulaire de réservation Music Vercos Festival</title>
  <link rel="stylesheet" href="./style.css">
  <script src="./script.js" defer></script>
</head>

<body>

  <form action="./src/traitement.php" id="inscription" method="POST">
    <fieldset id="reservation" >
      <div class="connexion">
        <h2>Déjà réservé? Connectez-vous! :</h2>
        <a href="./confirmation.php">Cliquez ici</a>
      </div>

      <legend>Réservation</legend>
      <?php 
      if($code_erreur === 0){
        ?><div class="erreur">Une erreur est survenue, veuillez ré-éssayer plus tard</div>
      <?php
      }
      ?>
      <h3>Nombre de réservation(s) :</h3>
      <input type="number" name="nombrePlaces" id="NombrePlaces" required>
      <?php 
      if($code_erreur === 2){
        ?><div class="erreur">Veuillez entrer un nombre de réservation</div>
      <?php
      }
      ?>
      <h3>Réservation(s) en tarif réduit</h3>
      <label for="tarifReduit">Ma réservation sera en tarif réduit</label>
      <input type="checkbox" name="tarifReduit" id="tarifReduit">

      <h3>Choisissez votre formule :</h3>

      <label for="pass1jour">Pass 1 jour : 40€</label>
      <input type="checkbox" name="pass1jour" id="pass1jour">

      <label for="pass1jour" style="display:none;">Pass 1 jour : 25€</label>
      <input type="checkbox" name="pass1jourReduit" id="pass1jourReduit" style="display:none;">

      <!-- Si case cochée, afficher le choix du jour -->
      <section id="pass1jourDate">
        <input type="checkbox" name="choixJour1" id="choixJour1">
        <label for="choixJour1">Pass pour la journée du 01/07</label>
        <input type="checkbox" name="choixJour2" id="choixJour2">
        <label for="choixJour2">Pass pour la journée du 02/07</label>
        <input type="checkbox" name="choixJour3" id="choixJour3">
        <label for="choixJour3">Pass pour la journée du 03/07</label>
      </section>


      <label for="pass2jours">Pass 2 jours : 70€</label>
      <input type="checkbox" name="pass2jours" id="pass2jours">

      <label for="pass2jours" style="display:none;">Pass 2 jours : 50€</label>
      <input type="checkbox" name="pass2joursReduit" id="pass2joursReduit" style="display:none;">

      <!-- Si case cochée, afficher le choix des jours -->
      <section id="pass2joursDate">
        <input type="checkbox" name="choixJour12" id="choixJour12">
        <label for="choixJour12">Pass pour deux journées du 01/07 au 02/07</label>
        <input type="checkbox" name="choixJour23" id="choixJour23">
        <label for="choixJour23">Pass pour deux journées du 02/07 au 03/07</label>
      </section>


      <label for="pass3jours">Pass 3 jours : 100€</label>
      <input type="checkbox" name="pass3jours" id="pass3jours">

      <label for="pass3jours" style="display:none;">Pass 3 jours : 65€</label>
      <input type="checkbox" name="pass3joursReduit" id="pass3joursReduit" style="display:none;">

      <!-- FACULTATIF : ajouter un pass groupe (5 adultes : 150€ / jour) uniquement pass 1 jour -->

      <button class="bouton" onclick="suivant('options')">Suivant</button>

    </fieldset>
    <fieldset id="options" style="display:none;">
      <legend>Options</legend>
      <h3>Réserver un emplacement de tente : </h3>
      <input type="checkbox" id="tenteNuit1" name="tenteNuit1">
      <label for="tenteNuit1">Pour la nuit du 01/07 (5€)</label>
      <input type="checkbox" id="tenteNuit2" name="tenteNuit2">
      <label for="tenteNuit2">Pour la nuit du 02/07 (5€)</label>
      <input type="checkbox" id="tenteNuit3" name="tenteNuit3">
      <label for="tenteNuit3">Pour la nuit du 03/07 (5€)</label>
      <input type="checkbox" id="tente3Nuits" name="tente3Nuits">
      <label for="tente3Nuits">Pour les 3 nuits (12€)</label>

      <h3>Réserver un emplacement de camion aménagé : </h3>
      <input type="checkbox" id="vanNuit1" name="vanNuit1">
      <label for="vanNuit1">Pour la nuit du 01/07 (5€)</label>
      <input type="checkbox" id="vanNuit2" name="vanNuit2">
      <label for="vanNuit2">Pour la nuit du 02/07 (5€)</label>
      <input type="checkbox" id="vanNuit3" name="vanNuit3">
      <label for="vanNuit3">Pour la nuit du 03/07 (5€)</label>
      <input type="checkbox" id="van3Nuits" name="van3Nuits">
      <label for="van3Nuits">Pour les 3 nuits (12€)</label>

      <h3>Venez-vous avec des enfants ?</h3>
      <input type="checkbox" name="enfantsOui" id="enfantsOui"><label for="enfantsOui">Oui</label>
      <input type="checkbox" name="enfantsNon" id="enfantsNon"><label for="enfantsNon">Non</label>

      <!-- Si oui, afficher : -->
      <section id="demonsPresent">
        <h4>Voulez-vous louer un casque antibruit pour enfants* (2€ / casque) ?</h4>
        <label for="nombreCasquesEnfants">Nombre de casques souhaités :</label>
        <input type="number" name="nombreCasquesEnfants" id="nombreCasquesEnfants">
        <?php 
        if($code_erreur === 3){
          ?><div class="erreur">Veuillez entrer le nombre de casques souhaité</div>
        <?php
        }
        ?>
        <p>*Dans la limite des stocks disponibles.</p>
      </section>


      <h3>Profitez de descentes en luge d'été à tarifs avantageux ! (5€)</h3>
      <label for="NombreLugesEte">Nombre de descentes en luge d'été :</label>

      <input type="number" name="NombreLugesEte" id="NombreLugesEte">
      <?php 
      if($code_erreur === 4){
        ?><div class="erreur">Veuillez entrer le nombre de descentes souhaité</div>
      <?php
      }
      ?>

      <button class="bouton" onclick="suivant('coordonnees')">Suivant</button>
    </fieldset>
    <fieldset id="coordonnees" style="display:none;">
      <legend>Coordonnées</legend>
      <label for="nom">Nom :</label>
      <input type="text" name="nom" id="nom" required>
      <label for="prenom">Prénom :</label>
      <input type="text" name="prenom" id="prenom" required>
      <label for="email">Email :</label>
      <input type="email" name="email" id="email" required>
      <?php 
      if($code_erreur === 5){
        ?><div class="erreur">Veuillez entrer une adresse mail valide</div>
      <?php
      }
      ?>
      <label for="telephone">Téléphone :</label>
      <input type="text" name="telephone" id="telephone" required>
      <?php 
      if($code_erreur === 6){
        ?><div class="erreur">Veuillez entrer un numéro de téléphone valide</div>
      <?php
      }
      ?>
      <label for="adressePostale">Adresse Postale :</label>
      <input type="text" name="adressePostale" id="adressePostale" required>
      <?php 
      if($code_erreur === 7){
        ?><div class="erreur">Veuillez entrer votre adresse postale</div>
      <?php
      }
      ?>
      <label for="password">Mot de passe :</label>
      <input type="password" id="password" name="password" required>
      <?php 
      if($code_erreur === 8){
        ?><div class="erreur">Votre mot de passe doit contenir au moins 8 caractères</div>
      <?php
      }
      ?>
      <label for="password2">Vérifier le Mot de passe :</label>
      <input type="password" id="password2" name="password2" required>
      <?php 
      if($code_erreur === 9){
        ?><div class="erreur">Vos mots de passes ne sont pas identiques</div>
      <?php
      }else if($code_erreur === 10) {
      ?>
      <div class="erreur">Veuillez entrer un mot de passe</div>
      <?php
      }
      ?>
      <input type="submit" name="soumission" class="bouton" value="Réserver">
    </fieldset>
  </form>
</body>

</html>