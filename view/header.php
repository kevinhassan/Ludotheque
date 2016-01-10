<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <link rel="icon" type="image/png" href="image/logo.png" />
        <?php echo "<title>".$pagetitle."</title>" ?>

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/style.css"/>
        <link rel="stylesheet" href="css/footer-distributed-with-address-and-phones.css"/>
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Cookie"/>
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

        <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
    </head>
    <body>
        <?php if(!empty($_SESSION['login'])){
            echo <<< EOT
                <nav class="navbar navbar-inverse navbar-top">
                    <div class="container-fluid">
                      <div class="navbar-header">
                        <a class="navbar-brand" href="?action=accueil">Ludothèque</a>
                      </div>
                      <div>
                        <ul class="nav navbar-nav">
                          <li><a href="?action=accueil&controller=utilisateur">Accueil <span class="glyphicon glyphicon-home"></span></a></li>
                          <li><a href="?action=listerJeux&controller=jeux">Jeux <span class="glyphicon glyphicon-king"></a></li>
                          <li><a href="?action=listerReservation&controller=reservation">Mes réservations <span class="glyphicon glyphicon-th-list"></span></a></li>
                          <li><a href="?action=listerReservation&controller=emprunt">Mes Emprunts <span class="glyphicon glyphicon-th-list"></span></a></li>
                          <li><a href="?action=informations&controller=utilisateur">Informations <span class="glyphicon glyphicon-info-sign"></span></a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
EOT;
            if(Session::is_admin())
                echo '<li><a href="?action=administration&controller=utilisateur">Administration <span class="glyphicon glyphicon-cog"></span></a></li>';

                echo <<< EOT
                          <li><a href="?action=monProfil&controller=utilisateur">Mon Profil <span class="glyphicon glyphicon-user"></span></a></li>
                          <li><a href="?action=deconnecte&controller=utilisateur">Se déconnecter <span class="glyphicon glyphicon-log-out"></span></a></li>
                       </ul>
                      </div>
                    </div>
                </nav>
EOT;
        }
?>
