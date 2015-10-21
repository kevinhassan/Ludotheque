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
        $admin=$tab_u[0]->admin;
        $data = array(
            "username" => myGet("username"),
            "password" => hash('sha256', myGet('password') . Conf::getSeed())
        );
        $_SESSION['login'] = myGet('username');
        $_SESSION['admin'] = $admin;
        $view = 'Login';
        $pagetitle = 'Profil';
        break;
        
        case "disconnect":
        session_unset();
        session_destroy();
        $view = 'Login';
        $pagetitle = 'Accueil';
        break;

        
}
require VIEW_PATH . "view.php";
