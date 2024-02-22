<?php
session_start();
require './src/classes/Database.php';
require './classes/User.php';
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
            //connecter
            $_SESSION['connecté'] = TRUE;
            $_SESSION['user'] = serialize($userEgalMail);
            header('location: ../tableau-de-bord.php');
            die;
        }
    }
} else {
    //mettre une erreur générale
    header('location: ../confirmation.php?erreur');
}



?>
