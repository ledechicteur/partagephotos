<?php
session_start();
if (!isset($_SESSION['login'])){
    header("location: login.php");
}
?>
<h1>TODO : Logged in</h1>
