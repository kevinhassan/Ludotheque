<?php

require_once 'Model.php';

class ModelExtensions extends Model {
    protected static $table = "extensions";
    protected static $primary_index = "idExtension";


    public static function getExtensionsFromGameId($gameId) //Renvoie toutes les extensions liées à un jeu dont l'ID est passé en paramètre
    {
      try
      {
        $sql = "SELECT * FROM " . static::$table ." WHERE idJeu = :idJeu";
        $req = self::$pdo->prepare($sql);
        $req->execute(array("idJeu" => $gameId));
        return $req->fetchAll(PDO::FETCH_OBJ);
      }

      catch (PDOException $e)
      {
        echo $e->getMessage();
        die("Erreur lors de la recherche de tous les objets de la BDD " . static::$table);
      }
    }

}
?>
