<?php
function tabResa($tab_resa)
{
    $max=sizeof($tab_resa);
    $i=0;
    while($i<$max){
    $u=$tab_resa[$i];
        $idReservation = $u->idResa;
        $dateDebut = $u->dateDeb;
        $duree = $u->$duree;
        echo <<< EOT
        <tr><td><a href="?action=infoEmpa&emp=$idResa">$idResa</a><td>$dateDeb</td><td>$duree</td></tr>
</div>
EOT;
    $i++;
    }
}
?>
<?php
echo '<div class="container">';
if(isset($_SESSION['login']) && $_SESSION['admin']==1){ //Il faut être admin pour voir la liste des utilisateurs

    echo <<<EOT
    <h1>Liste des Réservations :</h1>
    <div class="containt-Utilisateur">
        <table class="table-striped tableUtilisateur" id="tableUser"><thead>
          <tr>
            <th>Numéro Réservation</th>
            <th>Date Début</th>
            <th>Date Fin</th>
          </tr>
        </thead>
EOT;
tabResa($tab_resa);
    echo <<<EOT
    </table>
EOT;
echo <<<EOT
    </div>
</div>
<script>$(document).ready(function() { $('#tableUser').DataTable(); } );</script>
EOT;
}
echo '</div>';