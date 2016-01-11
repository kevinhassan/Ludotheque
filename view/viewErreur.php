<?php
    echo <<< EOT
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="erreur-template">
                <h1>Oops!</h1>
                <div class="erreur-details" style="color:red;">
                    $message
                </div>
                <div class="erreur-actions">
                    <a href="." class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-home"></span> Accueil </a>
                    <a href="mailto:contact@homoludensassocies.fr" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-envelope"></span> Contacter l'administrateur </a>
                </div>
            </div>
        </div>
    </div>
</div>
EOT;
?>

