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
            <a title="Consulter vos équipes à travers cette page" href="/equipe" role="button"><img class="img-circle" src="http://dummyimage.com/600x400/000/fff.png" alt="Generic placeholder image" style="width: 140px; height: 140px;"></a>
          <h2>Administration</h2>
          <p><a title="Consulter vos équipes à travers cette page" href="/equipe" role="button">Voir »</a></p>
        </div>
      </div>
      </div>
</div>
EOT;
}
}
?>