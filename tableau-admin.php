<?php
session_start();
require './src/classes/Database.php';
require './src/classes/User.php';
require './src/classes/Reservation.php';

//Si on est pas connecté ou si l'utilisateur n'a pas été trouvé:
if (!isset($_SESSION['connecté']) && empty($_SESSION['user'])){
    //On renvoie à la connexion:
    header('location: ./confirmation.php');
    die;
}
$user = unserialize($_SESSION['user']);
if ($user->Admin() == FALSE){
    header('location: ./tableau-de-bord.php');
}

$BDD = new Database();
$utilisateurs = $BDD->getAllUtilisateurs();
$reservations = $BDD->getAllReservations();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau Admin</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <fieldset>
        <div>
            <table>
                <caption><h1>Liste des utilisateurs</h1></caption>
                <tr>
                    <th>ID</th>
                    <th>NOM</th>
                    <th>Prenom</th>
                    <th>email</th>
                    <th>rôle</th>
                </tr>
                <?php foreach ($utilisateurs as $utilisateur) { ?>
                <tr>
                    <td><?= $utilisateur->getId() ?></td>
                    <td><?= $utilisateur->getNom() ?></td>
                    <td><?= $utilisateur->getPrenom() ?></td>
                    <td><?= $utilisateur->getMail() ?></td>
                    <td><?= $utilisateur->getRole() ?></td>
                </tr>
                <?php } ?>
            </table>
        </div>
        <div>
            <table>
                <caption><h1>Liste des réservations</h1></caption>
                <tr>
                    <th>ID</th>
                    <th>Nombre de places</th>
                    <th>Pass</th>
                    <th>Journées</th>
                    <th>Nuits</th>
                    <th>Enfants</th>
                    <th>Casques</th>
                    <th>Luges</th>
                    <th>Total</th>
                    <th>email</th>
                </tr>
                <?php foreach ($reservations as $reservation) { ?>
                <tr>
                    <td><?= $reservation->getId() ?></td>
                    <td><?= $reservation->getnombrePlaces() ?></td>
                    <td><?= $reservation->getpass() ?></td>
                    <td><?= $reservation->getjournee() ?></td>
                    <td><?= $reservation->getnuit() ?></td>
                    <td><?= $reservation->getenfants() ?></td>
                    <td><?= $reservation->getcasques() ?></td>
                    <td><?= $reservation->getluges() ?></td>
                    <td><?= $reservation->gettotal() ?></td>
                    <td><?= $reservation->getMail() ?></td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </fieldset>
</body>
</html>