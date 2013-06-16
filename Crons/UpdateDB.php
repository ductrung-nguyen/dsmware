<?php
/**
 * File : UpdateDB.php
 * User : loveallufev
 * Date:  6/15/13
 * Group: Hieu-Trung
 */

/**
 * To run this cron job:
 * in command line window: crontab -e
 * Add: 00 * * * * /usr/local/bin/php ~/www/Crons/UpdateDB.php
 * This script will be ran every 1 hour.
 */

require_once('../index.php');
require_once('../config.php');

$log = date("F j, Y, g:i a") . "\n";

foreach ($config['modules']['merchant'] as $merchant){
    $controller = new $merchant['class'];
    $controller->updateDBAction(NULL);
    $log .= "Products from " . $merchant['class'] . " have been updated!\n";
}

$log .= "-------------------------------------\n\n";

$file = SERVER_ROOT . DS . 'Crons/log.txt';

// Write the contents to the file,
// using the FILE_APPEND flag to append the content to the end of the file
// and the LOCK_EX flag to prevent anyone else writing to the file at the same time
$handle = fopen($file, 'a+');

fwrite($handle, $log);

fclose($handle);