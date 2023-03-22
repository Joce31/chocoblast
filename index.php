<?php
    //chemin vers l'ajout de utilisateur
    use App\Controller\UserController;
    use App\controller\RolesController;
    include'./App/Utils/Bddconnect.php';
    include'./App/Utils/Fonctions.php';
    include'./App/Model/Roles.php';
    include './App/controller/RolesController.php';
    include'./App/Model/Users.php';
    include'./App/Controller/UserController.php';

    //Analyse de l'URL avec parse_url() et retourne ses composants
    $url = parse_url($_SERVER['REQUEST_URI']);
    //test soit l'url a une route sinon on renvoi à la racine
    $path = isset($url['path']) ? $url['path'] : '/';
    //instance des controllers
    $userController = new UserController();
    $rolesController = new RolesController();
    
    // fonction qui ajoute un utilisateur qui se trouve dans userController
    //routeur
    switch ($path) {
        case '/chocoblast/':
            include './App/Vue/home.php';  // nous renvoie vers la page acceuil 
            break;
        case '/chocoblast/userAdd':
            $userController->insertUser(); // nous envoi vers la page demandé si elle existe
            break;
        case '/chocoblast/rolesAdd':
            $rolesController->insertRoles();
            break;
        default:
            include './App/Vue/error.php'; // nous envoi sur une page d'erreur si la page n'existe pas
            break;
    }
?>