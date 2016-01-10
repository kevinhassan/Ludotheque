<?php

require_once 'Model.php';

class ModelJeux extends Model {
    protected static $table = "jeux";
    protected static $primary_index = "idJeu";

    public static function search($data) {
        try
        {
          $sql = "SELECT * FROM " . static::$table." WHERE ".$data["field"]." LIKE '".$data["word"]."%'";
          $req = self::$pdo->prepare($sql);
          $req->execute($data);
          return $req->fetchAll(PDO::FETCH_OBJ);
        }

        catch (PDOException $e)
        {
          echo $e->getMessage();
          die("Erreur lors de la recherche de tous les objets de la BDD " . static::$table);
        }
    }
    
    public static function checkIfDispo($idJeu) {
        try
        {
          $sql = "SELECT disponible FROM " . static::$table." WHERE 'disponible' LIKE " . $idJeu;
          $req = self::$pdo->query($sql);
          $check = $req->fetch(PDO::FETCH_OBJ);
        }

        catch (PDOException $e)
        {
          echo $e->getMessage();
          die("Erreur lors de la recherche de tous les objets de la BDD " . static::$table);
        }
    }
}
?>
