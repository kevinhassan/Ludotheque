<?php

define('VIEW_PATH', ROOT . DS . 'view' . DS);

// On va chercher le modele dans "./model/ModelUtilisateur.php"
require_once MODEL_PATH . 'Model' . ucfirst($controller) . '.php';

switch ($action) {
    default:
    case "readAll":
        // Initialisation des variables pour la vue
        $tab_util = ModelJeux::selectAll();
        // Chargement de la vue

        $view='List';
        $pagetitle='Accueil';
    break;
}
require VIEW_PATH . "view.php";
?>
