<?php
/**
 * Created by PhpStorm.
 * User: syoum
 * Date: 12/03/2017
 * Time: 11:59
 */
$dbHost = "localhost";
$dbUser = "syoumi";
$dbPass = "syoumi";
$dbName = "partagephotos";

$link = null;

try {
    $link = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
    $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    die('PDO error : ' . $e->getMessage());
}