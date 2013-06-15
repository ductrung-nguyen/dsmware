<?php
/**
 * File : UpdateDB.php
 * User : loveallufev
 * Date:  6/15/13
 * Group: Hieu-Trung
*/
require_once('../index.php');
require_once('../config.php');

foreach ($config['modules']['merchant'] as $merchant){
    $controller = new $merchant['class'];
    $controller->updateDBAction();
}