<?php
    namespace App\model;
    use App\Utils\BddConnect;
    use App\model\Users;
    use App\Model\Utilisateur;

    class Chocoblast extends BddConnect
    {
        /*--------
        attributs
        -----*/
        private ?int $id_chocoblast;
        private ?string $slogan_chocoblast; 
        private ?string $date_chocoblast;    
        private ?bool $statut_chocoblast;
        private ?utilisateur $cible_chocoblast;
        private ?utilisateur $auteur_chocoblast;

        /*--------
        constructeur
        -----*/
        public function __construct()
        {
            $this->cible_chocoblast = new Utilisateur();
            $this->auteur_chocoblast = new Utilisateur();
            $this->statut_chocoblast = true;        
        }

        
        /*--------
        getter and setter
        -----*/
        public function getIdChocoblast():?int{
            return $this->id_chocoblast;
        }
        public function getSloganChocoblast():?string{
            return $this->slogan_chocoblast;
        }
        public function getDateChocoblast():?string{
            return $this->date_chocoblast;
        }
        public function getStatutChocoblast():?bool{
            return $this->statut_chocoblast;
        }
        public function getCibleChocoblast():?Utilisateur{
            return $this->cible_chocoblast;
        }
        public function getAuteurChocoblast():?Utilisateur{
            return $this->auteur_chocoblast;
        }
        public function setIdChocoblast(?int $id):void{
            $this->id_chocoblast = $id;
        }
        public function setSloganChocoblast(?string $slogan):void{
            $this->slogan_chocoblast = $slogan;
        }
        public function setDateChocoblast(?string $date):void{
            $this->date_chocoblast = $date;
        }
        public function setStatutChocoblast(?bool $statut):void{
            $this->statut_chocoblast = $statut;
        }
        public function setCibleChocoblast(?utilisateur $user):void{
            $this->cible_chocoblast = $user;
        }
        public function setAuteurChocoblast(?utilisateur $user):void{
            $this->auteur_chocoblast = $user;
        }
    
    
        /*--------
            methodes
        -----*/

        //methodes pour ajouter un choco en Bdd
        public function addChocoblast():void
        {
            
            try {
                //récupérer les données

                $slogan = $this->getSloganChocoblast();
                $date = $this->getDateChocoblast();
                $statut = $this->getStatutChocoblast();

                //récupération du role

                $auteur = $this->auteur_chocoblast->getIdUtilisateur();
                $cible = $this->cible_chocoblast->getIdUtilisateur();

                //préparer la requête

                $req = $this->connexion()->prepare('INSERT INTO chocoblast (slogan_chocoblast, 
                date_chocoblast, statut_chocoblast, cible_chocoblast, auteur_chocoblast) VALUES(?,?,?,?,?)');

                //bind les paramètres

                $req->bindParam(1, $slogan, \PDO::PARAM_STR);
                $req->bindParam(2, $date, \PDO::PARAM_STR);
                $req->bindParam(3, $statut, \PDO::PARAM_BOOL);
                // //Bind du role
                $req->bindParam(4, $auteur, \PDO::PARAM_INT);
                $req->bindParam(5, $cible, \PDO::PARAM_INT);
                //Exécuter la requête
                $req->execute();
            } 
            catch (\Exception $e) {
                die('Erreur : '.$e->getMessage());
            }
    }
    // methode tostring
        public function __toString():string
        {
        return $this->slogan_chocoblast;
    }
    //
        public function getChocoblastAll():?array{
            try{
                //Récupération des valeurs de l'objet
                $cible=$this->cible_chocoblast;
                $auteur=$this->auteur_chocoblast;
                $statut=$this->statut_chocoblast;
                //Préparation de la requête
                $req = $this->connexion()->prepare('SELECT id_chocoblast, slogan_chocoblast, date_chocoblast,  nom_auteur, 
                prenom_auteur, nom_cible, prenom_cible FROM chocoblast 
                INNER JOIN vwCible ON cible_chocoblast = vwcible.id_cible 
                INNER JOIN vwAuteur ON auteur_chocoblast = vwauteur.id_auteur; = (?,?,?,?,?,?,?)');
                $req->bindParam(1, $cible, \PDO::PARAM_STR);
                $req->bindParam(2, $auteur, \PDO::PARAM_STR);
                $req->bindParam(3, $statut, \PDO::PARAM_STR);
                $req->bindParam(4, $statut, \PDO::PARAM_STR);
                $req->bindParam(5, $statut, \PDO::PARAM_STR);
                $req->bindParam(6, $statut, \PDO::PARAM_STR);
                $req->bindParam(7, $statut, \PDO::PARAM_STR);
                //Exécution de la requête
                $req->execute();
                //Récupération du résultat dans un tableau d'objet
                $data = $req->fetchAll(\PDO::FETCH_OBJ);
                //Retour d'un tableau d'objet ou null
                return $data;
            } 
            catch(\Exception $e){
                die('Erreur : '.$e->getMessage());
            }
        }
        //Méthode qui retourne un chocoblast par ces informations
        public function getChocoblastByInfo():?array{
            //Récupération des valeurs de l'objet
            $slogan = $this->getSloganChocoblast();
            $date = $this->getDateChocoblast();
            $cible = $this->getCibleChocoblast()->getIdUtilisateur();
            $auteur = $this->getAuteurChocoblast()->getIdUtilisateur();
            //Préparer la requête
            $req = $this->connexion()->prepare('SELECT id_chocoblast, slogan_chocoblast 
            FROM chocoblast WHERE slogan_chocoblast = ? AND date_chocoblast = ?
            AND cible_chocoblast = ? AND auteur_chocoblast = ?');
            //Bind des paramètres
            $req->bindParam(1, $slogan, \PDO::PARAM_STR);
            $req->bindParam(2, $date, \PDO::PARAM_STR);
            $req->bindParam(3, $cible, \PDO::PARAM_INT);
            $req->bindParam(4, $auteur, \PDO::PARAM_INT);
            //Exécution de la requête
            $req->execute();
            //Récupérer le chocoblast
            $data = $req->fetchAll(\PDO::FETCH_OBJ);
            //Retourner le tableau
            return $data;
        }
    
    }






?>
