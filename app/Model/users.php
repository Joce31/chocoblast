<?php
    namespace App\model;
    use App\Utils\bddconnect;
    use App\model\roles;
    
    class users{
        /*--------
        attributs
        -----*/
        private $id_utilisateur;
        private $nom_utilisateur;
        private $prenom_utilisateur;
        private $mail_utilisateur;
        private $password_utilisateur;
        private $image_utilisateur;
        private $statut_utilisateur;
        private $roles;




                /*--------
        constructeur
        -----*/
            public function __construct()
            {
                $this->roles = new Roles('utilisateur');
            }




                /*--------
        getter and setter
        -----*/



        /*--------
            methodes
        -----*/
    }
?>