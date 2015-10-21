<?php
require_once 'Session.php';
class Conf {

    private static $seed = '';
    
    private static $debug = true;
    
    static public function getDebug() {
        return self::$debug;
    }
    
    static public function getSeed() {
        return self::$seed;
    }

}

?>
