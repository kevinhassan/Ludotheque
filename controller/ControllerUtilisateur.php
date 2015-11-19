<?php

define('VIEW_PATH', ROOT . DS . 'view' . DS);

// On va chercher le modele dans "./model/ModelUtilisateur.php"
require_once MODEL_PATH . 'Model' . ucfirst($controller) . '.php';
require_once MODEL_PATH . 'ModelJeux.php';

switch ($action) {
     default:

    case "accueil":
        $view='LoginUtilisateur';
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
            // Chargement de la vue
        $pagetitle='Accueil';
        $tab_jeux = ModelJeux::selectAll();
        $view='ListJeux';
        break;
        
        case "disconnect":
        session_unset();
        session_destroy();
        $view="LoginUtilisateur";
        $pagetitle = 'Accueil';
        break;
    case "create":
        $pagetitle = "Création d'un utilisateur";
        $view = "createUtilisateur";
        break;
    case "liste":
        if(is_null(myGet('page'))){
            $page=1;
        }else{
            $page=myGet('page');
        }
       $pagetitle='Accueil';
       $tab_jeux = ModelJeux::selectAll();
       $view='ListJeux';
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
        
        $data = array(
            "username" => myGet("username"),
            "password" => $mot_passe_crypte,
            "admin" => $admin,
        );
        
        ModelUtilisateur::insert($data);        
        // Chargement de la vue
        $view = "LoginUtilisateur";
        $pagetitle = "Accueil";
        break;
    

        
}
require VIEW_PATH . "view.php";
