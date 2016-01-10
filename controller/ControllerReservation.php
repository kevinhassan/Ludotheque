<?php

define('VIEW_PATH', ROOT . DS . 'view' . DS);

// On va chercher le modele dans "./model/ModelUtilisateur.php"
require_once MODEL_PATH . 'Model' . ucfirst($controller) . '.php';

switch ($action) {
    default:
    case "listerReservation":
        if( Session::is_admin())//l'admin peut voir toute les réservations
        {
            $tab_resa = ModelReservation::selectAll();
        }
        else//L'utilisateur peut voir ses réservations 
        {
            $data = array(
                "username" => $_SESSION['login'],
            );
            $tab_resa = ModelReservation::selectWhere($data);
        }
        $view = "listerResa";
        $pagetitle = "Liste des réservations";
        break;

    case "infoReservation":
        $view = "infoReservation";
        $pagetitle = "Information sur la réservation";   
        break;
}
require VIEW_PATH . "view.php";
?>