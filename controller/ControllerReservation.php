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

    case "infoReservation":
        $view = "infoReservation";
        $pagetitle = "Information sur la réservation";
        break;

    case "reserverJeu":
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
        }

        break;
}
require VIEW_PATH . "view.php";
?>
