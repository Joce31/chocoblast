<?php
    namespace App\Controller;
    use App\model\Roles;
    use App\Utils\Fonctions;


    class RolesController extends Roles{

        //fonctions qui ajoute un role en BDD

        public function insertRoles():void{

            //variable pour stocker les messages d'erreur

            $msg = "";

            // tester si formulaire submit

            if (isset($_POST['submit']))

            {
                //nettoyer les imputs

                $nom = Fonctions::cleanInput($_POST['nom_roles']);

                //tester si les champs sont remplis

                if(!empty($nom))
                {
                    //setter les valeurs a l'objet

                    $this->setNomRoles($nom);
                    var_dump($nom);
                    if($this->getRolesByName()){
                        $msg="le role existe deja";
                    }else{
                        $this->addRoles();

                        //afficher la confirmation
    
                        $msg = " le role : ".$nom." a bien été ajouter en BDD ";
    
                    }

                    // ajouter le nouveau role

                
                }else{
                    $msg = ' Veuillez remplir tout les champs';
                }
            }

            //importer la vue

            include './App/Vue/viewAddRoles.php';
        }
    }
?>