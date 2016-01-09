<meta charset="UTF-8"/>
<?php
    //Connexion à la BDD
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=ludotheque;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }

    catch (Exception $e)
    {
        die('Erreur: ' . $e->getMessage());
    }

    //On crée la table des extensions
    $bdd->exec('CREATE TABLE IF NOT EXISTS `extensions` (
      `idExtension` int(11) NOT NULL AUTO_INCREMENT,
      `idJeu` int(11) DEFAULT NULL,
      `nomExtension` varchar(255) DEFAULT NULL,
      `nbExtension` int(11) DEFAULT NULL,
      `nbExtensionDispo` int(11) DEFAULT NULL,
      PRIMARY KEY (`idExtension`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1');

    //On récupère la liste des jeux qui ont une extension
    $reponse = $bdd->query('SELECT idGame, extension FROM jeux WHERE extension != ""');
    $donnees = $reponse->fetchAll();
    $reponse->closeCursor();

    foreach ($donnees as $entree)
    {
      $extensions = explode(',', $entree['extension']);

      foreach ($extensions as $extension)
      {
          $req = $bdd->prepare('INSERT INTO extensions(idJeu, nomExtension) VALUES(:idJeu,:extension)'); //On insère l'extension avec un lien vers le jeu d'origine
          $req->execute(array(
              'idJeu' => $entree['idGame'],
              'extension' => $extension
              ));
      }
    }

    echo 'Requete terminee';
?>
