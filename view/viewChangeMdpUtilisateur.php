<?php
echo<<<EOT
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class='row' style="text-align : center;">
                <h1>Changer votre mot de passe :</h1>
        </div>
            <form class="form-horizontal" role="form" method="post" action="." onsubmit="return checkForm();">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="nom" class="col-sm-3 control-label">Mot de passe :</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="mdp" id="id_mdp">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="prenom" class="col-sm-3 control-label">Confirmation mot de passe :</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="confmdp" id="id_confmdp">
                                </div>
                        </div>
                        <div class="pull-right">
                            <input type="hidden" name="action" value="changeMdp" />
                            <input type="hidden" name="controller" value="utilisateur" />
                            <button class="btn btn-success btn btn-success" type="submit" value="Valider">Valider</button>                        </div>
            	    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
EOT;

?>
