<?php
echo <<< EOT
                       <div class="container">
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
EOT;
?>