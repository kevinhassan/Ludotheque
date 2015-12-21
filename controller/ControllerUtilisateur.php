<?php

define('VIEW_PATH', ROOT . DS . 'view' . DS);

// On va chercher le modele dans "./model/ModelUtilisateur.php"
require_once MODEL_PATH . 'Model' . ucfirst($controller) . '.php';
require_once MODEL_PATH . 'ModelJeux.php';

switch ($action) {
    default:
        $view='AccueilUtilisateur';
        $pagetitle='Accueil';
        break;
    
    case "accueil":
        $view='AccueilUtilisateur';
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
        $view='AccueilUtilisateur';
        break;
    case "disconnect":
        session_unset();
        session_destroy();
        $view="LoginUtilisateur";
        $pagetitle = 'Accueil';
        break;   
    case "error":
        $view = "error";
        $pagetitle = "Erreur";
        break;
    case "administration":
        $view = "Admin";
        $pagetitle = "Administration";
        break;
    case "createUser":
        $view = "createUtilisateur";
        $pagetitle = "Création d'un utilisateur";
        break;
    case "modifyUser":
        $view = "modifyUtilisateur";
        $pagetitle = "Modifier un utilisateur";
        break;
    case "addGame":
        $view = "addGame";
        $pagetitle = "Ajouter un jeux";
        break;
    case "informations":
        $view = "informations";
        $pagetitle = "A Propos";
        break;      
    case "liste":
       $pagetitle='Accueil';
       $tab_jeux = ModelJeux::selectAll();
       $view='ListJeux';
       break;
    case "search":
        $data = array(
            "field" => myGet("field"),
            "word" => myGet("word"),
        );
        $tab_jeux = ModelJeux::search($data);
        $view = 'ListJeux';
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
        $username = myGet("nickname").".".myGet("name");    //L'utilisateur aura comme identifiant "prenom.nom"
        $data = array(
            "username" => $username,
            "password" => $mot_passe_crypte,
            "admin" => $admin,
            "sexUser" => myGet("sex"),
            "nameUser" => myGet("name"),
            "nicknameUser" => myGet("nickname"),   
            "emailUser" => myGet("email"),
            "telUser" => myGet("tel"), 
            "mobileUser" => myGet("mobile"),
            "addressUser" => myGet("address"),  
            "cpUser" => myGet("cp"),
            "cityUser" => myGet("city"),  
        );
        
        ModelUtilisateur::insert($data);        
        // Chargement de la vue
        $view = "AccueilUtilisateur";
        $pagetitle = "Accueil";
        break;   
    case "myProfile":
        $data = array(
            "username" => $_SESSION['login'],
        );
        $tab_u=  ModelUtilisateur::selectWhere($data);
        $view = "MyProfile";
        $pagetitle = "Mon profil";
        break;
    case "infoJeux":
        $data=array(
            "gameName" => myGet('jeux'),
        );
        $tab_j= ModelJeux::selectWhere($data);
        $view = "InfoJeux";
        $pagetitle= myGet('jeux');
        break;
}
require VIEW_PATH . "view.php";
