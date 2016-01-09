<?php
echo<<<EOT
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class='row' style="text-align : center;">
                <h1>Changer votre mot de passe :</h1>
        </div>
            <form class="form-horizontal" role="form" method="post" action="." onsubmit="checkMdp()">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="nom" class="col-sm-3 control-label">Mot de passe :</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" name="mdp" id="id_mdp" required="required">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="prenom" class="col-sm-3 control-label">Confirmation mot de passe :</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" name="confmdp" id="id_confmdp" required="required">
                            </div>
                        </div>
                        <div class="pull-right">
                            <input type="hidden" name="action" value="changerMdp" />
                            <input type="hidden" name="controller" value="utilisateur" />
                            <button class="btn btn-success btn btn-success" type="submit" value="Valider">Valider</button>                        
                        </div>
            	    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
<script type="text/javascript">
    function checkMdp(){
        var identique = $("#id_mdp").val() === $("#id_confmdp").val();
        if (!identique){
            alert("Le mot de passe tapé ne correspond pas");
        }
        return identique;
    }
</script>
EOT;
?>
