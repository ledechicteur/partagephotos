<?php
/**
 * Created by PhpStorm.
 * User: syoum
 * Date: 12/03/2017
 * Time: 16:03
 */
session_start();
$login = "";
if (isset($_SESSION['login'])){
    header('refresh: 10; url=index.php');
    $login = $_SESSION['login'];
}
else {
    header('location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bienvenu sur PartagePhotos - redirection en cours</title>
    <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.css" />
    <link rel="stylesheet" href="css/general.css?v=<?php echo time();?>" />
    <script src="bootstrap-3.3.7-dist/jquery-3.1.1.min.js"></script>
    <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <div class="row" style="margin-top: 10px;">
        <div class="col-md-3"></div>
        <div class="col-md-6 col-sm-12">
            <img src="img/logo_big.png" alt="logo" class="img-responsive" style="margin: auto;" />
        </div>
        <div class="col-md-3"></div>
    </div>
    <div class="well well-lg">
        <h1 style="text-align: center;">
            Bienvenu <span class="text-info"><?php echo $login;?></span> sur PartagePhotos de nouveau<br>
            <small>Vous allez être redirigé vers la page d'accueil dans 10 secondes,<br>si vous ne voulez pas attendre <a href="index.php">cliquez ici</a>.</small>
        </h1>
    </div>
    <?php include ('include/footer.html');?>
</div>
</body>
</html>
