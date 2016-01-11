<?php
function tabEmp($tab_emprunts,$estAdmin)
{
    $max=sizeof($tab_emprunts);
    $i=0;
    while($i<$max){
    $empU=$tab_emprunts[$i];
        $idEmprunt = $empU->id_emprunt;
        $idUser = $empU->id_utilisateur;
        $idJeu = $empU->id_jeu;
        $dateDebut = $empU->date_debut;
        $dateFin = $empU->date_fin;
        $actif = $empU->actif;
        if($actif==0){
            $actif='Non';
        }  
        else {
            $actif='Oui';
        }
        echo <<< EOT
        <tr><td>$idEmprunt</td><td><a href="?action=modifierUtilisateur&controller=utilisateur&userId=$idUser">$idUser</a></td><td><a href="?action=infoJeu&idJeu=$idJeu&controller=jeux">$idJeu</a></td><td>$dateDebut</td><td>$dateFin</td><td>$actif</td>
EOT;
        if ($estAdmin)
            echo'<td><a href="?action=supprimerEmprunt&controller=emprunt&idEmprunt='.$idEmprunt.'&idJeu='.$idJeu.'" class="btn btn-danger"">Supprimer</a><td>';

echo"</tr></div>";
    $i++;
    }
}
?>
<?php
echo '<div class="container">';
echo <<<EOT
    <h1>Liste des Emprunts :</h1>
    <div class="containt-Utilisateur">
        <table class="table-striped tableUtilisateur" id="tabEmp"><thead>
          <tr>
            <th>Numéro Emprunt</th>
            <th>ID Utilisateur</th>
            <th>ID Jeu</th>
            <th>Date Début</th>
            <th>Date Fin</th>
            <th>Actif</th>
          </tr>
        </thead>
EOT;
$estAdmin = SESSION::is_admin();
tabEmp($tab_emprunts,$estAdmin);
    echo <<<EOT
    </table>
EOT;
    if ($estAdmin) {
        echo'<div style="text-align:center;"><a href="?action=creerEmprunt&controller=emprunt" class="btn btn-success"">Enregistrer nouvel emprunt</a></div>';
    }
echo <<<EOT
    </div>
</div>
<script>$(document).ready(function() { $('#tabEmp').DataTable(); } );</script>
EOT;
echo '</div>';