<?php
if(isset($_SESSION['login'])){
    echo <<<EOT
    <div class="container">
    <div class="text-center" style="margin-top: 15%;">
      <div id="index">

      <div class="row-img ">
        <div class="col-lg-4 ">
            <a title="Afficher la liste des jeux" href="?action=listJeux" role="button"><img class="img-circle" src="./image/jeux.png" alt="Generic placeholder image" style="width: 140px; height: 140px;"></a>
          <h2>Jeux</h2>
          <p><a title="Afficher la liste des jeux" href="?action=listJeux" role="button">Voir »</a></p>
        </div>
        <div class="col-lg-4">
            <a title="Afficher mes informations personnelles" href="?action=myProfile" role="button"><img class="img-circle" src="./image/informations.png" alt="Generic placeholder image" style="width: 140px; height: 140px;"></a>
          <h2>Informations Personnelles</h2>
          <p><a title="Afficher mes informations personnelles" href="?action=myProfile" role="button">Voir »</a></p>
        </div>
EOT;
if(Session::is_admin()){
        echo <<< EOT
        <div class="col-lg-4">
            <a title="Administrer la ludothéque" href="?action=administration" role="button"><img class="img-circle" src="./image/administration.png" alt="Generic placeholder image" style="width: 140px; height: 140px;"></a>
          <h2>Administration</h2>
          <p><a title="Administrer la ludothéque" href="?action=administration" role="button">Voir »</a></p>
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
else
    require VIEW_PATH . "viewLoginUtilisateur.php";
?>
