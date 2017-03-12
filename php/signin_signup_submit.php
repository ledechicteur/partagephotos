<?php
/**
 * Created by PhpStorm.
 * User: syoum
 * Date: 12/03/2017
 * Time: 11:59
 */

$signin_err = $login_err = $password_err = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if (isset($_POST['signup_submit'])){
        //TODO signup
    }
    else if (isset($_POST['signin_submit'])){
        if (isset($_POST['login']) && isset($_POST['password'])){
            $login = htmlspecialchars($_POST['login']);
            $password = htmlspecialchars($_POST['password']);
            if ($login != "" && $password != ""){
                // we are using MD5 to protect passwords
                $password = md5($password);
                // qureying for the login in database
                include_once ('db/get_login.php');
                $result = get_login($login);
                if ($result == null){
                    // if return is null thene there is no login match
                    $login_err = "Ce login ne correspond à aucun compte, veuillez réssayer!<br>Notez bien que la différence entre majuscule et minuscule compte!";
                }
                else {
                    // we have to test if the two password match
                    if ($password == $result['password']){
                        $_SESSION['login'] = $login;
                        header('location: welcome.php');
                    }
                    else {
                        // password is incorrect
                        $password = "Votre mot de passe n'est pas correcte, veuillez réssayer!<br>Notez bien que la différence entre majuscule et minuscule compte!";
                    }
                }

            }
            else {
                // login or password are empty
                if ($login == ""){
                    $login_err = "Ce champ est obligatoire!";
                }
                if ($password == ""){
                    $password_err = "Ce champ est obligatoire!";
                }
            }
        }
        else {
            // post variables are not set
            $signin_err = "Le formulaire n'a pas été envoyé correctement au serveur, réssayez SVP!";
        }
    }
    else {
        // post variables are not set
        $signin_err = "Le formulaire n'a pas été envoyé correctement au serveur, réssayez SVP!";
    }
}