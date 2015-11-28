<?php
echo <<< EOT
            <div class="row">
                <div class="col-xs-12">
                        <div class="row">
                        <div class="col-xs-12 col-sm-6 col-sm-offset-1 cadre">
        <form method="post" action=".">
            <fieldset>
                <legend>Inscription d'un utilisateur</legend>
                <p>
                    <label for="id_login">Login</label> :
                    <input type="text" name="username" id="id_login"/>
                </p>

                <p>
                    <label for="id_mdp">Mot de passe</label> :
                    <input type="password" name="password" id="id_mdp"/>
                </p>
                <p>
                    <label for="id_confmdp">Confirmation mot de passe</label> :
                    <input type="password" name="confpassword" id="id_confmdp"/>
                </p>
                <p>
                    <label for="id_adresse">Adresse</label> :
                    <input type="text" name="adresseUtilisateur" id="id_adresse"/>
                </p>
                <p>
                    <label for="id_eMail">E-Mail</label> :
                    <input type="email" name="emailUtilisateur" id="id_eMail"/>
                </p>
                <p>
                    <label for="id_numTel">N°Tel</label> :
                    <input type="tel" name="numTelUtilisateur" id="id_numTel" pattern="^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$">                </p>
                <p>
                    <label for="id_loueur">Admin ? </label> :
                    <input type="checkbox" value="true" name="admin" id="admin"/>
                </p>
                <input type="hidden" name="action" value="save" />
                <input type="hidden" name="controller" value="utilisateur" />                
                <p>
                    <input class="btn btn-success btn btn-success" type="submit" value="Confirmation" />
                </p>
            </fieldset>
        </form>
                    </div>
                    </div>
            </div>
                    </div>

EOT;
?>