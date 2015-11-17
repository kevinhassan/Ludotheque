<?php
function view1($tu)
{
    foreach ($tu as $u) {
        $game = $u->gameName;
        $year = $u->editionYear;
        $editor = $u->editor;
        $age = $u->age;
        $players = $u->players;
        
        // La syntaxe suivante permet de créer facilement des chaînes de caractères multi-lignes
        echo <<< EOT
        <tr><td>$game</td><td>$year</td><td>$editor</td><td>$age</td><td>$players</td></tr>
</div>
EOT;
    }
}
?>
<?php

if(isset($_SESSION['login'])){
    echo <<<EOT
<div>
    <h1>Liste des jeux :</h1>
    <table class="table-striped tableJeux"><thead>
      <tr>
        <th>Nom du jeux</th>
        <th>Année de sortie</th>
        <th>Editeur</th>
        <th>Age</th>
        <th>Players</th>
      </tr>
    </thead>
EOT;
view1($tab_util);
    echo <<<EOT
</table>
</div>
EOT;
}else{
    echo 'Veuillez vous connecter pour pouvoir voir les utilisateurs du site';
}
