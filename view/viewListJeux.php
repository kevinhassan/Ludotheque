<?php
function tabJeux($tab_jeux)
{
    $max=sizeof($tab_jeux);
    $i=0;
    while($i<$max){
    $u=$tab_jeux[$i];
        $game = $u->gameName;
        $year = $u->editionYear;
        $editor = $u->editor;
        $age = $u->age;
        $players = $u->players;
        
        // La syntaxe suivante permet de créer facilement des chaînes de caractères multi-lignes
        echo <<< EOT
        <tr><td><a href="?action=infoJeux&jeux=$game">$game</a></td><td>$year</td><td>$editor</td><td>$age</td><td>$players</td></tr>
</div>
EOT;
    $i++;
    }
}
?>
<?php

if(isset($_SESSION['login'])){
    echo <<<EOT

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
