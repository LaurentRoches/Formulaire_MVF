<?php
require './Database.php';

class Reservation {

    private $_reduit;
    private $_pass;
    private $_journee;
    private $_nuit;
    private $_enfants;
    private $_casques;
    private $_luges;
    private $_total;
    private $_mail;
    private $_id;

    public function __construct($reduit, $pass, $journee, $nuit, $enfants, $casques, $luges, $total, $mail, $id = "à créer") {
        $this -> setReduit($reduit);
        $this -> setPass($pass);
        $this -> setjournee($journee);
        $this -> setnuit($nuit);
        $this -> setenfants($enfants);
        $this -> setcasques($casques);
        $this -> setluges($luges);
        $this -> settotal($total);
        $this -> setMail($mail);
        $this -> setId($id);
    }

    public function getReduit() {
        return $this -> _reduit;
    }
    public function setReduit($reduit) {
        $this -> _reduit = $reduit;
    }

    public function getPass() {
        return $this -> _pass;
    }
    public function setPass($pass) {
        $this -> _pass = $pass;
    }

    public function getjournee() {
        return $this -> _journee;
    }
    public function setjournee($journee) {
        $this -> _journee = $journee;
    }

    public function getnuit() {
        return $this -> _nuit;
    }
    public function setnuit($nuit) {
        $this -> _nuit = $nuit;
    }

    public function getenfants() {
        return $this -> _enfants;
    }
    public function setenfants($enfants) {
        $this -> _enfants = $enfants;
    }

    public function getcasques() {
        return $this -> _casques;
    }
    public function setcasques($casques) {
        $this -> _casques = $casques;
    }

    public function getluges() {
        return $this -> _luges;
    }
    public function setluges($luges) {
        $this -> _luges = $luges;
    }

    public function gettotal() {
        return $this -> _total;
    }
    public function settotal($total) {
        $this -> _total = $total;
    }

    public function getMail() {
        return $this -> _mail;
    }
    public function setMail ($mail) {
        $this -> _mail = $mail;
    }

    public function getId(): int {
        return $this -> _id;
    }
    public function setId($id):void {
        if (is_string($id) && $id == "à créer") {
            $this -> _id = $this -> nextId();
        }else {
            $this -> _id = $id;
        }
    }
    private function nextId() {
        $Database = new Database();
        $reservations = $Database->getAllReservations();
        $IDs = [];
        foreach($reservations as $reservation) {
            $IDs [] = $reservation->getId();
        }
        $i = 1;
        $unique = false;
        while ($unique === false){
            if(in_array($i, $IDs)) {
                $i++;
            }else{
                $unique = true;
            }
        }
        return $i;
    }

    /**
     * enregistre sous forme de tableau la reservation
     *
     * @return  array  tableau prêt à être sauvegarder de la réservation
     */
    public function getObjectToArray(){
        return [
            'reduit' => $this -> getreduit(),
            'pass' => $this -> getpass(),
            'journee' => $this -> getjournee(),
            'nuit' => $this -> getnuit(),
            'enfants' =>$this -> getenfants(),
            'casques' => $this -> getcasques(),
            'luges' => $this -> getluges(),
            'total' => $this -> gettotal(),
            'mail' => $this -> getMail(),
            'id' => $this -> getId(),
        ];
    }
}