<?php
    namespace App\Controller;
    use App\model\Roles;
    use App\Utils\Fonctions;


    class RolesController extends Roles{

        public function insertRoles(){

            if (isset($_POST['submit']))
            {
                $nom_roles = Fonctions::cleanInput($_POST['nom_roles']);

                if(!empty($nom_roles))
                {
                    $this->setNomRoles($nom_roles);
                    var_dump($nom_roles);
                    $this->addRoles();

                }else{
                
                }
            }
            include './App/Vue/viewAddRoles.php';
        }
    }
?>