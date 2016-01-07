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
        $admin=$tab_u[0]->admin;
        if($tab_u[0]->password!=hash('sha256', myGet('password')))
            {
            $view = "error";
            $message = "Le mot de passe tapé n'est pas correct";
            $pagetitle = "Erreur";
            break;
        }
        if($tab_u[0]->banUser == 1){
            //Si l'utilisateur est banni on lui affiche 
            $view = "error";
            $message = "Vous avez était banni !";
            $pagetitle = "Erreur";
            break;
        }
        $_SESSION['login'] = myGet('username');
        $_SESSION['id']=$tab_u[0]->userId;
        $_SESSION['admin'] = $admin;
        $name=$tab_u[0]->nameUser;
        $nickname=$tab_u[0]->nicknameUser;
        if(strcmp(myGet('password'),$nickname.".".$name)==0){
            $_SESSION['login'] = myGet('username');
            $pagetitle='Changer mot de passe';
            $view='ChangeMdpUtilisateur';
            break;
        }
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
        if( Session::is_admin())
        {
            $view = "listUtilisateur";
            $pagetitle = "Liste des utilisateurs";
            $tab_user = ModelUtilisateur::selectAll();
        }
        else{
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
          $tab_u= ModelUtilisateur::selectWhere($data);
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
        else{
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
        else{
          $pagetitle="Erreur";
          $message="La modification n'a pas était pris en compte";
          $view="Error";
        }
        break;
    case "changeMdp":
        if(myGet("mdp")==myGet("confmdp")){
              $data = array(
              "userId" => $_SESSION['id'],
              "password"  => hash('sha256', myGet('mdp'))
          );
        ModelUtilisateur::update($data);
        $pagetitle='Accueil';
        $view='AccueilUtilisateur';
        }
        else{
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
        else{
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
        if( Session::is_admin() || Session::is_user(myGet('user')))
        {
            if(!is_null(myGet('admin'))){
                $admin=true;
            }else{
                $admin=false;
            }
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
        if(!is_null(myGet('admin')))
            $admin=true;
        else
            $admin=false;

        $mot_passe_en_clair = myGet("nickname").".".myGet("name");//mot de passe par default
        $mot_passe_crypte = hash('sha256', $mot_passe_en_clair);
        $username = myGet("nickname").".".myGet("name");          //L'utilisateur aura comme identifiant "prenom.nom"
        $tab_u=  ModelUtilisateur::selectAll();
        $j=0;
        for($i=0;$i<sizeof($tab_u);$i++){
            if(strcmp($username,$tab_u[$i]->username)==0){
                $j++;
            }
        }
        if($j==1){
            $username=$username.$j;
        }
        $data = array(
            "userid" => uniqid(rand(), true),
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
        $tab_j= ModelJeux::selectWhere($data);
        $view = "InfoJeux";
        $pagetitle= myGet('jeux');
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
