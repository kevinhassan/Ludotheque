<?php

require_once 'Model.php';

class ModelEmprunt extends Model {
    protected static $table = "emprunt";
    protected static $primary_index = "id_emprunt";
    
    public static function selectAllForUser($idUser) {//selectionne tous les emprunts concernant l'utilisateur concerné
        try
        {
            $sql = "SELECT * FROM " . static::$table . " WHERE 'id_utilisateur' LIKE " . $idUser . " AND 'actif' LIKE '1'";
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
    
    public static function checkIfLate($id) {//vérifie si un emprunt est en retard et met le statut à jour
        try
        {
            $date = new DateTime('now');
            
            $sql = "SELECT date_fin FROM " . static::$table . " WHERE 'id_emprunt' LIKE " . $id;
            $req = self::$pdo->query($sql);
            // fetchAll retoure un tableau d'objets représentant toutes les lignes du jeu d'enregistrements
            $date_fin = $req->fetch(PDO::FETCH_OBJ);
            
            if ($date_fin > $date)
            {
                $sql = "UPDATE " . static::$table . " SET retard='1' WHERE 'id_emprunt' LIKE " . $id;
                $req = self::$pdo->query($sql);  
            }
        }

        catch (PDOException $e)
        {
            echo $e->getMessage();
            die("Erreur lors de la recherche de tous les objets de la BDD " . static::$table);
        }
    }
    
    public static function checkIfActif($idJeu, $id) {//vérifie si un emprunt est en retard et met le statut à jour
        try
        {
            $date = new DateTime('now');
            
            $sql = "SELECT date_fin FROM " . static::$table . " WHERE 'id_jeu' LIKE " . $idJeu;
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
    
    public static function checkIfUserActif($idUser) {//vérifie si un utilisateur a déjà un emprunt/une réservation en cours
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
    
    public static function updateNbJeuxDispo($modif, $idJeu) {//selectionne tous les emprunts concernant l'utilisateur concerné
        try
        {
            $sql = "SELECT disponible FROM jeux WHERE idJeu Like " . $idJeu;
            $req = self::$pdo->query($sql);
            $update = $req->fetch(PDO::FETCH_OBJ);
            
            $update = intval($update->disponible);
            $update += $modif;
                    
            $sql = "UPDATE Jeux SET disponible = " . $update . " WHERE 'id_Jeu' = '" . $idJeu ."'";
            $req = self::$pdo->prepare($sql);
            $req->execute();
        }

        catch (PDOException $e)
        {
            echo $e->getMessage();
            die("Erreur lors de la recherche de tous les objets de la BDD " . static::$table);
        }
    }
    
    public static function retourJeu($idEmprunt, $idJeu) {//selectionne tous les emprunts concernant l'utilisateur concerné
        try
        {
            $sql = "UPDATE emprunt SET actif TO '0' WHERE id_emprunt LIKE " . $idEmprunt;
            $req = self::$pdo->prepare($sql);
            $req->execute($data);
        }

        catch (PDOException $e)
        {
            echo $e->getMessage();
            die("Erreur lors de la recherche de tous les objets de la BDD " . static::$table);
        }
    }
    
    public static function getIdForReservation($idUser) {
        try
        {
            $sql = "SELECT id_emprunt FROM emprunt WHERE id_utilisateur = " . $idUser . " ORDER BY id_emprunt DESC";
            $req = self::$pdo->query($sql);
            $res = $req->fetch(PDO::FETCH_OBJ);
            
            return intval($res->id_emprunt);
        }

        catch (PDOException $e)
        {
            echo $e->getMessage();
            die("Erreur lors de la recherche de tous les objets de la BDD " . static::$table);
        }
    }
}
?>