<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/bootstrap/bootstrap-theme.css">
        <link rel="stylesheet" href="css/bootstrap/bootstrap.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="js/jquery.dataTables.min.js">
        <link rel="icon" type="image/png" href="./favicon.ico" />
        <link rel="stylesheet" href="css/footer-distributed-with-address-and-phones.css">
        <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
     	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
        <script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
        <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
        <title>Ludothèque</title>
    </head>
    <body>
        <?php if(!empty($_SESSION['login'])){
            echo <<< EOT
                <nav class="navbar navbar-inverse navbar-top"> <!--Le fixed ne permet pas de travailler en taille réduite--!>
                    <div class="container-fluid">
                      <div class="navbar-header">
                        <a class="navbar-brand" href="?action=accueil">Ludothèque</a>
                      </div>
                      <div>
                        <ul class="nav navbar-nav">
                          <li><a href="?action=accueil">Accueil</a></li>
                          <li><a href="?action=liste">Jeux</a></li>
                          <li><a href="?action=resa">Mes réservations</a></li>
                          <li><a href="?action=informations">A Propos</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
EOT;
            if(Session::is_admin()){
                echo <<< EOT
                        <li><a href="?action=administration">Administration</a></li>
EOT;
            }
            else{
                echo <<< EOT
                        <li><a href="?action=profil">Mon Profil</a></li>
EOT;
            }
                echo <<< EOT
                          <li><a href="?action=disconnect">Se déconnecter</a></li>
                       </ul>
                      </div>
                    </div>
                </nav>
         <div class="container">
EOT;
         /*
          * Probleme en cas de diminution de la largeur de la page 
          * =>chevauchement du nav
          */
   }
?>
