<?php
    namespace App\Controller;
    use App\model\users;
    use App\Utils\Fonctions;

    class UserController extends Users
    {
        //focntion qui va gerer l'ajout de l'utilisateur en BDD
        public function insertUser()
        {
            //variable pour stocker les messages d'erreur
            $msg = "";
            /*---------------
                logique 
            ----------------*/
            //test boutton
            if (isset($_POST['submit']))
            {
                $nom = Fonctions::cleanInput($_POST['nom_utilisateur']);
                $prenom = Fonctions::cleanInput($_POST['prenom_utilisateur']);
                $mail = Fonctions::cleanInput($_POST['mail_utilisateur']);
                $password = Fonctions::cleanInput($_POST['password_utilisateur']);
                //test si chmaps vide
                if(!empty($nom) and !empty($prenom) and !empty($mail) and !empty($password))
                {
                    $user = new users ();
                    $user->setMailUtilisateur($mail);

                    //si le compter existe deja
                    if($user->getUserByMail())
                    {
                        $msg = "les informations sont incorrectes ";
                    }else{                    //hash du mdp
                        $password = password_hash($password, PASSWORD_DEFAULT);
                        $user->setNomUtilisateur($nom);
                        $user->setPrenomUtilisateur($prenom);
                    
                        $user->setPasswordUtilisateur($password);
                        var_dump($user);
                        $user->addUser();
                        $msg = "le compte : ".$mail." a été ajouter en BDD";

                    }

                //version alternative avec $this
                    /* $this->setNomUtilisateur($nom);
                    $this->setPrenomUtilisateur($prenom);
                    $this->setMailUtilisateur($mail);
                    $this->setpasswordUtilisateur($password);
                    $this->addUser(); */
                }
                //si les champs ne sont pas remplis
                else
                {
                    $msg = "veuillez remplir tout les champs du formulaire";
                }
            
            }
            //importer la vue
            include'./App/Vue/viewAddUser.php';
        }
    }
?>