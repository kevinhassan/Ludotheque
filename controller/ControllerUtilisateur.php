<?php

define('VIEW_PATH', ROOT . DS . 'view' . DS);

// On va chercher le modele dans "./model/ModelUtilisateur.php"
require_once MODEL_PATH . 'Model' . ucfirst($controller) . '.php';

switch ($action) {
     default:

    case "accueil":
        $view='Login';
        $pagetitle='Accueil';
        break;
    
    case "connected":
        if (is_null(myGet('username')) || is_null(myGet('password'))) {
            $view = "error";
            $pagetitle = "Erreur";
            break;
        }
        $data = array(
            "username" => myGet("username"),
        );
        $tab_u = ModelUtilisateur::selectwhere($data);
        $data = array(
            "username" => myGet("username"),
            "password" => hash('sha256', myGet('password') . Conf::getSeed())
        );
        $_SESSION['login'] = myGet('username');
        $view = 'Login';
        $pagetitle = 'Profil';
        break;
        
}
require VIEW_PATH . "view.php";
