<?php
function tabJeux($tab_jeux)
{
    $max=sizeof($tab_jeux);
    $i=0;
    while($i<$max){
        $u=$tab_jeux[$i];
        $idJeu = $u->idJeu;
        $jeu = $u->nomJeu;
        $annee = $u->anneeEdition;
        $editeur = $u->editeur;
        $age = $u->age;
        $nbJoueur = $u->nbJoueur;
        
        // La syntaxe suivante permet de créer facilement des chaînes de caractères multi-lignes
        echo <<< EOT
        <tr><td><a href="?action=infoJeu&idJeu=$idJeu&controller=jeux">$jeu</a></td><td>$annee</td><td>$editeur</td><td>$age</td><td>$nbJoueur</td></tr>
</div>
EOT;
    $i++;
    }
}
if(isset($_SESSION['login'])){
    echo <<<EOT
  <div class="container">
    <h1>Liste des jeux :</h1>
    <div class="containt-Jeux">
        <table class="table-striped tableJeux" id="tableJeux"><thead>
          <tr>
            <th>Nom du jeux</th>
            <th>Année de sortie</th>
            <th>Editeur</th>
            <th>Age</th>
            <th>Joueurs</th>
          </tr>
        </thead>
EOT;
tabJeux($tab_jeux);
    echo <<<EOT
    </table>
EOT;
echo <<<EOT
    </div>
</div>
<script>$(document).ready(function() { $('#tableJeux').DataTable(); } );</script>
EOT;
}else{
    echo 'Veuillez vous connecter pour pouvoir voir les jeux du site';
}
