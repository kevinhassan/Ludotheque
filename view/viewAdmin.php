<?php
            if(!Session::is_admin()){
                echo <<< EOT
                        Vous n'avez pas accès à cette page du site
EOT;
            }else{
echo <<< EOT

                <div class="bouton col-lg-4">
                    <p><a href="?action=createUser" title="Créer un utilisateur">Créer utilisateur</a></p>
                </div><div class="bouton col-lg-4">
                    <p><a href="?action=modifyUser" title="Modifier un utilisateur">Modifier Utilisateur</a></p>
                </div><div class="bouton col-lg-4">
                    <p><a href="?action=addGame" title="Ajouter un jeux">Ajouter jeux</a></p>                    
                </div>
</div>
                
EOT;
            }
/*
 * Il reste à finir le visuel avec un contenant pour l'ensemble des liens
 */
?>
