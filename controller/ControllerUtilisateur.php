<?php

define('VIEW_PATH', ROOT . DS . 'view' . DS);

// On va chercher le modele dans "./model/ModelUtilisateur.php"
require_once MODEL_PATH . 'Model' . ucfirst($controller) . '.php';
require_once MODEL_PATH . 'ModelJeux.php';
require_once MODEL_PATH . 'ModelReservation.php';

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

        $data = array(
            "username" => myGet("username"),
        );

        $tab_u = ModelUtilisateur::selectwhere($data);
        $mdpCrypte = hash('sha256', myGet('password'));
        $userFound = NULL;

        //Recherche de l'utilisateur parmi ses homonymes
        foreach ($tab_u as $user)
          if($user->password == $mdpCrypte)
            $userFound = $user;

        if(is_null($userFound))
        {
            $view = "error";
            $message = "Nom de compte ou mot de passe incorrect";
            $pagetitle = "Erreur";
            break;
        }

        //Si l'utilisateur est banni on lui affiche
        if($userFound->banUser == 1)
        {
            $view = "error";
            $message = "Vous avez été banni !";
            $pagetitle = "Erreur";
            break;
        }


        //Initialisation des infos de la session
        $_SESSION['login'] = $userFound->username;
        $_SESSION['id']=$userFound->userId;
        $_SESSION['admin'] = $userFound->admin;;

        //Si le mot de passe est prénom.nom il faut le faire changer
        $name=$userFound->nameUser;
        $nickname=$userFound->nicknameUser;

        if(myGet('password') == $nickname.'.'.$name)
        {
            //Chargement de la vue pour lui faire canger de mot de passe
            $pagetitle='Changer mot de passe';
            $view='ChangeMdpUtilisateur';
            break;
        }

        else
        {
            $pagetitle='Accueil';
            $view='AccueilUtilisateur';
        }

        break;

    case "disconnect":
        session_unset();
        session_destroy();
        $view="LoginUtilisateur";
        $pagetitle = 'Ludothèque';
        break;

    case "error":
        $view = "error";
        $message = "La page demandée est inaccesible";
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
        if(Session::is_admin())
        {
            $view = "listUtilisateur";
            $pagetitle = "Liste des utilisateurs";
            $tab_user = ModelUtilisateur::selectAll();
        }
        else
        {
            $view="Error";
            $message="Seul l'administrateur peut voir le contenu de cette page";
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
        if( Session::is_admin())
        {
          $data=array(
              "username" => myGet('user'),
          );
          $tab_u = ModelUtilisateur::selectWhere($data);
          $data = array(
              "userId" => $tab_u[0]->userId,
              "username" => myGet('user'),
              "banUser"  => 1
          );
          ModelUtilisateur::update($data);
          $pagetitle = "Liste des utilisateurs";
          $tab_user = ModelUtilisateur::selectAll();
          $view="ListUtilisateur";                      //Après avoir banni quelqu'un on remontre la liste des utilisateurs
        }
        else
        {
          $pagetitle="Erreur";
          $message="La modification n'a pas était pris en compte";
          $view="Error";
        }
        break;

    case "debanUser":
        if( Session::is_admin())
        {
            $data=array(
                "username" => myGet('user'),
            );
           $tab_u= ModelUtilisateur::selectWhere($data);
           $data = array(
                "userId" => $tab_u[0]->userId,
                "username" => myGet('user'),
                "banUser"  => 0
            );
            ModelUtilisateur::update($data);
            $pagetitle = "Liste des utilisateurs";
            $tab_user = ModelUtilisateur::selectAll();
            $view="ListUtilisateur";//Après avoir banni quelqu'un on remontre la liste des utilisateurs
        }
        else
        {
          $pagetitle="Erreur";
          $message="La modification n'a pas était pris en compte";
          $view="Error";
        }
        break;

    case "changeMdp"://A utiliser aussi pour réinitialiser un mdp d'adhérent
        if(myGet("mdp") == myGet("confmdp"))
        {
              $data = array(
                    "userId" => $_SESSION['id'],
                    "password"  => hash('sha256', myGet('mdp'))
                    );

              ModelUtilisateur::update($data);
              $pagetitle='Accueil';
              $view='AccueilUtilisateur';
        }

        else
        {
            $pagetitle='Changer mot de passe';
            $view='ChangeMdpUtilisateur';
        }
        break;

    case "deleteUser":
        if( Session::is_admin())
        {
            $data = array(
                  "username" => myGet("user"),
                  );
            $tab_u=ModelUtilisateur::selectWhere($data);
            $data=array(
                "userId" => $tab_u[0]->userId,
            );
            ModelUtilisateur::delete($data);
            $tab_user = ModelUtilisateur::selectAll();
            $pagetitle = "Liste des utilisateurs";
            $view="ListUtilisateur";//Après avoir banni quelqu'un on remontre la liste des utilisateurs
        }

        else
        {
            $view="error";
            $message="La modification n'a pas était pris en compte";
            $pagetitle="Erreur";
        }
        break;

    case "updateUser":
        if (is_null(myGet('user')))
        {
            $view = "error";
            $message="La modification n'a pas était pris en compte";
            $pagetitle = "Erreur";
            break;
        }

        if(Session::is_admin() || Session::is_user(myGet('user')))
        {
            $admin = !is_null(myGet('admin'));

            $data = array(
                  "username" => myGet("user"),
                  );
            $tab_u=ModelUtilisateur::selectWhere($data);
            $data = array(
                  "userId" => $tab_u[0]->userId,
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
                  "dateNaissance" => myGet("dateNaissance")
                );
            ModelUtilisateur::update($data);
            $user=myGet("user");
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
            $message="Les modifications n'ont pas étaient pris en compte";
            $pagetitle="Erreur";
        }
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

    case "saveUser":
        $admin = !is_null(myGet('admin'));
        $firstName = myGet('nickname');
        $lastName = myGet('name');

        $username = strtolower($firstName . '.' . $lastName);
        $clearPassword = $username;
        $numberHomonym = ModelUtilisateur::getNumberHomonym($username) + 1;

        if($numberHomonym > 0)
          $clearPassword .= $numberHomonym;

        $cryptedPassword = hash('sha256', $clearPassword);

        $data = array(
            "username" => $username,
            "password" => $cryptedPassword,
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
            "dateInscription" => date('Y-m-d'),
            "dateNaissance" => myGet("dateNaissance")
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
        $tab_jeux= ModelJeux::selectWhere($data);
        $view = "InfoJeux";
        $pagetitle= myGet('jeux');
        break;

    case "deleteGame":/*Vérifier que le jeu n'est pas sous réservation à ce moment là*/
        if( Session::is_admin())
        {
            $data = array(
                "gameName" => myGet("jeu"),
            );
            $tab_jeux=ModelJeux::selectWhere($data);
            $data=array(
                    "idGame" => $tab_jeux[0]->idGame,
            );
            ModelJeux::delete($data);
            $tab_jeux = ModelJeux::selectAll(); //On met à jour le tableau
            $pagetitle = "Liste des jeux";
            $view="listJeux";
        }
        else{
            $view="error";
            $message="La modification n'a pas était pris en compte";
            $pagetitle="Erreur";
        }
        break;

    case "modifyGame":
        if(Session::is_admin())
        {
            $data=array(
                "gameName" => myGet('jeu'),
            );
            $tab_jeux= ModelJeux::selectWhere($data);
            $view = "modifyJeu";
            $pagetitle = "Modifier un jeu";
            break;
        }
        else{
            $view="error";
            $message="La modification n'a pas était pris en compte";
            $pagetitle="Erreur";
        }
        break;
    case "updateJeu":
        if(Session::is_admin())
        {
            $data = array(
                "gameName" => myGet("jeu"),
                );
            $tab_jeux=ModelJeux::selectWhere($data);
            $data = array(
                "idGame" => $tab_jeux[0]->idGame,
                "gameName" => myGet("name"),
                "editionYear" => myGet("annee"),
                "editor" => myGet("editor"),
                "age" => myGet("age"),
                "players" => myGet("nbJoueur"),
                "extension" => myGet("extension"),
            );
            ModelJeux::update($data);
            $pagetitle = "Liste des jeux";
            $tab_jeux = ModelJeux::selectAll();
            $view="ListJeux";
            break;
        }
        else{
            $view="error";
            $message="La modification n'a pas était pris en compte";
            $pagetitle="Erreur";
        }
    case "addJeu":
        $view = "addJeu";
        $pagetitle = "Ajouter un jeu";
        break;

    case "saveJeu":
        if(SESSION::is_admin()){
            $data = array(
                "gameName" => myGet("name"),
                "editionYear" => myGet("annee"),
                "editor" => myGet("editor"),
                "age" => myGet("age"),
                "players" => myGet("nbJoueur"),
                "extension" => myGet("extension"),
            );
            ModelJeux::insert($data);
            $view = "admin";
            $pagetitle = "Administration";
        }
        else{
            $view="error";
            $message="La modification n'a pas était pris en compte";
            $pagetitle="Erreur";
        }
        break;
    case "listResa":
        if( Session::is_admin())
        {
            $view = "listResa";
            $pagetitle = "Liste des réservations";
            $tab_resa = ModelReservation::selectAll();
        }
        else{
            $view="Error";
            $message="Seul l'administrateur peut voir le contenu de cette page";
            $pagetitle="Erreur";
        }
        break;
}
require VIEW_PATH . "view.php";
