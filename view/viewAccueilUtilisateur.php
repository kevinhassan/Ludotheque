<?php
if(isset($_SESSION['login'])){
    echo <<<EOT
    
    <div class="text-center" style="    margin-top: 15%;">
      <div id="index">
      <div class="style row-img">
        <div class="col-lg-4">
            <a title="Gérez vos entrainements à travers cette page" href="?action=liste" role="button"><img class="img-circle" src="./image/jeux.jpg" alt="Generic placeholder image" style="width: 140px; height: 140px;"></a>
          <h2>Jeux</h2>
          <p><a title="Gérez vos entrainements à travers cette page" href="?action=liste" role="button">Voir »</a></p>
        </div>
        <div class="col-lg-4">
            <a title="Gérez vos matchs à travers cette page" href="/match" role="button"><img class="img-circle" src="http://dummyimage.com/600x400/000/fff.png" alt="Generic placeholder image" style="width: 140px; height: 140px;"></a>
          <h2>Informations Personnelles</h2>
          <p><a title="Gérez vos matchs à travers cette page" href="/match" role="button">Voir »</a></p>
        </div>
EOT;
if(Session::is_admin()){
        echo <<< EOT
        <div class="col-lg-4">
            <a title="Administration" href="?action=administration" role="button"><img class="img-circle" src="./image/administration.png" alt="Generic placeholder image" style="width: 140px; height: 140px;"></a>
          <h2>Administration</h2>
          <p><a title="Administration" href="?action=administration" role="button">Voir »</a></p>
        </div>
EOT;
}
echo <<<EOT
          </div>
      </div>
    </div>
</div>
EOT;
}
//Dans ce cas login est vide on propose de se logger
else{
    echo <<< EOT
    <html>
        <head>
            <meta charset="UTF-8">
            <title>Accueil</title>
        </head>
        <body>
             <div class="container">
                <div class="row">
                    <div class="col-xs-12">

                        <div class="main">

                            <div class="row">
                            <div class="col-xs-12 col-sm-6 col-sm-offset-1 cadre">

                                <h1>La ludothèque</h1>
                                <h2>Tous vos jeux en un seul endroit</h2>

                                <form action="." name="login" role="form" class="form-horizontal" method="post" accept-charset="utf-8">
                                    <div class="form-group">
                                    <div class="col-md-8"><input name="username" placeholder="Idenfiant" class="form-control" type="text" id="UserUsername"/></div>
                                    </div> 

                                    <div class="form-group">
                                    <div class="col-md-8"><input name="password" placeholder="Mot de passe" class="form-control" type="password" id="UserPassword"/></div>
                                    </div> 

                                    <div class="form-group">
                                    <div class="col-md-offset-0 col-md-8">
                                        <input type="hidden" name="action" value="connected" />
                                        <input type="hidden" name="controller" value="utilisateur" />   
                                        <input class="btn btn-success btn btn-success" type="submit" value="Connexion"/></div>
                                    </div>

                                </form>
                            </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </body>
    </html>
EOT;
}
?>