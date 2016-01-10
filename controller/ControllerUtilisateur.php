<?php

define('VIEW_PATH', ROOT . DS . 'view' . DS);

// On va chercher le modele dans "./model/ModelUtilisateur.php"
require_once MODEL_PATH . 'Model' . ucfirst($controller) . '.php';

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
            $view = "erreur";
            $message = "Nom de compte ou mot de passe incorrect";   
            $pagetitle = "Erreur";                
            break;
        }
        //Si l'utilisateur est banni on lui affiche
        if($userFound->banUser == 1)
        {
            $view = "erreur";
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
        $mdp = myGet('password');
        if($mdp == $nickname.'.'.$name)
        {
            //Chargement de la vue pour lui faire changer de mot de passe
            $_SESSION['login'] = myGet('username');
            $pagetitle='Changer mot de passe';
            $view='changerMdpUtilisateur';
            break;
        }
            // Chargement de la vue
        $pagetitle='Accueil';
        $view='AccueilUtilisateur';
        break;        

    case "deconnecte":
        session_unset();
        session_destroy();
        $view ="LoginUtilisateur";
        $pagetitle = 'Ludothèque';
        break;

    case "erreur":
        $view = "erreur";
        $message = "La page demandée est inaccesible";
        $pagetitle = "Erreur";
        break;

    case "administration":
        $view = "Admin";
        $pagetitle = "Administration";
        break;

    case "creerUtilisateur":
        $view = "creerUtilisateur";
        $pagetitle = "Ajouter un utilisateur";
        break;

    case "listerUtilisateurs":
        if( Session::is_admin())
        {
            $view = "listerUtilisateur";
            $pagetitle = "Liste des utilisateurs";
            $tab_u = ModelUtilisateur::selectAll();
        }
        else{
            $view = "erreur";
            $message = "Seul l'administrateur peut voir le contenu de cette page";
            $pagetitle = "Erreur";
        }
        break;

    case "modifierUtilisateur":
        $data=array(
            "username" => myGet('user'),
        );
        $tab_u= ModelUtilisateur::selectWhere($data);
        $view = "modifierUtilisateur";
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
          $view ="listerUtilisateur";                      //Après avoir banni quelqu'un on remontre la liste des utilisateurs
        }
        else{
          $pagetitle = "Erreur";
          $message = "La modification n'a pas était prise en compte";
          $view = "erreur";
        }
        break;
    case "debannirUtilisateur":
        if( Session::is_admin())
        {
            $data = array(
                "username" => myGet('user'),
            );
           $tab_u = ModelUtilisateur::selectWhere($data);
           $data = array(
                "userId" => $tab_u[0]->userId,
                "username" => myGet('user'),
                "banUser"  => 0
            );
            ModelUtilisateur::update($data);
            $pagetitle = "Liste des utilisateurs";
            $tab_u = ModelUtilisateur::selectAll();
            $view="listerUtilisateur";//Après avoir banni quelqu'un on remontre la liste des utilisateurs
        }
        else{
          $pagetitle = "Erreur";
          $message = "La modification n'a pas était prise en compte";
          $view = "erreur";
        }
        break;
    case "changerMdp"://A utiliser aussi pour réinitialiser un mdp d'adhérent
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
            $pagetitle = 'Changer mot de passe';
            $view = 'changerMdpUtilisateur';
        }
        break;
    case "supprimerUtilisateur":
        if( Session::is_admin())
        {
            $data = array(
                  "username" => myGet("user"),
                  );
            $tab_u = ModelUtilisateur::selectWhere($data);
            $data = array(
                "userId" => $tab_u[0]->userId,
            );
            ModelUtilisateur::delete($data);
            $tab_u = ModelUtilisateur::selectAll();
            $pagetitle = "Liste des utilisateurs";
            $view = "listerUtilisateur";//Après avoir banni quelqu'un on remontre la liste des utilisateurs
        }
        else
        {
            $view = "erreur";          
            $message = "La modification n'a pas était prise en compte";
            $pagetitle = "Erreur";
        }
        break;

    case "mettreAjourUtilisateur":
        if (is_null(myGet('user')))
        {
            $view = "erreur";
            $message = "La modification n'a pas était prise en compte";
            $pagetitle = "Erreur";
            break;
        }
        if( Session::is_admin() || Session::is_user(myGet('user')))
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
                $view="listerUtilisateur";
            }
        }
        else{
            $view="erreur";
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
            $view="listerUtilisateur";
        }
        else{
            $view="erreur";
            $message="Les modifications n'ont pas étaient pris en compte";
            $pagetitle="Erreur";
         }
         break;
    case "informations":
        $view = "informations";
        $pagetitle = "A Propos";
        break;

    case "enregistrerUtilisateur":
        $admin = !is_null(myGet('admin'));
        $firstName = myGet('nickname');
        $lastName = myGet('name');

        $username = strtolower($firstName . '.' . $lastName);
        $clearPassword = $username;
        $numberHomonym = ModelUtilisateur::getNumberHomonym($username) + 1;

        if($numberHomonym > 1)
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
        $view = "resultat";
        $message = "L'utilisateur ".$username." a été créé avec succès, le mot de passe est : ".$clearPassword;
        $pagetitle = "Opération réussie !";
        break;

    case "monProfil":
        $data = array(
            "username" => $_SESSION['login'],
        );
        $tab_u=  ModelUtilisateur::selectWhere($data);
        $view = "monProfil";
        $pagetitle = "Mon profil";
        break;
}
require VIEW_PATH . "view.php";
