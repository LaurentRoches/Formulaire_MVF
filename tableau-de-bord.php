<?php
session_start();
require './src/classes/User.php';

//Si on est pas connecté ou si l'utilisateur n'a pas été trouvé:
if (!isset($_SESSION['connecté']) && empty($_SESSION['user'])){
    //On renvoie à la connexion:
    header('location: ./confirmation.php');
    die;
}
$user = unserialize($_SESSION['user']);