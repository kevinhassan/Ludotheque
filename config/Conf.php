<?php
require_once 'Session.php';
class Conf {

    private static $seed = 'seedaleatoire';
    static public function getSeed() {
        return self::$seed;
    }

}

?>
