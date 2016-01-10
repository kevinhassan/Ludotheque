<?php

$u=$tab_jeux[0];
echo <<< EOT
<div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">$u->nomJeu</h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class=" col-md-9 col-lg-9 ">
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Année d'édition</td>
                        <td>$u->anneeEdition</td>
                      </tr>
                        <tr>
                        <td>Editeur</td>
                        <td>$u->editeur</td>
                      </tr>
                      <tr>
                        <td>Age</td>
                        <td>$u->age</td>
                      </tr>
                      <tr>
                        <td>Nombre de joueurs</td>
                        <td>$u->nbJoueur</td>
                      </tr>
EOT;
if($u->extension!=null){
    echo <<< EOT
      <tr>
                        <td>Extension</td>
                        <td>$u->extension</td>
                      </tr>
EOT;
}
echo <<< EOT


                    </tbody>
                  </table>
                  <a href="?action=reserverJeu&controller=reservation&jeu=$u->idJeu" class="btn btn-primary">Réserver</a>
EOT;
if(Session::is_admin()){
echo<<<EOT
                  <a href="?action=modifierJeu&controller=jeux&jeu=$u->idJeu" class="btn btn-success">Modifier</a>
                  <a href="?action=supprimerJeu&controller=jeux&jeu=$u->idJeu" class="btn btn-danger">Supprimer</a>
EOT;
}
echo<<<EOT
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
EOT;
?>
