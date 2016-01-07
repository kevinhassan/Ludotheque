<?php

require_once 'Model.php';

class ModelUtilisateur extends Model {
    protected static $table = "utilisateur";
    protected static $primary_index = "userId";

    public static function findClef($data) {
        try
        {
            $sql = "SELECT clef FROM utilisateur WHERE username = :username";
            // Preparation de la requete
            $req = self::$pdo->prepare($sql);
            // execution de la requete
            $req->execute($data);
            return $req->fetchAll(PDO::FETCH_OBJ);
        }

        catch (PDOException $e)
        {
            echo $e->getMessage();
            die("Erreur dans la BDD " . static::$table);
        }
    }
}
?>
