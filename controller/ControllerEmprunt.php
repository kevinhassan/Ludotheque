<?php

define('VIEW_PATH', ROOT . DS . 'view' . DS);

// On va chercher le modele dans "./model/ModelUtilisateur.php"
require_once MODEL_PATH . 'Model' . ucfirst($controller) . '.php';

switch ($action) {
    case "supprimerEmprunt":
        if( Session::is_admin())
        {
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
        if (!(ModelJeux::checkIfDispo(myGet("id_jeu"))))
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
            $date = date('Y-M-d h:i:s', $date);

            $data = array(
                "id_utilisateur" => myGet("id_utilisateur"),
                "id_jeu" => myGet("id_jeu"),
                "date_debut" => myGet("date_debut"),
                "date_fin" => $date,
                "retard" => '0'
            );

            $modif = -1;
            ModelEmprunt::insert($data);
            ModelEmprunt::updateNbJeuxDispo($modif, myGet("id_jeu"));

            $view = "ListerEmprunt";
            $pagetitle = "Emprunts";
        }
        break;
    
    case "retournerEmprunt":
        $modif = 1;
        ModelEmprunt::retourJeu(myGet("id_emprunt"), myGet("id_jeu"));
        ModelEmprunt::updateNbJeuxDispo($modif, myGet("id_jeu"));

        $view = "ListEmprunt";
        $pagetitle = "Emprunts";
        break;
}
require VIEW_PATH . "view.php";
?>