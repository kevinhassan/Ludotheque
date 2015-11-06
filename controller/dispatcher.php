<?php

define('MODEL_PATH', ROOT . DS . 'model' . DS);

session_name('tktpoto');
session_start();

function myGet($nomvar){
    if(isset($_GET[$nomvar])){
        return $_GET[$nomvar];
    }
    else if(isset($_POST[$nomvar])){
        return $_POST[$nomvar];
    }
    else { return NULL;
    }
}

if (!is_null(myGet('controller')))
    $controller = myGet('controller'); //recupere le controlleur passe dans l'url
else
    $controller = "utilisateur";        

if (!is_null(myGet('action')))
    $action = myGet('action');    //recupere l'action  passee dans l'url
else
    $action = "accueil";                //à modifier



switch ($controller) {
    case "utilisateur":
        require_once"ControllerUtilisateur.php";
        break;
    default:
}
?>