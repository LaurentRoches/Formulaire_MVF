<?php

//Vérification du nombre de réservation
if (isset($_POST['nombrePlaces']) && is_numeric($_POST['nombrePlaces']) && !empty($_POST['nombrePlaces'])) {
    $nombrePlaces = htmlspecialchars($_POST['nombrePlaces']);
} else {
    header('location:../index.php?erreur=ERREUR_NBDERESERVATION');
    exit(); 
   
}
if(isset($_POST['tarifReduit'])&& !empty($_POST['tarifReduit'])){
    $tarifReduit = htmlspecialchars($_POST['tarifReduit']);
}else{
    header('location:../index.php?erreur=ERREUR_TARIF');
}

if (isset($_POST['pass1jour']) && !empty($_POST['pass1jour'])) {
    $pass1jour = htmlspecialchars($_POST['pass1jour']);
} else {
    header('location:../index.php?erreur=ERREUR_PASS1');
}

if (isset($_POST['pass1jourReduit']) && !empty($_POST['pass1jourReduit'])) {
    $pass1jourReduit = htmlspecialchars($_POST['pass1jourReduit']);
} else {
    header('location:../index.php?erreur=ERREUR_PASS1REDUIT');
}

if (isset($_POST['choixJour1']) && !empty($_POST['choixJour1'])) {
    $choixJour1 = htmlspecialchars($_POST['choixJour1']);
} else {
    header('location:../index.php?erreur=ERREUR_JOUR1');
}

if (isset($_POST['choixJour2']) && !empty($_POST['choixJour2'])) {
    $choixJour2 = htmlspecialchars($_POST['choixJour2']);
} else {
    header('location:../index.php?erreur=ERREUR_JOUR2');
}
if (isset($_POST['choixJour3']) && !empty($_POST['choixJour3'])) {
    $choixJour3 = htmlspecialchars($_POST['choixJour3']);
} else {
    header('location:../index.php?erreur=ERREUR_JOUR3');
}
if (isset($_POST['pass2jours']) && !empty($_POST['pass2jours'])) {
    $pass2jours = htmlspecialchars($_POST['pass2jours']);
} else {
    header('location:../index.php?erreur=ERREUR_PASS2');
}
if (isset($_POST['pass2joursReduit']) && !empty($_POST['pass2joursReduit'])) {
    $pass2joursReduit = htmlspecialchars($_POST['pass2joursReduit']);
} else {
    header('location:../index.php?erreur=ERREUR_PASS2REDUIT');
}
if (isset($_POST['choixJour12']) && !empty($_POST['choixJour12'])) {
    $choixJour12 = htmlspecialchars($_POST['choixJour12']);
} else {
    header('location:../index.php?erreur=ERREUR_JOUR12');
}
if (isset($_POST['choixJour23']) && !empty($_POST['choixJour23'])) {
    $choixJour23 = htmlspecialchars($_POST['choixJour23']);
} else {
    header('location:../index.php?erreur=ERREUR_JOUR23');
}
if (isset($_POST['pass3jours']) && !empty($_POST['pass3jours'])) {
    $pass3jours = htmlspecialchars($_POST['pass3jours']);
} else {
    header('location:../index.php?erreur=ERREUR_PASS3');
}
if (isset($_POST['pass3joursReduit']) && !empty($_POST['pass3joursReduit'])) {
    $pass3joursReduit = htmlspecialchars($_POST['pass3joursReduit']);
} else {
    header('location:../index.php?erreur=ERREUR_PASS3REDUIT');
}
if (isset($_POST['tenteNuit1']) && !empty($_POST['tenteNuit1'])) {
    $tenteNuit1 = htmlspecialchars($_POST['tenteNuit1']);
} else {
    header('location:../index.php?erreur=ERREUR_TENTE1');
}
if (isset($_POST['tenteNuit2']) && !empty($_POST['tenteNuit2'])) {
    $tenteNuit2 = htmlspecialchars($_POST['tenteNuit2']);
} else {
    header('location:../index.php?erreur=ERREUR_TENTE2');
}
if (isset($_POST['tenteNuit3']) && !empty($_POST['tenteNuit3'])) {
    $tenteNuit3 = htmlspecialchars($_POST['tenteNuit3']);
} else {
    header('location:../index.php?erreur=ERREUR_TENTE3');
}
if (isset($_POST['tente3Nuits']) && !empty($_POST['tente3Nuits'])) {
    $tente3Nuits = htmlspecialchars($_POST['tente3Nuits']);
} else {
    header('location:../index.php?erreur=ERREUR_TENTE3NUITS');
}
if (isset($_POST['vanNuit1']) && !empty($_POST['vanNuit1'])) {
    $vanNuit1 = htmlspecialchars($_POST['vanNuit1']);
} else {
    header('location:../index.php?erreur=ERREUR_VAN1');
}
if (isset($_POST['vanNuit2']) && !empty($_POST['vanNuit2'])) {
    $vanNuit2 = htmlspecialchars($_POST['vanNuit2']);
} else {
    header('location:../index.php?erreur=ERREUR_VAN2');
}
if (isset($_POST['vanNuit3']) && !empty($_POST['vanNuit3'])) {
    $vanNuit3 = htmlspecialchars($_POST['vanNuit3']);
} else {
    header('location:../index.php?erreur=ERREUR_VAN3');
}
if (isset($_POST['van3Nuits']) && !empty($_POST['van3Nuits'])) {
    $van3Nuits = htmlspecialchars($_POST['van3Nuits']);
} else {
    header('location:../index.php?erreur=ERREUR_VAN3NUITS');
}
if (isset($_POST['enfantsOui']) && !empty($_POST['enfantsOui'])) {
    $enfantsOui = htmlspecialchars($_POST['enfantsOui']);
} else {
    header('location:../index.php?erreur=ERREUR_ENFANTSOUI');
}
if (isset($_POST['enfantsNon']) && !empty($_POST['enfantsNon'])) {
    $enfantsNon = htmlspecialchars($_POST['enfantsNon']);
} else {
    header('location:../index.php?erreur=ERREUR_ENFANTNON');
}
if (isset($_POST['nombreCasquesEnfants']) && is_numeric($_POST['nombreCasquesEnfants']) && !empty($_POST['nombreCasquesEnfants'])) {
    $nombreCasquesEnfants = htmlspecialchars($_POST['nombreCasquesEnfants']);
} else {
    header('location:../index.php?erreur=ERREUR_NBCASQUESENFANTS');
    exit();
}
if (isset($_POST['NombreLugesEte']) && is_numeric($_POST['NombreLugesEte']) && !empty($_POST['NombreLugesEte'])) {
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
    }
}
if (isset($_POST['telephone']) && is_numeric($_POST['telephone']) && !empty($_POST['telephone'])) {
            if (strlen($_POST['telephone']) >= 10) {
            $telephone = htmlspecialchars($_POST['telephone']);
            } else {
                header('location:../index.php?erreur=ERREUR_TELEPHONE');
            }
        }
if (isset($_POST['adressePostale'])&& is_string($_POST['adressePostale']) && !empty($_POST['adressePostale'])) {
    $adressePostale = htmlspecialchars($_POST['adressePostale']);
} else {
    header('location:../index.php?erreur=ERREUR_ADRESSE');
}
$user = new User($nom, $prenom, $email, $mdp, $telephone, $adresse);
$retour = $Database->saveUtilisateur($user);
if ($retour) {
        header('location:../connexion.php?succes=inscription');
        die;
    } else {
        header('location:../index.php?erreur=ERREUR_ENREGISTREMENT');
        die;
    }

