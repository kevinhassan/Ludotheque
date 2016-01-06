<?php
function tabUser($tab_user)
{
    $max=sizeof($tab_user);
    $i=0;
    while($i<$max){
    $u=$tab_user[$i];
        $username = $u->username;
        $name = $u->nameUser;
        $nickname = $u->nicknameUser;
        $sex = $u->sexUser;        
        $email = $u->emailUser;
        $tel = $u->telUser;
        $mobile = $u->mobileUser;
        $address= $u->addressUser;
        $cp = $u->cpUser;
        $city = $u->cityUser;
        $admin = $u->admin;
        $dateIns = $u->dateInscription;
        $dateNais = $u->dateNaissance;
        $nbrRetard = $u->nbrRetard;
        if($admin == 1)
        {
            $admin = 'Oui';
        }
        else{
            $admin = 'Non';
        }
        $ban = $u->banUser;
        if($ban==0){
            $ban='Non';
        }  else {
            $ban='Oui';
        }
        echo <<< EOT
        <tr><td><a href="?action=modifyUser&user=$username">$username</a></td><td>$name</td><td>$nickname</td><td>$dateNais</td><td>$sex</td><td>$email</td><td>$tel</td><td>$mobile</td><td>$address</td><td>$cp</td><td>$city</td><td>$dateIns</td><td>$admin</td><td>$nbrRetard<td>$ban</td></tr>
</div>
EOT;
    $i++;
    }
}
?>
<?php
echo '<div class="container">';
if(isset($_SESSION['login']) && $_SESSION['admin']==1){ //Il faut être admin pour voir la liste des utilisateurs

    echo <<<EOT
    <h1>Liste des utilisateurs :</h1>
    <div class="containt-Utilisateur">
        <table class="table-striped tableUtilisateur" id="tableUser"><thead>
          <tr>
            <th>Utilisateur</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Date Naissance</th>
            <th>Sexe</th>
            <th>Email</th>
            <th>Téléphone</th>            
            <th>Mobile</th>
            <th>Adresse</th>
            <th>Code Postal</th>
            <th>Ville</th>
            <th>Date Inscription</th>
            <th>Admin</th>
            <th>Nombre Retard</th>
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
}
echo '</div>';