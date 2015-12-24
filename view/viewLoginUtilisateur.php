<?php
echo <<< EOT
                <div class="row">
                    <div class="col-xs-12">

                        <div class="main">

                            <div class="row">
                            <div class="col-xs-12 col-sm-6 col-sm-offset-1 cadre">

                                <h1>La ludothèque</h1>
                                <h2>Tous vos jeux en un seul endroit</h2>

                                <form action="." name="login" role="form" class="form-horizontal" method="post" accept-charset="utf-8" onsubmit="return checkForm();">
                                    <div class="form-group">
                                    <div class="col-md-8"><input name="username" placeholder="Idenfiant" class="form-control" type="text" id="UserUsername"/></div>
                                    </div> 

                                    <div class="form-group">
                                    <div class="col-md-8"><input name="password" placeholder="Mot de passe" class="form-control" type="password" id="UserPassword"/></div>
                                    </div> 

                                    <div class="form-group">
                                    <div class="col-md-offset-0 col-md-8">
                                        <input type="hidden" name="action" value="connected" />
                                        <input type="hidden" name="controller" value="utilisateur" />   
                                        <input class="btn btn-success btn btn-success" type="submit" value="Connexion"/></div>
                                    </div>

                                </form>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
EOT;
?>