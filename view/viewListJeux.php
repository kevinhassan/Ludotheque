<?php
function tabJeux($tab_jeux,$page)
{
    $max=$page*20;
    $i=$page*20-20;
    while($i<$max && $i<sizeof($tab_jeux)-1){
    $u=$tab_jeux[$i];
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
    $i++;
    }
}
function nbPagesJeux($tab_jeux){
    $nbpages=  floor(sizeof($tab_jeux)/20)+1;
    $j=1;
    while($j<=$nbpages){
    echo <<< EOT
    <li><a href="?action=liste&page=$j">$j</a></li>
EOT;
    $j++;
    }
}
?>
<?php

if(isset($_SESSION['login'])){
    echo <<<EOT
<div>
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
        if(!isset($page)){
        $page=1;
    }
tabJeux($tab_jeux,$page);
    echo <<<EOT
</table>
<div class="lienPages pagination">
EOT;
nbPagesJeux($tab_jeux);
echo <<<EOT
</div>
</div>
EOT;
}else{
    echo 'Veuillez vous connecter pour pouvoir voir les jeux du site';
}
