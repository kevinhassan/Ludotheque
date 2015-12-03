<?php
echo<<<EOT
    <div class="row">
        <div class="col-lg-12">     
            <div class='row' style="text-align : center;">
                <h1>Ajouter un jeu</h1>
            </div>
            <form class="form-horizontal" role="form">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="id_gameName" class="col-sm-3 control-label">Nom du jeu :</label> 
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="name" id="id_name"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="id_login" class="col-sm-3 control-label">Login :</label> 
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="username" id="id_login"/>
                            </div>
                        </div>
                        <div class="pull-right">
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