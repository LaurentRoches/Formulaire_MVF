<?php

final class Database{
    private $_UserDB;
    private $_ReservationDB;

    //Dire à la Database de se lier au fichier csv
    public function __construct(){
        $this-> _UserDB = __DIR__."../csv/utilisateurs.csv";
        $this-> _ReservationDB = __DIR__."../csv/reservations.csv";
    }

    /**
     * Sauvegarder utilisateur dans BDD
     *
     * @param   User  $user    Objet de la classe User
     *
     * @return  bool         True si réussi, False sinon
     */
    public function saveUser($user) {
        //Lire ET écrire la BDD:
        $acces = fopen($this->_UserDB, 'ab');
        //Définit une variable pour savoir si l'écriture à fonctionner
        //Puis écrit la ligne dans le csv
        $ecris = fputcsv($acces, $user->getObjectToArray());
        //Fermer la lecture de la BDD
        fclose($acces);
        // Recupère la variable d'écriture:
        return $ecris;
    }

    /**
     * Sauvegarder la réservation dans la BDD
     *
     * @param   Reservation  $reservation  objet de la classe Reservation
     *
     * @return  bool                TRUE si réussis, FALSE sinon
     */
    public function saveReservation($reservation){
        //Lire ET écrire la BDD:
        $acces = fopen($this->_ReservationDB, 'ab');
        //Définit une variable pour savoir si l'écriture à fonctionner
        //Puis écrit la ligne dans le csv
        $ecris = fputcsv($acces, $reservation->getObjectToArray());
        //Fermer la lecture de la BDD
        fclose($acces);
        // Recupère la variable d'écriture:
        return $ecris;
    }

    /**
     * Récupérer tous les utilisateurs sous un tableau:
     *
     * @return  array  un tableau de tous les utilisateurs
     */
    public function getAllUtilisateurs() {
        //lire la BDD:
        $acces = fopen($this->_UserDB, 'r');
        //on créer notre tableau pour y stocker les valeurs:
        $utilisateurs = [];
        //on va lire les lignes de la BDD tant qu'il en existe:
        while (($user = fgetcsv($acces, 1000)) !== FALSE){
            //on entre l'utilisateur trouvé dans notre tableau:
            $utilisateurs[] = new User ($user[0], $user[1], $user[2], $user[3], $user[4], $user[5], $user[6],);
        }
        //Fermer la lecture de la BDD
        fclose($acces);
        //Récupérer le tableau !:
        return $utilisateurs;
    }

    /**
     * Récupérer toutes les réservations sous un tableau
     *
     * @return  array  un tableau de toutes es réservations
     */
    public function getAllReservations() {
        //lire la BDD:
        $acces = fopen($this->_ReservationDB, 'r');
        //on créer notre tableau pour y stocker les valeurs:
        $reservations = [];
        //on va lire les lignes de la BDD tant qu'il en existe:
        while (($reservation = fgetcsv($acces, 1000)) !== FALSE){
            //on entre l'utilisateur trouvé dans notre tableau:
            $reservations[] = new Reservation ($reservation[0], $reservation[1], $reservation[2], $reservation[3], $reservation[4], $reservation[5], $reservation[6], $reservation[7], $reservation[8]);
        }
        //Fermer la lecture de la BDD
        fclose($acces);
        //Récupérer le tableau !:
        return $reservations;
    }

    /**
     * Trouver un utilisateur par son mail:
     *
     * @param   string  $mail  mail donné
     *
     * @return  bool | string         donne le user ou False
     */
    public function getUtilisateurByMail($mail) {
        //lire la BDD:
        $acces = fopen($this->_UserDB, 'r');
        //on va lire les lignes tant qu'il en existe:
        while (($user = fgetcsv($acces, 1000)) !== FALSE){
            // Si l'uilisateur a un mail:
            if($user[2] == $mail){
                //On instancie l'utilisateur
                $user = new User ($user[0], $user[1], $user[2], $user[3], $user[4], $user[5], $user[6],);
                //Et on arrete:
                break;
            } //Sinon (s'il n'en a pas):
            else{
                //On le marque faux:
                $user = FALSE;
            }
        }
        //Fermer la lecture de la BDD
        fclose($acces);
        //Récupérer l'utilisateur !:
        return $user;
    }

    /**
     * Trouver une réservation par son mail:
     *
     * @param   string  $mail  mail donné
     *
     * @return  bool | string         donne la réservation ou FALSE
     */
    public function getReservationByMail($mail) {
        //lire la BDD:
        $acces = fopen($this->_ReservationDB, 'r');
        //on va lire les lignes tant qu'il en existe:
        while (($reservation = fgetcsv($acces, 1000)) !== FALSE){
            // Si la réservation a un mail:
            if($reservation[8] == $mail){
                //On instancie la réservation
                $reservation = new Reservation ($reservation[0], $reservation[1], $reservation[2], $reservation[3], $reservation[4], $reservation[5], $reservation[6], $reservation[7], $reservation[8]);
                //Et on arrete:
                break;
            } //Sinon (s'il n'en a pas):
            else{
                //On le marque faux:
                $reservation = FALSE;
            }
        }
        //Fermer la lecture de la BDD
        fclose($acces);
        //Récupérer la réservation !:
        return $reservation;
    }

    /**
     * Trouver un utilisateur par son id:
     *
     * @param   int  $id  id donné
     *
     * @return  bool | int       donne le user ou False
     */
    public function getUtilisateurById($id) {
        //lire la BDD:
        $acces = fopen($this->_UserDB, 'r');
        //on va lire les lignes tant qu'il en existe:
        while (($user = fgetcsv($acces, 1000)) !== FALSE){
            // Si l'uilisateur a un id:
            if($user[6] == $id){
                //On instancie l'utilisateur
                $user = new User ($user[0], $user[1], $user[2], $user[3], $user[4], $user[5], $user[6],);
                //Et on arrete:
                break;
            } //Sinon (s'il n'en a pas):
            else{
                //On le marque faux:
                $user = FALSE;
            }
        }
        //Fermer la lecture de la BDD
        fclose($acces);
        //Récupérer l'utilisateur !:
        return $user;
    }

    /**
     * Trouver une réservation par son id:
     *
     * @param   int  $id  id donné
     *
     * @return  bool | int       donner la réservation ou FALSE
     */
    public function getRéservationById($id) {
        //lire la BDD:
        $acces = fopen($this->_ReservationDB, 'r');
        //on va lire les lignes tant qu'il en existe:
        while (($reservation = fgetcsv($acces, 1000)) !== FALSE){
            // Si la réservation a un id:
            if($reservation[8] == $id){
                //On instancie la réservation
                $reservation = new Reservation ($reservation[0], $reservation[1], $reservation[2], $reservation[3], $reservation[4], $reservation[5], $reservation[6], $reservation[7], $reservation[8],);
                //Et on arrete:
                break;
            } //Sinon (s'il n'en a pas):
            else{
                //On le marque faux:
                $reservation = FALSE;
            }
        }
        //Fermer la lecture de la BDD
        fclose($acces);
        //Récupérer la réservation !:
        return $reservation;
    }

}