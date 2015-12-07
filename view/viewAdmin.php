<?php
            if(!Session::is_admin()){
                echo <<< EOT
                        Vous n'avez pas accès à cette page du site
EOT;
            }else{
echo <<< EOT
            <div class="row">
                <div class="col-xs-12">
                    <p><a href="?action=createUser" title="Créer un utilisateur">Créer utilisateur</a></p>
                    <p><a href="?action=modifyUser" title="Modifier un utilisateur">Modifier Utilisateur</a></p>
                    <p><a href="?action=addGame" title="Ajouter un jeux">Ajouter jeux</a></p>                    
                </div>
            </div>
</div>
EOT;
            }
/*
 * Il reste à finir le visuel avec un contenant pour l'ensemble des liens
 */
?>
