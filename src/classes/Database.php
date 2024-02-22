<?php

final class Database{
    private $_DB;

    //Dire à la Database de se lier au fichier csv
    public function __construct(){
        $this-> _DB = __DIR__."../csv/utilisateurs.csv";
    }

    //Sauvegarder utilisateur dans BDD:
    public function saveUser($user) {
        //Lire ET écrire la BDD:
        $acces = fopen($this->_DB, 'ab');
        //Définit une variable pour savoir si l'écriture à fonctionner
        //Puis écrit la ligne dans le csv
        $ecris = fputcsv($acces, $user->getObjectToArray());
        //Fermer la lecture de la BDD
        fclose($acces);
        // Recupère la variable d'écriture:
        return $ecris;
    }

    //Récupérer tous les utilisateurs sous un tableau:
    public function getAllUtilisateurs() {
        //lire la BDD:
        $acces = fopen($this->_DB, 'r');
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

    //Trouver un utilisateur par son mail:
    public function getUtilisateurByMail($mail) {
        //lire la BDD:
        $acces = fopen($this->_DB, 'r');
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

    //Trouver un utilisateur par son id:
    public function getUtilisateurById($id) {
        //lire la BDD:
        $acces = fopen($this->_DB, 'r');
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

}