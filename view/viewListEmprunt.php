<?php
function tabEmprunt($tab_emp)
{
    $max=sizeof($tab_emp);
    $i=0;
    while($i<$max){
    $u=$tab_emp[$i];
        $idEmprunt = $u->idEmp;
        $dateDebut = $u->dateDeb;
        $dateFin = $u->dateFin;
        echo <<< EOT
        <tr><td><a href="?action=infoEmpa&emp=$idEmp">$idEmp</a><td>$dateDeb</td><td>$dateFin</td></tr>
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
    <h1>Liste des Emprunts :</h1>
    <div class="containt-Utilisateur">
        <table class="table-striped tableUtilisateur" id="tableUser"><thead>
          <tr>
            <th>Numéro Réservation</th>
            <th>Date Début</th>
            <th>Date Fin</th>
          </tr>
        </thead>
EOT;
tabEmprunt($tab_emp);
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
function isInLate(){
    /*
     * Si la date actuelle est supérieur à la date de fin mettre en retard
     */
}
?>