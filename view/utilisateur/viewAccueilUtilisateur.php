<?php
function view1() {
   echo <<< EOT
EOT;
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Accueil</title>
    </head>
    <body>
        <div>
            <h1>Bienvenue sur notre ludotheque</h1>
            <?php view1(); ?>
    </body>
</html>