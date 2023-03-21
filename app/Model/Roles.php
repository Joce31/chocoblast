<?php

    namespace App\model;
    use App\utils\bddconnect;
    class roles extends bddconnect{
        /*--------
        attributs
        -----*/
        private $id_roles;
        private $nom_roles;
        /*--------
        constructeur
        -----*/
        public function __construct($name)
        {
            $this->id_roles = 1;
            $this->nom_roles = $name;
        }
        /*--------
        getter and setter
        -----*/
        public function getIdroles():?int
        {
            return $this->id_roles;
        }
        public function getNomRoles():?string
        {
            return $this->nom_roles;
        }
        public function setNomRoles($name):void
        {
            $this->nom_roles = $name;
        }

    }

?>
