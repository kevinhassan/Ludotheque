<?php
require_once 'Session.php';
class Conf {

    private static $seed = 'seedaleatoire';
    static public function getSeed() {
        return self::$seed;
    }
    static public function getDebug() {
        return self::null; //Probleme avec Xampp "Conf::getDebug() n'étant pas défini
    }

}

?>
