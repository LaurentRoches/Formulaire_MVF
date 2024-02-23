<?php

class User {
    private $_id;
    private $_nom;
    private $_prenom;
    private $_mail;
    private $_mdp;
    private $_tel;
    private $_adresse;

    public function __construct(string $nom, string $prenom, string $mail, string $mdp,  $tel, string $adresse, int|string $id = "à créer")
    {
        $this -> setNom($nom);
        $this -> setPrenom($prenom);
        $this -> setMail($mail);
        $this -> setMdp($mdp);
        $this -> setTel($tel);
        $this -> setAdresse($adresse);
        $this -> setId($id);
    }
    // Pour l'id
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
    // Définir l'id en suite continue
    private function nextId():int {
        $Database = new Database();
        $utilisateurs = $Database->getAllUtilisateurs();
        $IDs = [];
        foreach($utilisateurs as $utilisateur) {
            $IDs [] = $utilisateur->getId();
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
    // Pour le nom
    public function getNom(): string {
        return $this -> _nom;
    }
    public function setNom (string $nom):void {
        $this -> _nom = $nom;
    }
    // Pour le prenom
    public function getPrenom(): string {
        return $this -> _prenom;
    }
    public function setPrenom (string $prenom):void {
        $this -> _prenom = $prenom;
    }
    // Pour le mail
    public function getMail(): string {
        return $this -> _mail;
    }
    public function setMail (string $mail):void {
        $this -> _mail = $mail;
    }
    // Pour le mdp
    public function getMdp(): string {
        return $this -> _mdp;
    }
    public function setMdp (string $mdp):void {
        $this -> _mdp = $mdp;
    }
    //vérif mdp:
    public function password_verif(string $mdp) : bool {
        return password_verify($mdp,$this->getMdp());
    }
    // Pour le tel
    public function getTel() {
        return $this -> _tel;
    }
    public function setTel ($tel):void {
        $this -> _tel = $tel;
    }
    // Pour l'adresse
    public function getAdresse(): string {
        return $this -> _adresse;
    }
    public function setAdresse (string $adresse):void {
        $this -> _adresse = $adresse;
    }
    //Pour enregistrer sous forme de tableau:
    public function  getObjectToArray(): array {
        return [
            'nom' => $this -> getNom(),
            'prenom' => $this -> getPrenom(),
            'mail' => $this -> getMail(),
            'mdp' => $this -> getMdp(),
            'tel' =>$this -> getTel(),
            'adresse' => $this -> getAdresse(),
            'id' => $this -> getId(),
        ];
    }
}


?>