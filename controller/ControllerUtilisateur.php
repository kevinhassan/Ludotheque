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

    case "connecte":

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
            $view='changeMdpUtilisateur';
            break;
        }

        else
        {
            $pagetitle='Accueil';
            $view='AccueilUtilisateur';
        }

        break;

    case "deconnecte":
        session_unset();
        session_destroy();
        $view="LoginUtilisateur";
        $pagetitle = 'Ludothèque';
        break;

    case "erreur":
        $view = "error";
        $message = "La page demandée est inaccesible";
        $pagetitle = "Erreur";
        break;

    case "administration":
        $view = "Admin";
        $pagetitle = "Administration";
        break;

    case "creerUtilisateur":
        $view = "createUtilisateur";
        $pagetitle = "Ajouter un utilisateur";
        break;

    case "listerUtilisateurs":
        if( Session::is_admin())
        {
            $view = "listUtilisateur";
            $pagetitle = "Liste des utilisateurs";
            $tab_u = ModelUtilisateur::selectAll();
        }

        else
        {
            $view="error";
            $message="Seul l'administrateur peut voir le contenu de cette page";
            $pagetitle="Erreur";
        }
        break;

    case "modifierUtilisateur":
        $data=array(
            "username" => myGet('user'),
        );
        $tab_u= ModelUtilisateur::selectWhere($data);
        $view = "modifyUser";
        $pagetitle = "Modifier un utilisateur";
        break;

    case "bannirUtilisateur":
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
          $tab_u = ModelUtilisateur::selectAll();
          $view="listUtilisateur";                      //Après avoir banni quelqu'un on remontre la liste des utilisateurs
        }
        else
        {
          $pagetitle="Erreur";
          $message="La modification n'a pas était prise en compte";
          $view="Error";
          $message="La modification n'a pas était pris en compte";
          $view="error";
        }
        break;

    case "debannirUtilisateur":
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
            $tab_u = ModelUtilisateur::selectAll();
            $view="listUtilisateur";//Après avoir banni quelqu'un on remontre la liste des utilisateurs
        }
        else
        {
          $pagetitle="Erreur";
          $message="La modification n'a pas était pris en compte";
          $view="error";
        }
        break;

    case "changerMdp"://A utiliser aussi pour réinitialiser un mdp d'adhérent
        if(myGet("mdp")==myGet("confmdp"))
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
            $view='changeMdpUtilisateur';
        }
        break;

    case "supprimerUtilisateur":
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
            $tab_u = ModelUtilisateur::selectAll();
            $pagetitle = "Liste des utilisateurs";
            $view="listUtilisateur";//Après avoir banni quelqu'un on remontre la liste des utilisateurs
        }

        else
        {
            $view="error";
            $message="La modification n'a pas était pris en compte";
            $pagetitle="Erreur";
        }
        break;

    case "mettreAjourUtilisateur":
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
                $view = "monProfil";
                $pagetitle = "Mon profil";
            }

            else{                         //Sinon on affiche la nouvelle liste des utilisateurs
                $pagetitle = "Liste des utilisateurs";
                $tab_u = ModelUtilisateur::selectAll();
                $view="listUtilisateur";
            }
        }
        else{
            $view="error";
            $message="Les modifications n'ont pas étaient pris en compte";
            $pagetitle="Erreur";
        }
        break;
    case "reinitialiserMdp":
        if( Session::is_admin())
        {
            $data = array("username" => myGet("user"));
            $tab_u=  ModelUtilisateur::selectWhere($data);
            $newMdp = hash('sha256', $tab_u[0]->username);
            $data = array(
                "userId" => $tab_u[0]->userId,
                "password"=>$newMdp
                );
            ModelUtilisateur::update($data);
            $pagetitle = "Liste des utilisateurs";
            $tab_u = ModelUtilisateur::selectAll();
            $view="listUtilisateur";
        }
        else{
            $view="error";
            $message="Les modifications n'ont pas étaient pris en compte";
            $pagetitle="Erreur";
        }
        break;
    case "informations":
        $view = "informations";
        $pagetitle = "A Propos";
        break;

    case "listerJeux":
       $tab_jeux = ModelJeux::selectAll();
       $view='listJeux';
       $pagetitle='Liste des jeux';
       break;

    case "search":
        $data = array(
            "field" => myGet("field"),
            "word" => myGet("word"),
        );
        $tab_jeux = ModelJeux::search($data);
        $view = 'listJeux';
        break;

    case "enregistrerUtilisateur":
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

        $view = "AccueilUtilisateur";
        $pagetitle = "Accueil";
        break;

    case "monProfil":
        $data = array(
            "username" => $_SESSION['login'],
        );
        $tab_u=  ModelUtilisateur::selectWhere($data);
        $view = "myProfile";
        $pagetitle = "Mon profil";
        break;

    case "infoJeu":
        $data=array(
            "nomJeu" => myGet('jeux'),
        );
        $tab_jeux= ModelJeux::selectWhere($data);
        $view = "infoJeux";
        $pagetitle= myGet('jeux');
        break;

    case "supprimerJeu":                      /*Vérifier que le jeu n'est pas sous réservation à ce moment là*/
        if( Session::is_admin())
        {
            $data = array(
                "nomJeu" => myGet("jeu"),
            );
            $tab_jeux=ModelJeux::selectWhere($data);
            $data=array(
                    "idJeu" => $tab_jeux[0]->idJeu,
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

    case "modifierJeu":
        if(Session::is_admin())
        {
            $data=array(
                "nomJeu" => myGet('jeu'),
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
    case "mettreAjourJeu":
        if(Session::is_admin())
        {
            $data = array(
                "nomJeu" => myGet("jeu"),
                );
            $tab_jeux=ModelJeux::selectWhere($data);
            $data = array(
                    "idJeu" => $tab_jeux[0]->idJeu,
                    "nomJeu" => myGet("name"),
                    "anneeEdition" => myGet("annee"),
                    "editeur" => myGet("editeur"),
                    "age" => myGet("age"),
                    "nbJoueur" => myGet("nbJoueur"),
                    "extension" => myGet("extension"),
                    );
            ModelJeux::update($data);
            $pagetitle = "Liste des jeux";
            $tab_jeux = ModelJeux::selectAll();
            $view="listJeux";
            break;
        }
        else{
            $view="error";
            $message="La modification n'a pas était pris en compte";
            $pagetitle="Erreur";
        }
    case "ajouterJeu":
        $view = "ajouterJeu";
        $pagetitle = "Ajouter un jeu";
        break;

    case "sauvegarderJeu":
        if(SESSION::is_admin()){
            $data = array(
                "nomJeu" => myGet("name"),
                "anneeEdition" => myGet("annee"),
                "editeur" => myGet("editeur"),
                "age" => myGet("age"),
                "nbJoueur" => myGet("nbJoueur"),
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
    /*case "listerReservation":
        if( Session::is_admin())
        {
            $view = "listResa";
            $pagetitle = "Liste des réservations";
            $tab_resa = ModelReservation::selectAll();
        }
        else{
            $view="error";
            $message="Seul l'administrateur peut voir le contenu de cette page";
            $pagetitle="Erreur";
        }
        break;*/
}
require VIEW_PATH . "view.php";
