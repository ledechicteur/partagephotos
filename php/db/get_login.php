<?php
/**
 * Created by PhpStorm.
 * User: syoum
 * Date: 12/03/2017
 * Time: 14:49
 */
require_once ('config/db_connect.php');

function get_login($login){

    try {
        global $link;
        $query = "SELECT login, password FROM users WHERE login = :login";

        $stm = $link->prepare($query);
        $stm->bindParam(':login', $login);

        $stm->execute();

        if ($stm->rowCount() == 1){
            $obj = $stm->fetchObject();
            $result['login'] = $obj->login;
            $result['password'] = $obj->password;
            return $result;
        }

        return null;
    }
    catch (PDOException $ex){
        include_once ('log/do_log.php');
        write_log('log/log.txt', 'PDO Exception thrown in file : ' . $ex->getFile() . $ex->getMessage());
        die('a database error has occured, check the log file or return to home page.');
    }
}