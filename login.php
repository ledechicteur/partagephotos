<?php
session_start();
if (isset($_SESSION['login'])){
    header("location: index.php");
}
require_once ('php/signin_signup_submit.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion - Partage de Photos</title>
    <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.css" />
    <link rel="stylesheet" href="css/general.css?v=<?php echo time();?>" />
    <script src="bootstrap-3.3.7-dist/jquery-3.1.1.min.js"></script>
    <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <div class="row" style="margin-top: 50px;">
        <div class="col-md-3"></div>
        <div class="col-md-6 col-sm-12">
            <img src="img/logo_big.png" alt="logo" class="img-responsive" style="margin: auto;" />
        </div>
        <div class="col-md-3"></div>
    </div>
    <h1 style="text-align: center;">Bienvenu sur PartagePhotos<br><small>Connectez-vous ou rejoignez nous si vous n'êtes pas encore inscrit!</small></h1>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8 col-sm-12">
            <ul class="nav nav-pills nav-justified">
                <li class="active"><a href="#sign_in" data-toggle="tab">Connexion</a></li>
                <li><a href="#sign_up" data-toggle="tab">Inscription</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade in active" id="sign_in" style="padding: 10px;">
                    <h1>Connexion</h1>
                    <p>Pour vous connectez veuillez fournir votre email ou login et votre mot de passe, si vous n'êtes pas
                    encore inscrit vous pouvez créer un compte facilement, <a href="#sign_up" data-toggle="tab">cliquer ici.</a></p>
                    <div class="row">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-8">
                            <div class="text-danger" id="signin_err"><?php echo $signin_err; ?></div>
                            <form id="signin_form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"" method="POST" onsubmit="return verifyLoginForm();">
                                <div id="login_grp" class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input type="text" name="login" id="login" placeholder="Votre login ou email" class="form-control"/>
                                </div>
                                <div class="text-danger" id="login_err"><?php echo $login_err;?></div>
                                <div id="password_grp" class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                    <input type="password" name="password" id="password" placeholder="Votre mot de passe" class="form-control"/>
                                </div>
                                <div class="text-danger" id="password_err"><?php echo $password_err;?></div>
                                <br>
                                <div class="form-group pull-right">
                                    <button type="submit" name="signin_submit" value="Connexion" class="btn btn-success"><span class="glyphicon glyphicon-log-in"></span> &nbsp;&nbsp;Se connecter</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-sm-2"></div>
                    </div>

                </div>
                <div class="tab-pane fade" id="sign_up" style="padding: 10px;">
                    <h1>Inscription</h1>
                    <p>
                        Si vous n'avez pas encore de compte sur notre site, créez en un maintenant en un simple clique!<br>
                        Remplissez le formulaire ci-dessous attentivement et confirmez votre inscription par email et
                        bénificiez de tous nos services immédiatement ... qu'attendez vous ?
                    </p>
                    <form id="signup_form" action="#" method="POST" onsubmit="return verifySignupForm();">
                        <fieldset>
                            <legend>Informations générales</legend>
                            <div class="row">
                                <div id="firstname_grp" class="form-group col-md-6">
                                    <label for="firstname">Prénom:*</label>
                                    <input type="text" name="firstname" id="firstname" placeholder="Votre prénom" class="form-control"
                                    onchange="verifyIfEmpty('firstname', 'firstname_grp', 'firstname_err');"/>
                                    <div class="text-danger" id="firstname_err"></div>
                                </div>
                                <div id="lastname_grp" class="form-group col-md-6">
                                    <label for="lastname">Nom:*</label>
                                    <input type="text" name="lastname" id="lastname" placeholder="Votre nom" class="form-control"
                                    onchange="verifyIfEmpty('lastname', 'lastname_grp', 'lastname_err');"/>
                                    <div class="text-danger" id="lastname_err"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div id="birthdate_grp" class="form-group col-md-6">
                                    <label for="birthdate">Date de naissance:</label>
                                    <input type="date" name="birthdate" id="birthdate" class="form-control" />
                                    <div class="text-danger" id="birthdate_err"></div>
                                </div>
                                <div id="country_grp" class="form-group col-md-6">
                                    <label for="country">Pays:*</label>
                                    <select name="country" id="country" class="form-control">
                                        <option value="" selected disabled>Selectionnez dans la liste</option>
                                        <option value="Maroc">Maroc</option>
                                        <!-- TODO : list of countries -->
                                    </select>
                                    <div class="text-danger" id="country_err"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div id="gender_grp" class="form-group col-md-6">
                                    <label for="gender">Sexe:*</label>
                                    <select name="gender" id="gender" class="form-control">
                                        <option value="" selected disabled>Je suis ...</option>
                                        <option value="H">Homme</option>
                                        <option value="F">Femme</option>
                                    </select>
                                    <div class="text-danger" id="gender_err"></div>
                                </div>
                                <div id="tele_grp" class="form-group col-md-6">
                                    <label for="tele">Téléphone:</label>
                                    <input type="text" name="tele" id="tele" placeholder="Votre numéro de téléphone" class="form-control" onchange="verifyPhone('tele','tele_grp','tele_err');"/>
                                    <div class="text-danger" id="tele_err"></div>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <legend>Informations du compte</legend>
                            <div class="row">
                                <div id="email_grp" class="form-group col-md-6">
                                    <label for="email">Email:*</label>
                                    <input type="email" name="email" id="email" class="form-control"
                                    onchange="verifyEmail('email', 'email_grp', 'email_err');"/>
                                    <div class="text-danger" id="email_err"></div>
                                </div>
                                <div class="col-md-6">
                                    <span class="text-info">Votre email doit être correcte et vous devez en avoir accès parce que
                                    nous allons vous envoyer un message d'activation a cet email.</span>
                                </div>
                            </div>
                            <div class="row">
                                <div id="login2_grp" class="form-group col-md-6">
                                    <label for="login2">Login:*</label>
                                    <input type="text" name="login2" id="login2" class="form-control"
                                    onchange="verifyLogin('login', 'login_grp', 'login_err');"/>
                                    <div class="text-danger" id="login2_err"></div>
                                </div>
                                <div class="col-md-6">
                                    <span class="text-info">Votre login sert à vous identifier dans le site aussi que la base
                                    de données, il ne doit pas contenir des espaces ni des caractères spéciaux.</span>
                                </div>
                            </div>
                            <div class="row">
                                <div id="password2_grp" class="form-group col-md-6">
                                    <label for="password2">Mot de passe:*</label>
                                    <input type="password" name="password2" id="password2" placeholder="Votre mot de passe" class="form-control"
                                    onchange="verifyPassword('password2', 'password2_grp', 'password2_err');"/>
                                    <div class="text-danger" id="password2_err"></div>
                                </div>
                                <div class="col-md-6">
                                    <span class="text-info">Pour une sécurité de votre compte, nous vous conseillons d'utiliser un mot de passe d'au moins
                                    8 caractères avec des nombres, chiffres et caractères spéciaux.</span>
                                </div>
                            </div>
                            <div class="row">
                                <div id="password_conf_grp" class="form-group col-md-6">
                                    <label for="password_conf">Confirmation du mot de passe:*</label>
                                    <input type="password" name="password_conf" id="password_conf" placeholder="Encore une fois ..." class="form-control"
                                    onchange="verifyPasswordConfirmation('password_conf', 'password_conf_grp', 'password_conf_err', 'password2');"/>
                                    <div class="text-danger" id="password_conf_err"></div>
                                </div>
                                <div class="form-group col-md-6"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="submit" name="signup_submit" value="S'inscrire" class="btn btn-success" />
                                </div>
                            </div>
                        </fieldset>
                    </form>
                    <div class="text-warning" id="signup_err"></div>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
    <?php include ('include/footer.html'); ?>
</div>
<script src="js/functions.js"></script>
</body>
</html>
