<?php
echo<<<EOT
    <div class="row">
        <div class="col-lg-12">
            <div class='row' style="text-align : center;">
                <h1>Inscrire un utilisateur</h1>
            </div>
            <form class="form-horizontal" role="form" method="post" action="." onsubmit="return checkForm();">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="id_login" class="col-sm-3 control-label">Login :</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="username" id="id_login"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="id_mdp" class="col-sm-3 control-label">Mot de passe :</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" name="password" id="id_mdp"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="id_confmdp" class="col-sm-3 control-label">Confirmation mot de passe :</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" name="confpassword" id="id_confmdp"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="sex" class="col-sm-3 control-label">Sexe :</label>
                            <div class="col-sm-8">
                                <select name="sex" class="form-control" id="id_sex" required="required">
                                    <option value="Homme" selected>Homme</option>
                                    <option value="Femme">Femme</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nom" class="col-sm-3 control-label">Nom :</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="name" id="id_name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="prenom" class="col-sm-3 control-label">Prenom :</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="nickname" id="id_nickname">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="mail" class="col-sm-3 control-label">Email :</label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control" name="email" id="id_email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tel" class="col-sm-3 control-label">T&eacute;l&eacute;phone :</label>
                            <div class="col-sm-8">
                                <input type="tel" class="form-control" name="tel" id="id_numTel" pattern="^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="mobile" class="col-sm-3 control-label">Mobile :</label>
                            <div class="col-sm-8">
                                <input type="tel" class="form-control" name="mobile" id="id_mobile" pattern="^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="adresse" class="col-sm-3 control-label">Adresse :</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="address" id="id_adress">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="cp" class="col-sm-3 control-label">Code Postal :</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="cp" id="id_cp">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="ville" class="col-sm-3 control-label">Ville :</label>
                            <div class="col-sm-8">
                                <input type="text" name="city" class="form-control" id="id_city">
                            </div>
                        </div>
                        <div class="form-group">
                             <label for="id_loueur" class="col-sm-3 control-label">Admin ? </label> :
                                <input type="checkbox" value="true" name="admin" id="id_admin"/>
                            </div>
                        </div>
                        <div class="pull-right">
                            <input type="hidden" name="action" value="save" />
                            <input type="hidden" name="controller" value="utilisateur" />
                            <button class="btn btn-success btn btn-success" type="submit" value="Confirmation">Confirmation</button>
                        </div>
            	    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript" src="js/checkForms.js"></script>
EOT;
?>
