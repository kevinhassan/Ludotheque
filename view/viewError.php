<!DOCTYPE html>
<?php
    echo <<< EOT
    <html>
        <head>
            <meta charset="UTF-8">
            <title>Erreur</title>
        </head>
        <body>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="error-template">
                            <h1>Oops ! </h1>
EOT;
    echo <<< EOT
                            <div class="error-details">
                                Sorry, an error has occured, Requested page not found!
                            </div>
                            <div class="error-actions">
                                <a href="../index.php" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-home"></span>
                                    Accueil </a><a href="#" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-envelope"></span> Contacter Administrateur </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </body>
    </html>
EOT;
    /*
     * Pas très fonctionnelle
     */
?>

