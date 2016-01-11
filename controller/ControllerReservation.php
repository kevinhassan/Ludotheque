<?php

define('VIEW_PATH', ROOT . DS . 'view' . DS);

require_once MODEL_PATH . 'Model' . ucfirst($controller) . '.php';
require_once MODEL_PATH . 'ModelEmprunt.php';
require_once MODEL_PATH . 'ModelJeux.php';

switch ($action) {
    case "supprimerReservation":
            $empruntLie = ModelReservation::getIdEmprunt(myGet("idResa"));
            $data = array(
                "id_reservation" => myGet("idResa"),
            );
            ModelReservation::delete($data);
        
            $data = array(
                "id_emprunt" => $empruntLie,
            );
            ModelEmprunt::delete($data);
    default:
    case "listerReservation":
        if(Session::is_admin())//l'admin peut voir toutes les réservations
            $tab_resa = ModelReservation::selectAll();

        else//L'utilisateur peut voir ses réservations
            $tab_resa = ModelReservation::selectAllForUser($_SESSION['id'], TRUE);

        $view = "ListerResa";
        $pagetitle = "Liste des réservations";
    break;

    case "reserver":
        //Un jeu ne peut être réservé que si l'utilisateur n'a pas d'autre réservation en cours
        if(ModelReservation::checkIfUserHasActiveReservation($_SESSION['id']))
        {
            $view = "erreur";
            $message = "Vous avez déjà réservé un autre jeu !";
            $pagetitle = "Erreur";
            break;
        }
        if (!(ModelJeux::checkIfDispo(myGet("jeu"))))
        {
            $view = "erreur";
            $message = "Ce jeu n'est plus disponible actuellement !";
            $pagetitle = "Erreur";
            break;
        }
        else 
        {
            $today = new DateTime('now');
            $date_debut = new DateTime('now');
            $date_fin_res = new DateTime('now');
            $date_fin = new DateTime('now');

            $date = $date_debut;
            $date = intval($date->format('w'));

            while ($date !=2 && $date !=4) {
                $date_debut = $date_debut->modify('+ 1 day');
                $date_fin_res = $date_fin_res->modify('+ 1 day');
                $date_fin = $date_fin->modify('+ 1 day');
                $date++;
            }
            
            //la réservation se termine à la fin de la journée qui marque le début de l'emprunt
            $date_fin_res = $date_fin_res->modify('+ 1 day');
            
            $date_fin = $date_fin->modify('+ 1 week');
            
            $date_debut = $date_debut->format('Y-m-d H:i:s');
            $date_fin = $date_fin->format('Y-m-d H:i:s');
            $data = array(
                "id_utilisateur" => $_SESSION['id'],
                "id_jeu" => myGet("jeu"),
                "date_debut" => $date_debut,
                "date_fin" => $date_fin,
                "retard" => '0',
                "actif" => '1'
            );

            $modif = -1;

            ModelEmprunt::insert($data);
            ModelEmprunt::updateNbJeuxDispo($modif, myGet("jeu"));
            
            $today = $today->format('Y-m-d H:i:s');
            $date_fin_res = $date_fin_res->format('Y-m-d H:i:s');
            $id_emprunt = ModelEmprunt::getIdForReservation($_SESSION['id']);
            
            $data = array(
                "id_utilisateur" => $_SESSION['id'],
                "id_jeu" => myGet("jeu"),
                "id_emprunt" => $id_emprunt,
                "date_debut" => $today,
                "date_fin" => $date_fin_res,
                "actif" => '1'
            );
            
            ModelReservation::insert($data);
            
            if(Session::is_admin())//l'admin peut voir toutes les réservations
                $tab_resa = ModelReservation::selectAll();

            else//L'utilisateur peut voir ses réservations
                $tab_resa = ModelReservation::selectAllForUser($_SESSION['id'], TRUE);

            $view = "ListerResa";
            $pagetitle = "Liste des réservations";
        }
        break;
        
    case "supprimerReservation":
        $data = array(
            "id_reservation" => myGet("idResa")
            );
        ModelReservation::delete($data);
        break;
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
        }
        $view = "ListJeux";
        $pagetitle = "Jeux";
        break;*/   
}
require VIEW_PATH . "view.php";
