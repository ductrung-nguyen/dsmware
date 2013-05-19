<?php
/**
 * File : config.php
 * User : loveallufev
 * Date:  5/19/13
 * Group: Hieu-Trung
*/

require_once SERVER_ROOT . '/libraries/' . 'XmlHelper.php';

// Load system configuration
$xml = simplexml_load_file(SERVER_ROOT . '/config/' . 'configuration.xml');
//var_dump($xml);

$config = XmlToArray($xml)['connection'];
$_MODULE_CONFIG = array();

// Load configuration from all module files and combine them
$module_config_file = glob(SERVER_ROOT . '/config/modules/' . '*.xml');
foreach ($module_config_file as $f) {
    $temp = XmlToArray(simplexml_load_file($f))['modules'];
    $_MODULE_CONFIG = array_merge($_MODULE_CONFIG , $temp);
}

//var_dump($_MODULE_CONFIG);
