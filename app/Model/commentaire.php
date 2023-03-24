<?php
    namespace App\model;
    use App\Utils\BddConnect;
    use App\model\chocoblast;
    use App\model\users;

    class Commentaire extends BddConnect
    {
        /*-------------
            attributs
        -------------*/
        private $id_commentaire;
        private $note_commentaire;
        private $text_commentaire;
        private $date_commentaire;
        private $statut_commentaire;
        private ?utilisateur $auteur_chocoblast;
        private ?chocoblast $chocoblast_commentaire;

        public function __construct()
        {
        $this->auteur_chocoblast = new chocoblast();
        $this->chocoblast_commentaire =  new chocoblast();
        }

        /*--------------------
        getter and setter 
        --------------*/

        public function getId_commentaire():?int
        {
            return $this->id_commentaire;
        }
        public function getNoteCommentaire():?int
        {
            return $this->note_commentaire;
        }
        public function getTextCommentaire():?string
        {
            return $this->text_commentaire;
        }
        public function getDateCommentaire():?string
        {
            return $this->date_commentaire;
        }
        public function getStatutCommentaire():?bool
        {
            return $this->statut_commentaire;
        }
        public function getAuteurChocoblast():?string
        {
            return $this->auteur_chocoblast;
        }
        public function getChocoblastCommentaire():?string
        {
            return $this->chocoblast_commentaire;
        }
        public function setIdCommentaire(?int $id):void{
            $this->id_commentaire = $id;
        }
        public function setNoteCommentaire(?string $note):void{
            $this->note_commentaire = $note;
        }
        public function setTextCommentaire(?string $text):void{
            $this->text_commentaire = $text;
        }
        public function setDateCommentaire(?string $date):void{
            $this->date_commentaire = $date;
        }
        public function setStatutCommentaire(?string $statut):void{
            $this->statut_commentaire = $statut;
        }
        public function setAuteurChocoblast(?string $auteur):void{
            $this->auteur_chocoblast = $auteur;
        }
        public function setChocoblastCommentaire(?string $commentaire):void{
            $this->note_commentaire = $commentaire;
        }

        /*--------------------------------
            methaodes
        ---------------------------------*/

        public function addCom():void{
            try {
                //récupérer les données
                $note = $this->note_commentaire;
                $text = $this->text_commentaire;
                $statut = $this->statut_commentaire;
                //récupération du role
                $auteur = $this->auteur_chocoblast->getIdUtilisateur();
                $commentaire = $this->chocoblast_commentaire->getIdChocoblast();

                //préparer la requête
                $req = $this->connexion()->prepare('INSERT INTO commentaire(note, 
                prenom_utilisateur, mail_utilisateur, 
                password_utilisateur, id_roles) VALUES(?,?,?,?,?)');
                //bind les paramètres
                $req->bindParam(1, $nom, \PDO::PARAM_STR);
                $req->bindParam(2, $prenom, \PDO::PARAM_STR);
                $req->bindParam(3, $mail, \PDO::PARAM_STR);
                $req->bindParam(4, $password, \PDO::PARAM_STR);
                //Bind du role
                $req->bindParam(5, $id, \PDO::PARAM_INT);
                //Exécuter la requête
                $req->execute();
            } 
            catch (\Exception $e) {
                die('Erreur : '.$e->getMessage());
            }
            
        }
        public function __toString():string
        {
            return $this->note_commentaire;
        }
    }

?>