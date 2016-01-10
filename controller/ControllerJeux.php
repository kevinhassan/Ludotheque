<?php

define('VIEW_PATH', ROOT . DS . 'view' . DS);

// On va chercher le modele dans "./model/ModelUtilisateur.php"
require_once MODEL_PATH . 'Model' . ucfirst($controller) . '.php';

switch ($action) {
    default:
    case "listerJeux":
       $tab_jeux = ModelJeux::selectAll();
       $view='listerJeux';
       $pagetitle='Liste des jeux';
       break;

    case "search":
        $data = array(
            "field" => myGet("field"),
            "word" => myGet("word"),
        );
        $tab_jeux = ModelJeux::search($data);
        $view = 'listerJeux';
        break;

    case "infoJeu":
        $data=array(
            "nomJeu" => myGet('jeux'),
        );
        $tab_jeux= ModelJeux::selectWhere($data);
        $view = "infoJeux";
        $pagetitle= myGet('jeux');
        break;
    
    case "supprimerJeu":/*Vérifier que le jeu n'est pas sous réservation à ce moment là*/
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
            $view="listerJeux";
        }
        else{
            $view="erreur";          
            $message="La modification n'a pas était prise en compte";
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
            $view = "modifierJeu";
            $pagetitle = "Modifier un jeu";
            break;
        }
        else{
            $view="erreur";          
            $message="La modification n'a pas était prise en compte";
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
            $view="listerJeux";
            break;
        }
        else{
            $view="erreur";          
            $message="La modification n'a pas était prise en compte";
            $pagetitle="Erreur";  
        }
        break;      
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
            $view="erreur";          
            $message="La modification n'a pas était prise en compte";
            $pagetitle="Erreur";             
        }
        break;
}
require VIEW_PATH . "view.php";
?>
