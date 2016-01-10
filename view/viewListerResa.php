<?php
function tabResa($tab_resa)
{
    $max=sizeof($tab_resa);
    $i=0;
    while($i<$max){
    $resaUsers=$tab_resa[$i];
        $idReservation = $u->id_reservation;
        $idUser = $u->idUser;
        $idJeu = $u->$id_jeu;
        $idEmprunt = $u->$id_emprunt;
        $dateDebut = $u->$date_debut;
        $dateFin = $u->$date_fin;
        $actif = $u->$actif;
        echo <<< EOT
        <tr><td>$idReservation<td><td>$idUser<td><td>$idJeu<td>$idEMprunt</td><td>$dateDebut</td><td>$dateFin</td><td>$actif</td></tr>
</div>
EOT;
    $i++;
    }
}
?>
<?php
echo '<div class="container">';
if(isset($_SESSION['login']) && SESSION::is_admin()){ //Il faut être admin pour voir la liste des utilisateurs

    echo <<<EOT
    <h1>Liste des Réservations :</h1>
    <div class="containt-Utilisateur">
        <table class="table-striped tableUtilisateur" id="tabResa"><thead>
          <tr>
            <th>Numéro Réservation</th>
            <th>ID Utilisateur</th>
            <th>ID Jeu</th>
            <th>ID Emprunt</th>
            <th>Date Début</th>
            <th>Date Fin</th>
            <th>Actif</th>
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