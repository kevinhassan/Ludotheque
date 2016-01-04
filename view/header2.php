<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <link rel="icon" type="image/png" href="image/logo.png" />
        <?php echo "<title>".$pagetitle.__FILE__."</title>" ?>

        <link rel="stylesheet" href="css/bootstrap/bootstrap-theme.css"/>
        <link rel="stylesheet" href="css/bootstrap/bootstrap.css"/>
        <link rel="stylesheet" href="css/style.css"/>
        <link rel="stylesheet" href="css/footer-distributed-with-address-and-phones.css"/>
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Cookie"/>
     	  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css"/>

        <script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
        <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="js/checkForms.js"></script>
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
                          <li><a href="?action=listJeux">Jeux</a></li>
                          <li><a href="?action=listResa">Mes réservations</a></li>
                          <li><a href="?action=informations">A Propos</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
EOT;
            if(Session::is_admin())
                echo '<li><a href="?action=administration">Administration</a></li>';

                echo <<< EOT
                          <li><a href="?action=myProfile">Mon Profil</a></li>
                          <li><a href="?action=disconnect">Se déconnecter</a></li>
                       </ul>
                      </div>
                    </div>
                </nav>
EOT;
        }
?>
