<?php

define('VIEW_PATH', ROOT . DS . 'view' . DS);

// On va chercher le modele dans "./model/ModelUtilisateur.php"
require_once MODEL_PATH . 'Model' . ucfirst($controller) . '.php';
require_once MODEL_PATH . 'ModelUtilisateur.php';
require_once MODEL_PATH . 'ModelJeux.php';
require_once MODEL_PATH . 'ModelReservation.php';

switch ($action) {
    case "supprimerEmprunt":
        if( Session::is_admin())
        {
            $test = ModelEmprunt::checkIfReservation(myGet("idEmprunt"));
            if($test)
            {
                $data = array(
                "id_reservation" => $test,
                );
                ModelReservation::delete($data);
            }
            
            $data = array(
                "id_emprunt" => myGet("idEmprunt"),
            );
            ModelEmprunt::delete($data);
        }
        else
        {
            $view = "erreur";          
            $message = "La modification n'a pas était prise en compte";
            $pagetitle = "Erreur";
        }        
    default:
    case "listerEmprunt":
        $estAdmin = SESSION::is_admin();
        $id = $_SESSION['id'];
        $data = array(
            "actif" => '1'
        );
        if( Session::is_admin())
        {
        // Initialisation des variables pour la vue
            $tab_emprunts = ModelEmprunt::selectWhere($data);
        }
        else
        {
            $tab_emprunts = ModelEmprunt::selectAllForUser($id);
        }
        // Initialisation des variables pour la vue

        // Chargement de la vue
        $view='ListEmprunt';
        $pagetitle='Emprunts';
    break;
    
    case "enregistrerEmprunt": 
        if (!(ModelJeux::checkIfDispo(myGet("idJeu"))))
        {
            $view = "erreur";
            $message = "Ce jeu n'est plus disponible actuellement !";
            $pagetitle = "Erreur";
        }
        else
        {
            $date = myGet("date_debut");
            $date = strtotime($date);
            $date = strtotime("+7 day", $date);
            $date = date('Y-m-d h:i:s', $date);

            $data = array(
                "id_utilisateur" => myGet("id_utilisateur"),
                "id_jeu" => myGet("idJeu"),
                "date_debut" => myGet("date_debut"),
                "date_fin" => $date,
                "retard" => '0',
                "actif" => '1',
            );
            
            $modif = -1;
            ModelEmprunt::insert($data);
            ModelEmprunt::updateNbJeuxDispo($modif, myGet("idJeu"));

            $view = "ListerEmprunt";
            $pagetitle = "Emprunts";
        }
        break;
    
    case "retournerEmprunt":
        $modif = 1;
        ModelEmprunt::retourJeu(myGet("id_emprunt"), myGet("idJeu"));
        ModelEmprunt::updateNbJeuxDispo($modif, myGet("idJeu"));

        $view = "ListEmprunt";
        $pagetitle = "Emprunts";
        break;
    
    case "creerEmprunt":
        $choix = ModelUtilisateur::getChoices();
        $jeux = ModelJeux::getChoices();
        $view = "creerEmprunt";
        $pagetitle = "Ajouter un emprunt";
        break;
}
require VIEW_PATH . "view.php";
?>