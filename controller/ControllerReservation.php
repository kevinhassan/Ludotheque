<?php

define('VIEW_PATH', ROOT . DS . 'view' . DS);

// On va chercher le modele dans "./model/ModelUtilisateur.php"
require_once MODEL_PATH . 'Model' . ucfirst($controller) . '.php';

switch ($action) {
    default:
    case "listerReservation":
        $id = $_SESSION['id'];
        $data = array(
            "actif" => '1'
        );
        if( Session::is_admin())
        {
        // Initialisation des variables pour la vue
            $tab_resa = ModelReservation::selectWhere($data);
        }
        else
            $tab_resa = ModelReservation::selectAllForUser($id);
        // Chargement de la vue
        $view = "ListerResa";
        $pagetitle = "Liste des réservations";
    break;

    case "reserver":
        $today = new DateTime('now');
        $date_debut = new DateTime('now');

        $date = $date_debut;
        $date = $date->format('w');

        while ($date !=2 && $date !=4) {
            $date_debut = strtotime("+1 day", $date_debut);
            $date++;
        }

        $date_fin_res = strtotime("+1 day", $date_debut); //la réservation se termine à la fin de la journée qui marque le début de l'emprunt
        $date_fin_res = date('Y-M-d h:i:s', $date_fin_res);

        $date_fin = $date_debut;
        $date_fin = strtotime("+7 day", $date_fin);
        $date_fin = date('Y-M-d h:i:s', $date_fin);
        $date_debut = date('Y-M-d h:i:s', $date_debut);

        $data = array(
            "id_utilisateur" => myGet("id_utilisateur"),
            "id_jeu" => myGet("id_jeu"),
            "date_debut" => $today,
            "date_fin" => $date_fin_res,
            "actif" => '1'
        );

        ModelReservation::insert($data);
        
        $data = array(
            "id_utilisateur" => myGet("id_utilisateur"),
            "id_jeu" => myGet("id_jeu"),
            "date_debut" => $date_debut,
            "date_fin" => $date_fin,
            "retard" => '0',
            "actif" => '1'
        );

        $modif = -1;

        ModelEmprunt::insert($data);
        ModelEmprunt::updateNbJeuxDispo($modif, myGet("id_jeu"));

        $view = "ListJeux";
        $pagetitle = "Jeux";
        break;
}
require VIEW_PATH . "view.php";
?>
