<?php

define('VIEW_PATH', ROOT . DS . 'view' . DS);

// On va chercher le modele dans "./model/ModelUtilisateur.php"
require_once MODEL_PATH . 'Model' . ucfirst($controller) . '.php';
require_once MODEL_PATH . 'ModelJeux.php';
require_once MODEL_PATH . 'ModelEmprunt.php';

switch ($action) {
    default:
        $view='AccueilUtilisateur';
        $pagetitle='Ludothèque';
        break;

    case "accueil":
        $view='AccueilUtilisateur';
        $pagetitle='Ludothèque';
        break;

    case "connected":
        /*if (is_null(myGet('username')) || is_null(myGet('password')))
        {
            $view = "error";
            $pagetitle = "Erreur";
            break;
        }*/        
        //Impossible car le script prévient ce risque

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
        $pagetitle = 'Ludothèque';
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
        $pagetitle = "Ajouter un utilisateur";
        break;

    case "listUser":
        if( Session::is_admin())
        {
            $view = "listUtilisateur";
            $pagetitle = "Liste des utilisateurs";
            $tab_user = ModelUtilisateur::selectAll();
        }
        else{
            $view="Error";
            $pagetitle="Erreur";
        }
        break;

    case "modifyUser":
        $data=array(
            "username" => myGet('user'),
        );
        $tab_u= ModelUtilisateur::selectWhere($data);
        $view = "ModifyUser";
        $pagetitle = "Modifier un utilisateur";
        break;

    case "banUser":
        if(Session::is_admin())
        {
          $data = array(
              "username" => myGet('user'),
              "banUser"  => 1
          );
          $tab_user = changeBanUser($data);
          $pagetitle = "Liste des utilisateurs";
          $view="ListUtilisateur";                      //Après avoir banni quelqu'un on remontre la liste des utilisateurs
        }
        else{
            $view="Error";
            $pagetitle="Erreur";
        }
        break;

    case "debanUser":
        if(Session::is_admin())
        {
           $data = array(
                "username" => myGet('user'),
                "banUser"  => 0
            );
           $tab_user = changeBanUser($data);
           $pagetitle = "Liste des utilisateurs";
           $view="ListUtilisateur";
        }
        else{
            $view="Error";
            $pagetitle="Erreur";
        }
        break;
    case "deleteUser":
        if(Session::is_admin())
        {
            $data=array(
                "username" => myGet('user'),
            );
            ModelUtilisateur::delete($data);
            $tab_user = ModelUtilisateur::selectAll();
            $pagetitle = "Liste des utilisateurs";
            $view="ListUtilisateur";//Après avoir banni quelqu'un on remontre la liste des utilisateurs
        }

        else{
            $view="error";
            $pagetitle="Erreur";
        }
        break;

    case "updateUser":
        if (is_null(myGet('user')))
        {
            $view = "error";
            $pagetitle = "Erreur";
            break;
        }
        if(Session::is_admin() ||  Session::is_user(myGet('user')))
        {
            updateUser();
            if(!is_null(myGet("profile"))){//Si on a éditer à partir de notre fiche on retourne à notre fiche
                $data = array(
                    "username" => $_SESSION['login'],
                );
                $tab_u=  ModelUtilisateur::selectWhere($data);
                $view = "MyProfile";
                $pagetitle = "Mon profil";
            }

            else{                         //Sinon on affiche la nouvelle liste des utilisateurs
                $pagetitle = "Liste des utilisateurs";
                $tab_user = ModelUtilisateur::selectAll();
                $view="ListUtilisateur";
            }
        }
        else{
            $view="Error";
            $pagetitle="Erreur";
        }
        break;

    case "addGame":
        $view = "addGame";
        $pagetitle = "Ajouter un jeu";
        break;

    case "informations":
        $view = "informations";
        $pagetitle = "A Propos";
        break;

    case "listJeux":
       $tab_jeux = ModelJeux::selectAll();
       $view='ListJeux';
       $pagetitle='Liste des jeux';
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
        saveUser();
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
    case "listEmprunt":
        if( Session::is_admin())
        {
            $view = "listEmprunt";
            $pagetitle = "Liste des emprunts";
            $tab_emp = ModelEmprunt::selectAll();
        }
        else{
            $view="Error";
            $pagetitle="Erreur";
        }    
        break;
}

function saveUser(){
        if(!is_null(myGet('admin')))
            $admin=true;
        else
            $admin=false;
        //$mot_passe_en_clair = myGet('confpassword') . Conf::getSeed();
        $mot_passe_en_clair = myGet("nickname").".".myGet("name");//mot de passe par default
        $mot_passe_crypte = hash('sha256', $mot_passe_en_clair);
        $username = myGet("nickname").".".myGet("name");          //L'utilisateur aura comme identifiant "prenom.nom"
        $data = array(
            "username" => $username,
            "password" => $mot_passe_crypte,
            //"password" => $mot_passe_en_clair,
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
}

function updateUser(){
    if(!is_null(myGet('admin'))){
        $admin=true;
    }
    else{
        $admin=false;
    }
    $data = array(
        "username" => myGet("user"),
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
    ModelUtilisateur::update($data);
}

function changeBanUser($data){
    ModelUtilisateur::update($data);
    $tab_user = ModelUtilisateur::selectAll();
    return $tab_user;
}
require VIEW_PATH . "view.php";
