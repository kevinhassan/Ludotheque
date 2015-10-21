<?php

define('VIEW_PATH', ROOT . DS . 'view' . DS);

// On va chercher le modele dans "./model/ModelUtilisateur.php"
require_once MODEL_PATH . 'Model' . ucfirst($controller) . '.php';

switch ($action) {
     default:

    case "accueil":
        $view='Login';
        $pagetitle='Accueil';
        break;
}
require VIEW_PATH . "view.php";
