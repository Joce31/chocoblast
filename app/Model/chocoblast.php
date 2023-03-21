<?php
    namespace App\model;
    use App\Utils\BddConnect;
    use App\model\users;

    class chocoblast
    {
        /*--------
        attributs
        -----*/
        private $id_chocoblast;
        private $slogan_chocoblast; 
        private $date_chocoblast;    
        private $statut_chocoblast;
        private $cible_chocoblast;
        private $utilisateur;

        /*--------
        constructeur
        -----*/
        public function __construct()
        {
            $this->utilisateur = new Users();
        }

        
                /*--------
        getter and setter
        -----*/



        /*--------
            methodes
        -----*/

    }






?>
