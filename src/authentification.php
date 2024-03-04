<?php
session_start();
require './config.php';
require './classes/Database.php';
require './classes/User.php';
require './classes/Reservation.php';
$Database = new Database();


//Si les champs existent et ne sont pas vide:
if (isset($_POST['mail']) && !empty($_POST['mail']) && isset($_POST['password']) && !empty($_POST['password'])){
    //on sécurise l'e-mail:
    $mail = htmlspecialchars($_POST['mail']);
    //on récupère le bon utilisateur dans la bdd:
    $userEgalMail = $Database -> getUtilisateurByMail($mail);
    //si cet utilisateur existe
        //on verifie que les mdps sont les bons
    if ($userEgalMail) {
        if (password_verify($_POST['password'], $userEgalMail->getMdp())) {
            //on récupère les réservations correspondantes:
            $reservationEgalMail = $Database -> getReservationByMail($mail);
            //on vérifie si ces réservations existent:
            if ($reservationEgalMail){
                //connecter
                $_SESSION['connecté'] = TRUE;
                $_SESSION['user'] = serialize($userEgalMail);
                header('location: ../tableau-admin.php');
                $_SESSION['reservation'] = serialize($reservationEgalMail);
                die;
            } else{
                //connecter sans réservation
                $_SESSION['connecté'] = TRUE;
                $_SESSION['user'] = serialize($userEgalMail);
                header('location: ../tableau-admin.php');
                die;
            }
        }
    } else {
    //mettre une erreur générale
    header('location: ../confirmation.php?erreur='.ERREUR_IDENTIFIANTS);
    }
}



?>