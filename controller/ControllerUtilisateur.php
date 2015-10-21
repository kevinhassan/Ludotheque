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
    case "create":
        $pagetitle = "Création d'un utilisateur";
        $view = "create";
        break;
       
    case "save":
        if (is_null(myGet('username')) && is_null(myGet('password'))&& is_null(myGet('confpassword'))) {
            $view = "error";
            $pagetitle = "Erreur";
            break;
        }
        if (myGet('password')!= myGet('confpassword')){
            $view = "error";
            $pagetitle = "Erreur";
            break;
        }
        if(!is_null(myGet('admin'))){
            $admin=true;
        }else{
            $admin=false;
        }
        $mot_passe_en_clair = myGet('confpassword') . Conf::getSeed();
        $mot_passe_crypte = hash('sha256', $mot_passe_en_clair);
        $clef = md5(microtime(TRUE)*100000);
        
        $data = array(
            "username" => myGet("username"),
            "password" => $mot_passe_crypte,
            "admin" => $admin,
        );
        
        ModelUtilisateur::insert($data);        
        // Initialisation des variables pour la vue
        $login = myGet('password');
        // Chargement de la vue
        $view = "Login";
        $pagetitle = "Accueil";
        break;
    

        
}
require VIEW_PATH . "view.php";
