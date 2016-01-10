<?php
function tabEmp($tab_emprunts)
{
    $max=sizeof($tab_emprunts);
    $i=0;
    while($i<$max){
    $empU=$tab_emprunts[$i];
        $idEmprunt = $resaU->id_emprunt;
        $idUser = $resaU->id_utilisateur;
        $idJeu = $resaU->id_jeu;
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
        <tr><td>$idEmprunt</td><td><a href="?action=modifierUtilisateur&controller=utilisateur&userId=$idUser">$idUser</a></td><td>$idJeu</td><td>$dateDebut</td><td>$dateFin</td><td>$actif</td></tr>
</div>
EOT;
    $i++;
    }
}
?>
<?php
echo '<div class="container">';
if(isset($_SESSION['login']) && SESSION::is_admin()){ 

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
tabEmp($tab_emprunts);
    echo <<<EOT
    </table>
EOT;
echo <<<EOT
    </div>
</div>
<script>$(document).ready(function() { $('#tabEmp').DataTable(); } );</script>
EOT;
}
echo '</div>';