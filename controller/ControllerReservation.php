<?php

define('VIEW_PATH', ROOT . DS . 'view' . DS);

// On va chercher le modele dans "./model/ModelUtilisateur.php"
require_once MODEL_PATH . 'Model' . ucfirst($controller) . '.php';
require_once MODEL_PATH . 'ModelEmprunt.php';

switch ($action) {
    default:
    case "listerReservation":
        if(Session::is_admin())//l'admin peut voir toutes les réservations
            $tab_resa = ModelReservation::selectAll();

        else//L'utilisateur peut voir ses réservations
            $tab_resa = ModelReservation::selectAllForUser($_SESSION['id']);

        $view = "listerResa";
        $pagetitle = "Liste des réservations";
    break;

    case "reserver":
        $today = new DateTime('now');
        $date_debut = new DateTime('now');

        $date = $date_debut;
        $date = $date->format('w');

        while ($date != 2 && $date !=4)
        {
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

//Code à garder: prémices pour la gestions des réservations d'extensions
/*    case "reserverJeu":
        if(ModelReservation::checkIfUserHasActiveReservation($_SESSION['id']) || ModelEmprunt::checkIfUserHasActiveEmprunt($_SESSION['id']))
        {
          $view = "erreur";
          $pagetitle = "Réservation refusée";
          $message = "Vous avez déjà une réservation où un emprunt en cours";
        }

        else
        {
          $view = "reserverJeu";
          $pagetitle = "Réservation";
          $jeu = ModelJeux::selectWhere(array('idJeu' => myGet('jeu')))[0];
          $tabExtensions = ModelExtensions::getExtensionsFromGameId($tabJeu->idJeu);
        }*/

        $view = "ListJeux";
        $pagetitle = "Jeux";
        break;
}
require VIEW_PATH . "view.php";
?>
