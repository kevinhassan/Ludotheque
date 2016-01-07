<?php
    echo <<< EOT
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="error-template">
                <h1>Oops!</h1>
                <h5 style="color:red;">$message</h5>
                <div class="error-details">
                    La page demandée n'est pas accessible !
                </div>
                <div class="error-actions">
                    <a href="" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-home"></span> Accueil </a>
                    <a href="mailto:contact@homoludensassocies.fr" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-envelope"></span> Contacter l'administrateur </a>
                </div>
            </div>
        </div>
    </div>
</div>
EOT;
?>

