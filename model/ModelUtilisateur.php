<?php

require_once 'Model.php';

class ModelUtilisateur extends Model {
    protected static $table = "utilisateur";
    protected static $primary_index = "userId";

    public static function findClef($data)
    {
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
            die("Erreur de BDD dans le modèle utilisateur" . static::$table);
        }
      }

      public static function getNumberHomonym($username)
      {
        $sql = "SELECT COUNT(username) AS numberHomonym FROM utilisateur WHERE username = :username";
        $data = array("username" => $username);
        $query = self::$pdo->prepare($sql);

        try
        {
          $query->execute($data);
          $numberHomonym = $query->fetch()['numberHomonym'];
          return $numberHomonym;
        }
        catch(PDOException $exception)
        {
          echo $exception->getMessage();
          die("Problème pour récupérer le nombre d'homonyme");
        }

      }
    }
?>