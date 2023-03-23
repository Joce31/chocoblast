<?php
    namespace App\Utils;
    class BddConnect{
        //fonction connexion BDD
        public function connexion(){
            //importe du fichier de configuration
            include './env.php';
            //retour de l'objet PDO
            return new \PDO("mysql:host=$host;dbname=$database", $login, $password, // on a remplacer les valeurs par des variables pour plus de securité (il se trouve dans le env.php)
            array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION));
        }
    }
?>