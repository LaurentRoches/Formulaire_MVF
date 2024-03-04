<?php
session_start();
require './classes/Database.php';
require './classes/User.php';
require './classes/Reservation.php';
$Database = new Database();
$pass = [];
$journee = [];
$nuit = [];
$enfants = [];
$total = 0;


//Vérification du nombre de réservation
if (isset($_POST['nombrePlaces']) && is_numeric($_POST['nombrePlaces']) && !empty($_POST['nombrePlaces'])) {
    $nombrePlaces = (int) $_POST['nombrePlaces'];
    if ($nombrePlaces === 0) {
        header('location:../index.php?erreur=ERREUR_NBDERESERVATION');
        exit();
    }
}

if (isset($_POST['tarifReduit'])) {
    $tarifReduit = htmlspecialchars($_POST['tarifReduit']);
}

if (isset($_POST['choixJour1'])) {
    $choixJour1 = htmlspecialchars($_POST['choixJour1']);
    array_push($journee, 'La journée du 01/07');
}

if (isset($_POST['choixJour2'])) {
    $choixJour2 = htmlspecialchars($_POST['choixJour2']);
    array_push($journee, 'La journée du 02/07');
}

if (isset($_POST['choixJour3'])) {
    $choixJour3 = htmlspecialchars($_POST['choixJour3']);
    array_push($journee, 'La journée du 03/07');
}

if (isset($_POST['choixJour12'])) {
    $choixJour12 = htmlspecialchars($_POST['choixJour12']);
    array_push($journee, 'Les journées du 01 & 02/07');
}

if (isset($_POST['choixJour23'])) {
    $choixJour23 = htmlspecialchars($_POST['choixJour23']);
    array_push($journee, 'Les journées du 02 & 03/07');
}


if (isset($_POST['pass1jour'])) {
    $pass1jour = htmlspecialchars($_POST['pass1jour']);
    array_push($pass, 'Le pass 1 jour');
    $total = ($total +($nombrePlaces * 40 * count($journee)));
}

if (isset($_POST['pass1jourReduit'])) {
    $pass1jourReduit = htmlspecialchars($_POST['pass1jourReduit']);
    array_push($pass, 'Le pass 1 jour en tarif réduit');
    $total = ($total + ($nombrePlaces * 25 * count($journee)));
}

if (isset($_POST['pass2jours'])) {
    $pass2jours = htmlspecialchars($_POST['pass2jours']);
    array_push($pass, 'Le pass 2 jours');
    $total = ($total + ($nombrePlaces * count($journee) * 70));
}

if (isset($_POST['pass2joursReduit'])) {
    $pass2joursReduit = htmlspecialchars($_POST['pass2joursReduit']);
    array_push($pass, 'Le pass 2 jours en tarif réduit');
    $total = ($total + ($nombrePlaces * count($journee) * 50));
}

if (isset($_POST['pass3jours'])) {
    $pass3jours = htmlspecialchars($_POST['pass3jours']);
    array_push($pass, 'Le pass3jours');
    $total = ($total + ($nombrePlaces * 100));
}

if (isset($_POST['pass3joursReduit'])) {
    $pass3joursReduit = htmlspecialchars($_POST['pass3joursReduit']);
    array_push($pass, 'Le pass 3 jours en tarif réduit');
    $total = ($total + ($nombrePlaces * 65));
}

if (isset($_POST['tenteNuit1'])) {
    $tenteNuit1 = htmlspecialchars($_POST['tenteNuit1']);
    array_push($nuit, 'une tente pour la nuit du 01/07');
    $total = ($total + 5);
}

if (isset($_POST['tenteNuit2'])) {
    $tenteNuit2 = htmlspecialchars($_POST['tenteNuit2']);
    array_push($nuit, 'une tente pour la nuit du 02/07');
    $total = ($total + 5);
}

if (isset($_POST['tenteNuit3'])) {
    $tenteNuit3 = htmlspecialchars($_POST['tenteNuit3']);
    array_push($nuit, 'une tente pour la nuit du 03/07');
    $total = ($total + 5);
}

if (isset($_POST['tente3Nuits'])) {
    $tente3Nuits = htmlspecialchars($_POST['tente3Nuits']);
    array_push($nuit, 'une tente pour les 3 nuits');
    $total = ($total + 12);
}

if (isset($_POST['vanNuit1'])) {
    $vanNuit1 = htmlspecialchars($_POST['vanNuit1']);
    array_push($nuit, 'un van pour la nuit du 01/07');
    $total = ($total + 5);
}

if (isset($_POST['vanNuit2'])) {
    $vanNuit2 = htmlspecialchars($_POST['vanNuit2']);
    array_push($nuit, 'un van pour la nuit du 02/07');
    $total = ($total + 5);
}

if (isset($_POST['vanNuit3'])) {
    $vanNuit3 = htmlspecialchars($_POST['vanNuit3']);
    array_push($nuit, 'un van pour la nuit du 03/07');
    $total = ($total + 5);
}

if (isset($_POST['van3Nuits'])) {
    $van3Nuits = htmlspecialchars($_POST['van3Nuits']);
    array_push($nuit, 'un van pour les 3 nuits');
    $total = ($total + 12);
}

if (isset($_POST['enfantsOui'])) {
    $enfantsOui = htmlspecialchars($_POST['enfantsOui']);
    array_push($enfants, 'Vous venez avec des enfants');
}

if (isset($_POST['enfantsNon'])) {
    $enfantsNon = htmlspecialchars($_POST['enfantsNon']);
    array_push($enfants, 'Vous venez sans enfants');
}

if (isset($_POST['nombreCasquesEnfants']) && is_numeric($_POST['nombreCasquesEnfants'])) {
    $nombreCasquesEnfants = htmlspecialchars($_POST['nombreCasquesEnfants']);
    $total = ($total + ((int)$nombreCasquesEnfants * 2));
} else if (empty($_POST['nombreCasquesEnfants'])) {
    $nombreCasquesEnfants = htmlspecialchars($_POST['nombreCasquesEnfants']);
} else {
    header('location:../index.php?erreur=ERREUR_NBCASQUESENFANTS');
    exit();
}

if (isset($_POST['NombreLugesEte']) && is_numeric($_POST['NombreLugesEte'])) {
    $NombreLugesEte = htmlspecialchars($_POST['NombreLugesEte']);
    $total = ($total + ((int)$NombreLugesEte * 5));
} else if (empty($_POST['NombreLugesEte'])) {
    $NombreLugesEte = htmlspecialchars($_POST['NombreLugesEte']);
} else {
    header('location:../index.php?erreur=ERREUR_NBLUGESETE');
    exit();
}

if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['telephone']) && isset($_POST['adressePostale']) && !empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email']) && !empty($_POST['telephone']) && !empty($_POST['adressePostale'])) {
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $email = htmlspecialchars($_POST['email']);
    } else {
        header('location:../index.php?erreur=ERREUR_EMAIL');
        die;
    }
}

if (isset($_POST['telephone']) && is_numeric($_POST['telephone']) && !empty($_POST['telephone'])) {
    if (strlen($_POST['telephone']) >= 10) {
        $telephone = htmlspecialchars($_POST['telephone']);
    } else {
        header('location:../index.php?erreur=ERREUR_TELEPHONE');
        die;
    }
}

if (isset($_POST['adressePostale']) && is_string($_POST['adressePostale']) && !empty($_POST['adressePostale'])) {
    $adressePostale = htmlspecialchars($_POST['adressePostale']);
} else {
    header('location:../index.php?erreur=ERREUR_ADRESSE');
    die;
}

if (isset($_POST['password']) && isset($_POST['password2'])) {
    if (!empty($_POST['password']) && !empty($_POST['password2'])) {
        if ($_POST['password'] === $_POST['password2']) {
            if (strlen($_POST['password']) >= 8) {
                $mdp = password_hash($_POST['password'], PASSWORD_DEFAULT);
            } else {
                header('location:../index.php?erreur=ERREUR_MDP_TAILLE');
                die;
            }
        } else {
            header('location:../index.php?erreur=ERREUR_MDP_IDENTIQUE');
            die;
        }
    } else {
        header('location:../index.php?erreur=ERREUR_MDP_ABSENT');
        die;

    }
}


$reservation = new Reservation ($nombrePlaces, implode(",",$pass), implode(",",$journee), implode(",",$nuit), implode(",",$enfants), $nombreCasquesEnfants, $NombreLugesEte, $total, $email);
$retourReservation = $Database->saveReservation($reservation);

if ($retourReservation) {
    $user = new User($nom, $prenom, $email, $mdp, $telephone, $adressePostale);
    $retour = $Database->saveUser($user);
    if ($retour) {
        header('location:../confirmation.php?succes=inscription');
        die;
    } 
}else {
    header('location:../index.php?erreur=ERREUR_ENREGISTREMENT');
    die;
}
