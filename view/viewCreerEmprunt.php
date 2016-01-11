<?php
$date_debut = new DateTime('now');
$date_debut = $date_debut->format('Y-m-d H:i:s');
function tabChoix($type, $a, $b)
{
    $max=sizeof($type);
    $i=0;
    while($i<$max){
        $tab=$type[$i];
        $id = $tab->$a;
        $nom = $tab->$b;
        echo <<< EOT
            <option value="$id">$nom</option>
EOT;
        $i++;
    }
}

echo<<<EOT
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class='row' style="text-align : center;">
                <h1>Ajouter un emprunt</h1>
            </div>
            <form class="form-horizontal" role="form" method="post" action=".">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="user" class="col-sm-3 control-label">Membre :</label>
                            <div class="col-sm-8">
                                <select name="id_utilisateur" class="form-control" id="id_user" required="required">
EOT;
                                tabChoix($choix, 'userId', 'username');
echo<<<EOT
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="jeu" class="col-sm-3 control-label">Jeu :</label>
                            <div class="col-sm-8">
                                <select name="idJeu" class="form-control" id="id_jeu" required="required">
EOT;
                                tabChoix($jeux, 'idJeu', 'nomJeu');
echo<<<EOT
                                </select>
                            </div>
                        </div>
                        <div class="pull-right">
                            <input type="hidden" name="date_debut" value="$date_debut" />
                            <input type="hidden" name="action" value="enregistrerEmprunt" />
                            <input type="hidden" name="controller" value="emprunt" />
                            <button class="btn btn-success btn btn-success" type="submit" value="Confirmation">Confirmation</button>
                        </div>
            	    </div>
                </div>
            </form>
        </div>
    </div>
</div>
EOT;
?>
