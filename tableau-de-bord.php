<?php
session_start();
require './src/classes/User.php';
require './src/classes/Reservation.php';

//Si on est pas connecté ou si l'utilisateur n'a pas été trouvé:
if (!isset($_SESSION['connecté']) && empty($_SESSION['user'])){
    //On renvoie à la connexion:
    header('location: ./confirmation.php');
    die;
}
$user = unserialize($_SESSION['user']);
if (isset($_SESSION['reservation'])){
    $reservation = unserialize($_SESSION['reservation']);
}else{
    $reservation = "Vous n'avez pas de réservation";
}
$nuits = $reservation->getnuit();
$journees = $reservation->getjournee();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau-de-bord</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <fieldset>
        <h1>Bonjour <?= $user->getNom()?> <?=$user->getPrenom()?> !</h1>
        <div>
            <?php 
            if(isset($_SESSION['reservation'])){?>
            <h2>Vous avez réservé:</h2>
            <ul>
                <li>Pour <?=$reservation->getnombrePlaces()?> personnes</li>
                <li><?=$reservation->getPass()?></li>
                <li><?php if($journees != ""){
                    echo "$journees";
                }else{
                    echo "Vous avez réservé les 3 journées";
                }?></li>
                <li><?php if($reservation->getnuit() != ""){
                    echo " $nuits ";
                }else{
                    echo "Vous n'avez pas réservé de nuit";
                }?></li>
                <li><?=$reservation->getenfants()?></li>
                <li><?php if($reservation->getcasques() != ""){
                    echo "Vous avez réservé ".$reservation->getcasques()." casques.";
                }else{
                    echo "Vous n'avez pas réservé de casques";
                }?></li>
                <li><?php if($reservation->getluges() != ""){
                    echo "Vous avez réservé ".$reservation->getluges()." descentes en luges.";
                }else{
                    echo "Vous n'avez pas réservé de descentes en luges";
                }?></li>
            </ul>
            <p>Pour un total de<strong> <?=$reservation->gettotal()?> </strong>€!</p>
            <?php }
            else{?>
            <p><?=$reservation?></p>
            <?php }?>
        </div>
    </fieldset>
</body>
</html>