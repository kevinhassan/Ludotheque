<?php

define('VIEW_PATH', ROOT . DS . 'view' . DS);

// On va chercher le modele dans "./model/ModelUtilisateur.php"
require_once MODEL_PATH . 'Model' . ucfirst($controller) . '.php';
require_once MODEL_PATH . 'ModelPanier.php';

switch ($action) {
    default:

    case "accueil":
        $view='Accueil';
        $pagetitle='Accueil';
        break;
    
    case "connect":
        $erreur="";
        $view='connect';
        $pagetitle='identification';
        break;
    
    case "connected":
        if (is_null(myGet('login')) || is_null(myGet('mdp'))) {
            $view = "error";
            $pagetitle = "Erreur";
            break;
        }
        $data = array(
            "login" => myGet("login"),
        );
        $tab_u = ModelUtilisateur::selectwhere($data);
        $data = array(
            "login" => myGet("login"),
            "mdp" => hash('sha256', myGet('mdp') . Conf::getSeed())
        );
        $actif=$tab_u[0]->actif;
        if($actif==false){
            $erreur="Pensez à vérifier votre adresse e-mail, vous devez activer votre compte !";
            $view='connect';
            $pagetitle='identification';
            break;
        }
        if(count($tab_u) == 0){
            $view='connect';
            $pagetitle='identification';
            break;
        }
        $_SESSION['login'] = myGet('login');
        if($tab_u[0]->admin){
            $_SESSION['admin'] = "true";
        }
        $u = $tab_u[0];
        //var_dump($u);
        $prenom = $u->prenom;
        $nom = $u->nom;
        $email = $u->email;
        $naissance = $u->age;
        $com = $u->com;
        $sexe=$u->sexe;
        $prix=$u->prix;
        $loue=$u->loue;
        $admin=$u->admin;
        $login = myGet('login');
                $login2 = myGet('login');

        $view = 'profil';
        $pagetitle = 'Profil';
        break;
        
    case "disconnect":
        session_unset();
        session_destroy();
        $view = 'accueil';
        $pagetitle = 'Accueil';
        break;

    case "create":
        $l = "";
        $sexe = "";
        $n = "";
        $p = "";
        $e = "";
        $mdp="";
        $loueur="";
        $loue="";
        $com="";
        $check1="";
        $check2="";
        $naissance="";
        $erreur = "";
        $label = "Créer";
        $mdp_statut="required";
        $login_status = "required";
        $pagetitle = "Création d'un utilisateur";
        $submit = "Création";
        $act = "save";
        $view = "create";
        break;
    
    case "confirmation":
        $data = array(
            "login"=>  myGet("login"),
        );
        $cl=ModelUtilisateur::findClef($data);
        $clef=myGet("clef");
        if($cl[0]->clef==$clef){
            ModelUtilisateur::activer($data);
            $view='Activated';
            $pagetitle='Accueil';
        }else{
            $view = "error";
            $pagetitle = "Erreur";
            break;
        }
        break;

    case "save":
        if (!(!is_null(myGet('login')) && !is_null(myGet('nom')) && !is_null(myGet('prenom')) && !is_null(myGet('email')) && !is_null(myGet('mdp')) && !is_null(myGet('confmdp')))) {
            $view = "error";
            $pagetitle = "Erreur";
            break;
        }
        if(is_null(myGet('loueur')) && is_null(myGet('loue'))){
            $l = myGet("login");
            $sexe = myGet("sexe");
            $n = myGet("nom");
            $p = myGet("prenom");
            $e = myGet("email");
            $naissance= myGet("naissance");
            $com=myGet("com");
            $mdp="";
            $mdp_statut="";
            $view ="create";
            $login_status = "required";
            $label = "Créer";
            $submit = "Création";
            $act = "save";
            $pagetitle = "Création d'un utilisateur";
            $erreur = "Vous devez cocher une de ces cases";
            break;
        }
        if(!is_null(myGet('loueur'))){
            $loueur=true;
        }else{
            $loueur=false;
        }
        if(!is_null(myGet('loue'))){
            $loue=true;
        }else{
            $loue=false;
        }
        if(is_null(myGet('sexe'))){
            $l = myGet("login");
            $n = myGet("nom");
            $p = myGet("prenom");
            $e = myGet("email");
            $naissance= myGet("naissance");
            $com=myGet("com");
            $view ="create";
            $mdp="";
            $mdp_statut="";
            $check1="";
            $check2="";
            $login_status = "required";
            $label = "Créer";
            $submit = "Création";
            $act = "save";
            $pagetitle = "Création d'un utilisateur";
            $erreur = "Vous devez spécifier votre sexe";
            break;
        }
        $sexe=  myGet('sexe');
        if (myGet('mdp')!= myGet('confmdp')){
            $view = "error";
            $pagetitle = "Erreur";
            break;
        }
        
        $mot_passe_en_clair = myGet('mdp') . Conf::getSeed();
        $mot_passe_crypte = hash('sha256', $mot_passe_en_clair);
        $clef = md5(microtime(TRUE)*100000);
        
        $data = array(
            "login" => myGet("login"),
            "sexe" => $sexe,
            "nom" => myGet("nom"),
            "prenom" => myGet("prenom"),
            "email" => myGet("email"),
            "mdp" => $mot_passe_crypte,
            "loueur" => $loueur,
            "loue" => $loue,
            "clef"=> $clef,
            "com" => myGet("com"),
            "age" => myGet("naissance"),
            "disponible" => "1"
        );
        
        ModelUtilisateur::insert($data);
        $destinataire = myGet('email');
        $sujet = "Confirmation d'inscription";

        $message = "Login : ".myGet('login')."\r\n Nom : ".myGet('nom')."\r\n Prenom : ".myGet('prenom')."\r\n Adresse email : ".myGet('email')."\r\n Lien de confirmation : http://infolimon.iutmontp.univ-montp2.fr/~rivierea/Projetvente/?action=confirmation&controller=utilisateur&login=".myGet("login")."&clef=".$clef;

        $entete = 'From: lilian.riviere@hotmail.fr ; Reply-To: lilian.riviere@hotmail.fr ; X-Mailer: PHP/'.phpversion();
        if (mail($destinataire,$sujet,$message,$entete)){
	//Le mail a été expédié
	echo 'Message envoyé'; 
        } else {
	//Le mail n'a pas été expédié
 	echo "Une erreur est survenue lors de l'envoi du formulaire par email";
        }
        
        // Initialisation des variables pour la vue
        $login = myGet('login');
        // Chargement de la vue
        $view = "created";
        $pagetitle = "Accueil";
        break;
        
    case "profil":
        if(!session::is_connected()){
            $view = "error";
            $pagetitle = "Erreur";
            break;
        }
        $data= array(
            "login" => myGet("login")
        );
        $tab_u = ModelUtilisateur::selectwhere($data);
        $u = $tab_u[0];
        //var_dump($u);
        $login2= $u->login;
        $prenom = $u->prenom;
        $nom = $u->nom;
        $email = $u->email;
        $naissance =$u->age;
        $com = $u->com;
        $sexe=$u->sexe;
        $prix=$u->prix;
        $loue=$u->loue;
        $admin=$u->admin;
        $disponible=$u->disponible;
        $view = 'profil';
        $pagetitle = 'Profil';
        break;
    case "update":
        if ($_SESSION ['login'] != myGet('login') && !$_SESSION['admin']) {
            $view = "error";
            $pagetitle = "Erreur";
            break;
        }
        $data = array("login" => myGet('login'));
        $u = ModelUtilisateur::selectWhere($data);
        // Initialisation des variables pour la vue  
        $l = $u[0]->login;
        $n = $u[0]->nom;
        $p = $u[0]->prenom;
        $e = $u[0]->email;
        $com = $u[0]->com;
        $loueur= $u[0]->loueur;
        $loue=$u[0]->loue;
        $mdp=$u[0]->mdp;
        $naissance = $u[0] ->age;
        $prix=$u[0]->prix;
        $check1="";
        $check2="";
        $erreur="";
        $pagetitle = "Mise à jour d'un utilisateur";
        $label = "Modifier";
        $login_status = "readonly";
        $mdp_statut="";
        $submit = "Mise à jour";
        $act = "updated";
        $view = "create";
        break;
        
    case "updated":
        if (!(!is_null(myGet('login')) && !is_null(myGet('nom')) && !is_null(myGet('prenom')) && !is_null(myGet('email')) && !is_null(myGet('mdp')) && !is_null(myGet('confmdp'))) || ($_SESSION ['login'] != myGet('login') && !$_SESSION['admin'])) {
            $view = "error";
            $pagetitle = "Erreur";
            break;
        }
        
        if (myGet('mdp')!= myGet('confmdp')){
            $view = "error";
            $pagetitle = "Erreur";
            break;
        }
        
        $mot_passe_en_clair = myGet('mdp') . Conf::getSeed();
        $mot_passe_crypte = hash('sha256', $mot_passe_en_clair);
        if(!is_null(myGet('loueur'))){
            $loueur=true;
        }else{
            $loueur=false;
        }
        if(!is_null(myGet('loue'))){
            $loue=true;
        }else{
            $loue=false;
        }
        if(is_null(myGet('prix'))){
            $prix="";
        }else{
            $prix=myGet('prix');
        };
        $data = array(
            "login" => myGet("login"),
            "nom" => myGet("nom"),
            "prenom" => myGet("prenom"),
            "email" => myGet("email"),
            "mdp" => $mot_passe_crypte,
            "loueur" => $loueur,
            "loue"=> $loue,
            "age" => myGet("naissance"),
            "prix"=>$prix,
            "com"=>myGet("com")
        );
        ModelUtilisateur::update($data);
        // Initialisation des variables pour la vue
        $data= array(
            "login" => myGet("login")
        );
        $tab_u = ModelUtilisateur::selectwhere($data);
        $u = $tab_u[0];
        //var_dump($u);
        $prenom = $u->prenom;
        $nom = $u->nom;
        $email = $u->email;
        $naissance =$u->age;
        $com = $u->com;
        $sexe=$u->sexe;
        $login2=$u->login;
        $disponible=$u->disponible;
        $admin=$u->admin;
        $login = myGet('login');
        $view = "updated";
        $pagetitle = "Liste des utilisateurs";
        break;
        
    case "louer":
        $data = array("login" => myGet('login2'));
        $u = ModelUtilisateur::selectWhere($data);
        $l = $u[0]->login;
        $nom = $u[0]->nom;
        $prenom = $u[0]->prenom;
        $prix=$u[0]->prix;
        $jours=myGet("jour");
        $ptotal=$jours*$prix;
        $panier=array("login_loueur"=>$_SESSION['login'],
            "login_loue"=>myGet('login2'),
            "jour"=>$jours,
            "prix"=>$ptotal);
        ModelPanier::insert($panier);
        $l=array("login"=>myGet('login2'));
        $tab_u=ModelUtilisateur::selectwhere($l);
        $u=$tab_u[0];
        $update=array("login"=>$u->login,
            "prenom"=>$u->prenom,
            "nom"=>$u->nom,
            "email"=>$u->email,
            "age"=> $u->age,
            "sexe"=>$u->sexe,
            "disponible"=>"0",
            "mdp"=>$u->mdp,
            "loueur" => $u->loueur,
            "loue"=> $u->loue,
            "com"=> $u->com);
            
            
        ModelUtilisateur::update($update);
        $pagetitle = "Location d'un utilisateur";
        $view = "Detailcommande";
        break;
    
    case "panier":
        $data = array("login_loueur" => $_SESSION['login']);
        $u=  ModelPanier::selectWhere($data);
        $view="Panier";
        $pagetitle="Votre panier";
        break;
    
    case "deletepanier":    
        $data = array("login_loueur" => $_SESSION['login'], "login_loue" => myGet("login"), "prix" => myGet("prix"), "jour" => myGet("jour"));
        ModelPanier::delete($data);
        $data = array("login_loueur" => $_SESSION['login']);
        
        $l=array("login"=>myGet('login'));
        $tab_u=ModelUtilisateur::selectwhere($l);
        $u=$tab_u[0];
        $update=array("login"=>$u->login,
            "prenom"=>$u->prenom,
            "nom"=>$u->nom,
            "email"=>$u->email,
            "age"=> $u->age,
            "sexe"=>$u->sexe,
            "disponible"=>"1",
            "mdp"=>$u->mdp,
            "loueur" => $u->loueur,
            "loue"=> $u->loue,
            "com"=> $u->com);
            
            
        ModelUtilisateur::update($update);
        $u=  ModelPanier::selectWhere($data);
        $view="Panier";
        $pagetitle="Votre panier";
        break;
    case "reservation":
        $data = array("login_loue" => $_SESSION['login']);
        $u=  ModelPanier::selectWhere($data);
        $view="Reservation";
        $pagetitle="Vos réservations à venir";
        break;
    case "deletereservation":    
        $data = array("login_loue" => $_SESSION['login'], "login_loueur" => myGet("login"), "prix" => myGet("prix"), "jour" => myGet("jour"));
        ModelPanier::delete($data);
        $data = array("login_loue" => $_SESSION['login']);
        
        $l=array("login"=>$_SESSION['login']);
        $tab_u=ModelUtilisateur::selectwhere($l);
        $u=$tab_u[0];
        $update=array("login"=>$u->login,
            "prenom"=>$u->prenom,
            "nom"=>$u->nom,
            "email"=>$u->email,
            "age"=> $u->age,
            "sexe"=>$u->sexe,
            "disponible"=>"1",
            "mdp"=>$u->mdp,
            "loueur" => $u->loueur,
            "loue"=> $u->loue,
            "com"=> $u->com);
            
            
        ModelUtilisateur::update($update);
        $u=  ModelPanier::selectWhere($data);
        $view="Reservation";
        $pagetitle="Vos reservations";
        break;
    case "delete":
        if (is_null(myGet('login')) || ($_SESSION ['login'] != myGet('login') && !$_SESSION['admin'])) {
            $view = "error";
            $pagetitle = "Erreur";
            break;
        }
        $data = array("login" => myGet("login"));
        ModelUtilisateur::delete($data);
        $view='Accueil';
        $pagetitle='Accueil';
        break;
    case "promouvoir":
        if (is_null(myGet('login')) || ($_SESSION ['login'] != myGet('login') && !$_SESSION['admin'])) {
            $admin="";
            $login="";
            $view = "error";
            $pagetitle = "Erreur";
            break;
        }
        $data = array("login" => myGet("login"));
        ModelUtilisateur::promouvoir($data);
        $view='Accueil';
        $pagetitle='Accueil';
        break;
}
require VIEW_PATH . "view.php";
