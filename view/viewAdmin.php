<?php
if(!Session::is_admin()){
echo <<< EOT
   Vous n'avez pas accès à cette page du site
EOT;
}
else{
echo <<< EOT
<div class="container">
  <div class="boutonrotate">
    <ul>
        <li><a href="?action=createUser" class="round red">Inscrire Utilisateur<span class="round">Ici, vous pouvez ajouter un nouvel utilisateur.</span></a></li>
        <li><a href="?action=listUser" class="round red">Modifier Utilisateur<span class="round">Ici, vous pouvez modifier un utilisateur. </span></a></li>
        <li><a href="?action=addJeu" class="round red">Ajouter jeux<span class="round">Ici, vous pouvez ajouter un nouveau jeux.</span></a></li>
        <li><a href="?action=listResa" class="round red">Liste des Réservations<span class="round">Ici, vous pouvez consulter les réservations en cours.</span></a></li> 
   </ul>
  </div>
</div>
                
EOT;
}
?>
