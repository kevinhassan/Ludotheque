<?php

$u=$tab_j[0];
echo <<< EOT
<div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">$u->gameName</h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Année d'édition</td>
                        <td>$u->editionYear</td>
                      </tr>
                        <tr>
                        <td>Editeur</td>
                        <td>$u->editor</td>
                      </tr>
                      <tr>
                        <td>Age</td>
                        <td>$u->age</td>
                      </tr>
                      <tr>
                        <td>Nombre de joueurs</td>
                        <td>$u->players</td>
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
                  <a href="?action=resa" class="btn btn-primary">Réserver</a>  
EOT;
if(Session::is_admin()){
echo<<<EOT
                  <a href="?action=modify" class="btn btn-success">Modifier</a>
                  <a href="?action=suppr" class="btn btn-danger">Supprimer</a>
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