<?php
echo<<<EOT
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class='row' style="text-align : center;">
                <h1>Ajouter un jeu à la Ludothèque</h1>
        </div>
            <form class="form-horizontal" role="form" method="post" action=".">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="nom" class="col-sm-3 control-label">Nom du jeu :</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="name" id="id_name" required="required">
                            </div>
                            <label for="nom" class="col-sm-3 control-label">Année d'édition :</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="annee" id="id_annee">
                            </div>
                            <label for="nom" class="col-sm-3 control-label">Editeur :</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="editor" id="id_editor">
                            </div>
                            <label for="nom" class="col-sm-3 control-label">Age conseillé :</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="age" id="id_age">
                            </div>   
                            <label for="nom" class="col-sm-3 control-label">Nombre de joueur :</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="nbJoueur" id="id_nbJoueur">
                            </div>      
                            <label for="nom" class="col-sm-3 control-label">Extensions :</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="extension" id="id_extension">
                            </div>                                    
                        </div>
                        
                        <div class="pull-right">
                            <input type="hidden" name="action" value="saveJeu" />
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
EOT;

?>
