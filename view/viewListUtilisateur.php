<?php
function tabUser($tab_user)
{
    $max=sizeof($tab_user);
    $i=0;
    while($i<$max){
    $u=$tab_user[$i];
        $username = $u->username;
        $sex = $u->sexUser;
        $name = $u->nameUser;
        $nickname = $u->nicknameUser;
        $email = $u->emailUser;
        $tel = $u->telUser;
        $mobile = $u->mobileUser;
        $address= $u->addressUser;
        $cp = $u->cpUser;
        $city = $u->cityUser;
        $ban = $u->banUser;
        if($ban==0){
            $ban='Autorisé';
        }  else {
            $ban='Banni';
        }
        echo <<< EOT
        <tr><td><a href="?action=modifyUser&user=$username">$username</a></td><td>$sex</td><td>$name</td><td>$nickname</td><td>$email</td><td>$tel</td><td>$mobile</td><td>$address</td><td>$cp</td><td>$city</td><td>$ban</td></tr>
</div>
EOT;
    $i++;
    }
}
?>
<?php

if(isset($_SESSION['login']) && Session::is_admin()){ //Il faut être admin pour voir la liste des utilisateurs

    echo <<<EOT
  <div class="container">
    <h1>Liste des utilisateurs :</h1>
    <div class="containt-Jeux">
        <table class="table-striped tableJeux" id="tableUser"><thead>
          <tr>
            <th>Utilisateur</th>
            <th>Sexe</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
            <th>Téléphone</th>            
            <th>Mobile</th>
            <th>Adresse</th>
            <th>Code Postal</th>
            <th>Ville</th>
            <th>Banni</th>
          </tr>
        </thead>
EOT;
tabUser($tab_user);
    echo <<<EOT
    </table>
EOT;
echo <<<EOT
    </div>
</div>
<script>$(document).ready(function() { $('#tableUser').DataTable(); } );</script>
EOT;
}else{
    echo "Seul l'administrateur peut voir la liste des utilisateurs !";
}
/*
 * Modifier le script DataTable pour l'adapter aux utilisateurs
 */