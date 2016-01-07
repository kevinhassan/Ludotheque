<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <link rel="icon" type="image/png" href="image/logo.png" />
        <?php echo "<title>".$pagetitle."</title>" ?>

        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css"/>
        <link rel="stylesheet" href="css/footer-distributed-with-address-and-phones.css"/>
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Cookie"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
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
                          <li><a href="?action=accueil">Accueil <span class="glyphicon glyphicon-home"></span></a></li>
                          <li><a href="?action=listJeux">Jeux <span class="glyphicon glyphicon-king"></a></li>
                          <li><a href="?action=listResa">Mes réservations <span class="glyphicon glyphicon-th-list"></span></a></li>
                          <li><a href="?action=informations">Informations <span class="glyphicon glyphicon-info-sign"></span></a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
EOT;
            if(Session::is_admin())
                echo '<li><a href="?action=administration">Administration <span class="glyphicon glyphicon-cog"></span></a></li>';

                echo <<< EOT
                          <li><a href="?action=myProfile">Mon Profil <span class="glyphicon glyphicon-user"></span></a></li>
                          <li><a href="?action=disconnect">Se déconnecter <span class="glyphicon glyphicon-log-out"></span></a></li>
                       </ul>
                      </div>
                    </div>
                </nav>
EOT;
        }
?>
