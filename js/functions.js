/**
 * Created by syoum on 11/03/2017.
 */
function verifyLoginForm() {
    var login = document.getElementById('login').value;
    var password = document.getElementById('password').value;
    var state = true;
    if (login === ""){
        document.getElementById('login_err').innerHTML = "Ce champ est obligatoire!";
        document.getElementById('login_grp').className = "input-group has-error has-feedback";
        state = false;
    }
    else {
        document.getElementById('login_err').innerHTML = "";
        document.getElementById('login_grp').className = "input-group";
    }
    if (password === ""){
        document.getElementById('password_err').innerHTML = "Ce champ est obligatoire!";
        document.getElementById('password_grp').className = "input-group has-error has-feedback";
        state = false;
    }
    else {
        document.getElementById('password_err').innerHTML = "";
        document.getElementById('password_grp').className = "input-group";
    }
    return state;
}

function verifyIfEmpty(inputId, grpId, errId) {
    var input = document.getElementById(inputId).value;
    if (input === ""){
        document.getElementById(errId).innerHTML = "Ce champ est obligatoire!";
        document.getElementById(grpId).className = "form-group col-md-6 has-error has-feedback";
        return false;
    }
    else {
        document.getElementById(errId).innerHTML = "";
        document.getElementById(grpId).className = "form-group col-md-6";
        return true;
    }
}

function verifyPhone(inputId, grpId, errID) {
    var phone = document.getElementById(inputId).value;
    var check = /^(?:(?:\(?(?:00|\+)([1-4]\d\d|[1-9]\d?)\)?)?[\-\.\ \\\/]?)?((?:\(?\d{1,}\)?[\-\.\ \\\/]?){0,})(?:[\-\.\ \\\/]?(?:#|ext\.?|extension|x)[\-\.\ \\\/]?(\d+))?$/i;
    if (phone.match(check)){
        document.getElementById(errID).innerHTML = "";
        document.getElementById(grpId).className = "form-group col-md-6";
        return true;
    }
    else {
        document.getElementById(errID).innerHTML = "Le format de votre téléphone n'est pas correct.";
        document.getElementById(grpId).className = "form-group col-md-6 has-error has-feedback";
        return false;
    }
}

function verifyEmail(inputId, grpId, errId) {
    var email = document.getElementById(inputId).value;
    var check = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if (email === ""){
        document.getElementById(errId).innerHTML = "Ce champ est obligatoire!";
        document.getElementById(grpId).className = "form-group col-md-6 has-error has-feedback";
        return false;
    }
    else if (!email.match(check)) {
        document.getElementById(errId).innerHTML = "Vous devez entrer un email valid, ex. example@mail.com!";
        document.getElementById(grpId).className = "form-group col-md-6 has-error has-feedback";
        return false;
    }
    else {
        document.getElementById(errId).innerHTML = "";
        document.getElementById(grpId).className = "form-group col-md-6";
        return true;
    }
}

function verifyLogin(inputId, grpId, errId) {
    var login = document.getElementById(inputId).value;
    var check = /^[a-zA-Z0-9]+$/;
    if (login === ""){
        document.getElementById(errId).innerHTML = "Ce champ est obligatoire!";
        document.getElementById(grpId).className = "form-group col-md-6 has-error has-feedback";
        return false;
    }
    else if (!login.match(check)){
        document.getElementById(errId).innerHTML = "Le login ne dois pas contenir d'espaces ni caractères spéciaux.";
        document.getElementById(grpId).className = "form-group col-md-6 has-error has-feedback";
        return false;
    }
    else {
        document.getElementById(errId).innerHTML = "";
        document.getElementById(grpId).className = "form-group col-md-6";
        return true;
    }
}

function verifyPassword(inputId, grpId, errId) {
    var password = document.getElementById(inputId).value;
    if (password.length < 8){
        document.getElementById(errId).innerHTML = "Votre mot de passe de contenir au moins 8 caractères.";
        document.getElementById(grpId).className = "form-group col-md-6 has-error has-feedback";
        return false;
    }
    else {
        document.getElementById(errId).innerHTML = "";
        document.getElementById(grpId).className = "form-group col-md-6";
        return true;
    }
}

function verifyPasswordConfirmation(inputId, grpId, errId, passwordId) {
    var password = document.getElementById(passwordId).value;
    var passwordConfirmation = document.getElementById(inputId).value;
    if (password !== passwordConfirmation){
        document.getElementById(errId).innerHTML = "Les mots de passes ne sont pas identiques!";
        document.getElementById(grpId).className = "form-group col-md-6 has-error has-feedback";
        return false;
    }
    else {
        document.getElementById(errId).innerHTML = "";
        document.getElementById(grpId).className = "form-group col-md-6";
        return true;
    }
}

function verifySignupForm() {
    if( verifyIfEmpty('firstname','firstname_grp', 'firstname_err') &&
            verifyIfEmpty('lastname', 'lastname_grp', 'lastname_err') &&
            verifyIfEmpty('country', 'country_grp', 'country_err') &&
            verifyIfEmpty('gender', 'gender_grp', 'gender_err') &&
            verifyEmail('email', 'email_grp', 'email_err') &&
            verifyLogin('login2', 'login2_grp', 'login2_err') &&
            verifyPassword('password2', 'password2_grp', 'password2_err') &&
            verifyPasswordConfirmation('password_conf', 'password_conf_grp', 'password_conf_err', 'password2')){
        document.getElementById('signup_err').innerHTML = "";
        return true;
    }
    else {
        document.getElementById('signup_err').innerHTML = "Vous avez des erreurs dans le formulaire, réssayez!";
        return false;
    }
}