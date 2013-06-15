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

foreach ($config['modules']['merchant'] as $merchant){
    $controller = new $merchant['class'];
    $controller->updateDBAction(NULL);
    echo "Products from " . $merchant['class'] . " have been updated!\n";
}