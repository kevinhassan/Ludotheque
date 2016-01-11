<?php
function tabResa($tab_resa,$estAdmin)
{
    $max=sizeof($tab_resa);
    $i=0;
    while($i<$max){
    $resaU=$tab_resa[$i];
        $idReservation = $resaU->id_reservation;
        $idUser = $resaU->id_utilisateur;
        $idJeu = $resaU->id_jeu;
        $idEmprunt = $resaU->id_emprunt;
        $dateDebut = $resaU->date_debut;
        $dateFin = $resaU->date_fin;
        $actif = $resaU->actif;
        if($actif==0){
            $actif='Non';
        }  
        else {
            $actif='Oui';
        }
        echo <<< EOT
        <tr><td>$idReservation</td><td><a href="?action=modifierUtilisateur&controller=utilisateur&userId=$idUser">$idUser</a></td><td><a href="?action=infoJeu&idJeu=$idJeu&controller=jeux">$idJeu</a></td><td>$idEmprunt</td><td>$dateDebut</td><td>$dateFin</td><td>$actif</td>
EOT;
        if ($estAdmin)
            echo'<td><a href="?action=supprimerReservation&controller=reservation&idResa='.$idReservation.'" class="btn btn-danger">Supprimer</a><td>';

echo"</tr></div>";
    $i++;
    }
}
?>
<?php
echo '<div class="container">';
if(isset($_SESSION['login']) && SESSION::is_admin()){ 
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
$estAdmin = SESSION::is_admin();
tabResa($tab_resa,$estAdmin);
    echo <<<EOT
    </table>
EOT;
echo <<<EOT
    </div>
</div>
<script>$(document).ready(function() { $('#tabResa').DataTable(); } );</script>
EOT;
}
echo '</div>';