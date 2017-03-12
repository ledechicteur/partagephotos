<?php
/**
 * Created by PhpStorm.
 * User: syoum
 * Date: 12/03/2017
 * Time: 15:30
 */
function write_log($log_file, $message){
    $file = fopen($log_file, 'a');
    $now = date('d/m/Y H:i:s');
    $ip = $_SERVER['REMOTE_ADDR'];
    fwrite($file, $now." ".$ip." ".$message.PHP_EOL);
    fclose($file);
}