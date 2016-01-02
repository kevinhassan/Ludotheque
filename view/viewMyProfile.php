<?php

$u=$tab_u[0];
if($u->sexUser=="Homme")
    $image="./image/avatarHomme.png";
else
    $image="./image/avatarFemme.png";

echo <<< EOT
<div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
        <div class="panel panel-info">
          <div class="panel-heading">
            <h3 class="panel-title">$u->nicknameUser $u->nameUser</h3>
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-md-3 col-lg-3 " align="center"><img alt="User Pic" src="$image" class="img-circle img-responsive"> </div>
                  <!--<div class="col-xs-10 col-sm-10 hidden-md hidden-lg"> <br>
                    <dl>
                      <dt>Sexe :</dt>
                        <dd>$u->sexUser</dd>
                      <dt>Email</dt>
                        <dd>$u->emailUser</dd>
                      <dt>Numéro de téléphone</dt>
                         <dd>$u->telUser</dd>
                      <dt>Sexe</dt>
                        <dd>Male</dd>
                    </dl>
                  </div>-->
                  <div class=" col-md-9 col-lg-9 ">
                    <table class="table table-user-information">
                      <tbody>
                        <tr>
                          <td>Sexe :</td>
                          <td>$u->sexUser</td>
                        </tr>
                          <td>Adresse</td>
                          <td>$u->addressUser, $u->cpUser $u->cityUser</td>
                        </tr>
                        <tr>
                          <td>Email</td>
                          <td><a href="$u->emailUser">$u->emailUser</a></td>
                        </tr>
                          <td>Numéro de téléphone</td>
                          <td>$u->mobileUser(Mobile)<br><br>$u->telUser(Fixe)
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <a href="?action=modifyUser&user=$u->username&profile=1" class="btn btn-primary">Modifier mes informations</a>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
EOT;
?>
