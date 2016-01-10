<?php
$jeu=$tab_jeux[0];
echo<<<EOT
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class='row' style="text-align : center;">
                <h1>Modifier le jeu : <span style='color:red'>$jeu->nomJeu</span></h1>
        </div>
            <form class="form-horizontal" role="form" method="post" action=".">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="nom" class="col-sm-3 control-label">Nom du jeu :</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="name" id="id_name" value="$jeu->nomJeu" required="required">
                            </div>
                            <label for="nom" class="col-sm-3 control-label">Année d'édition :</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="annee" id="id_annee" value="$jeu->anneeEdition">
                            </div>
                            <label for="nom" class="col-sm-3 control-label">Editeur :</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="editeur" id="id_editeur" value="$jeu->editeur">
                            </div>
                            <label for="nom" class="col-sm-3 control-label">Age conseillé :</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="age" id="id_age" value="$jeu->age">
                            </div>   
                            <label for="nom" class="col-sm-3 control-label">Nombre de joueur :</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="nbJoueur" id="id_nbJoueur" value="$jeu->nbJoueur">
                            </div>      
                            <label for="nom" class="col-sm-3 control-label">Extensions :</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="extension" id="id_extension" value="$jeu->extension">
                            </div>                                    
                        </div>
                        
                        <div class="pull-right">
                            <input type="hidden" name="action" value="mettreAjourJeu" />
                            <input type="hidden" name="controller" value="jeux" />
                            <input type="hidden" name="jeu" value="$jeu->nomJeu" />
                            <button class="btn btn-success btn btn-success" type="submit" value="Valider">Valider</button>                        
                        </div>
            	    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
EOT;

?>
