<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/bootstrap/bootstrap-theme.css">
        <link rel="stylesheet" href="css/bootstrap/bootstrap.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="js/jquery.dataTables.min.js">
        <link rel="icon" type="image/png" href="./favicon.ico" />
        <script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
        <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
        <title>Ludothèque</title>
    </head>
    <body>
        <nav>
            <div id='cssmenu'>
            </div>
        </nav>
        <?php if(!empty($_SESSION['login'])){
            echo <<< EOT
                <nav class="navbar navbar-default navbar-fixed-top">
                    <div class="container-fluid">
                      <div class="navbar-header">
                        <a class="navbar-brand" href="?action=liste">Ludothèque</a>
                      </div>
                      <div>
                        <ul class="nav navbar-nav">
                          <li class="active"><a href="">Home</a></li>
                          <li><a href="#">Page 1</a></li>
                          <li><a href="#">Page 2</a></li>
                          <li><a href="#">Page 3</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
EOT;
            if(Session::is_admin()){
                echo <<< EOT
                        <li><a href="?action=create">Inscrire un utilisateur</a></li>
EOT;
            }
                echo <<< EOT
                          <li><a href="?action=disconnect">Se déconnecter</a></li>
                       </ul>
                      </div>
                    </div>
                </nav>
                <div style="height:50px">
                </div>
EOT;
         
   }
?>
