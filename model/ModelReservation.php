<?php

require_once 'Model.php';

class ModelReservation extends Model {
    protected static $table = "reservation";
    protected static $primary_index = "id_reservation";

    public static function selectAllForUser($idUser, $onlyActive = FALSE) {
        try
        {
            $sql = "SELECT * FROM " . static::$table . "WHERE 'id_utilisateur' LIKE '" . $idUser . "'";

            if($onlyActive)
              $sql .= " AND 'actif' LIKE '1'";

            $req = self::$pdo->query($sql);
            // fetchAll retoure un tableau d'objets représentant toutes les lignes du jeu d'enregistrements
            return $req->fetchAll(PDO::FETCH_OBJ);
        }

        catch (PDOException $e)
        {
            echo $e->getMessage();
            die("Erreur lors de la recherche de tous les objets de la BDD " . static::$table);
        }
    }
    
    public static function getIdEmprunt($id) {
        try
        {
            $sql = "SELECT id_emprunt FROM " . static::$table . " WHERE id_reservation = " . $id;
            $req = self::$pdo->query($sql);
            // fetchAll retoure un tableau d'objets représentant toutes les lignes du jeu d'enregistrements
            $res = $req->fetch(PDO::FETCH_OBJ);
            
            return $res->id_emprunt;
        }

        catch (PDOException $e)
        {
            echo $e->getMessage();
            die("Erreur lors de la recherche de tous les objets de la BDD " . static::$table);
        }
    }

    public static function checkIfUserHasActiveReservation($idUser) {//vérifie si un utilisateur a déjà une réservation en cours
        try
        {
            $sql = "SELECT COUNT(id_user) FROM " . static::$table . " WHERE 'actif' LIKE '1' AND WHERE 'id_user' LIKE " . $idUser;
            $req = self::$pdo->query($sql);
            // fetchAll retoure un tableau d'objets représentant toutes les lignes du jeu d'enregistrements
            $check = $req->fetch(PDO::FETCH_OBJ);

            if ($check > 0) {
                return TRUE;
            }

            return FALSE;
        }

        catch (PDOException $e)
        {
            echo $e->getMessage();
            die("Erreur lors de la recherche de tous les objets de la BDD " . static::$table);
        }
    }

    public static function checkIfActif($id) {//vérifie si un emprunt est en retard et met le statut à jour
        try
        {
            $date = new DateTime('now');

            $sql = "SELECT date_fin FROM " . static::$table . " WHERE 'id_reservation' LIKE " . $id;
            $req = self::$pdo->query($sql);
            // fetchAll retoure un tableau d'objets représentant toutes les lignes du jeu d'enregistrements
            $date_fin = $req->fetch(PDO::FETCH_OBJ);

            if ($date > $date_fin)
            {
                $sql = "UPDATE " . static::$table . " SET actif='0' WHERE 'id_reservation' LIKE " . $id;
                $req = self::$pdo->query($sql);
            }
        }

        catch (PDOException $e)
        {
            echo $e->getMessage();
            die("Erreur lors de la recherche de tous les objets de la BDD " . static::$table);
        }
    }
}
?>
