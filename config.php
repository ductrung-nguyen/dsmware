<?php
/**
 * File : Configs.php
 * User : loveallufev
 * Date:  5/19/13
 * Group: Hieu-Trung
*/

require_once SERVER_ROOT . '/Libs/' . 'XmlHelper.php';

/**
 * @param int $pattern
 *  the pattern passed to glob()
 * @param int $flags
 *  the flags passed to glob()
 * @param string $path
 *  the path to scan
 * @return mixed
 *  an array of files in the given path matching the pattern.
 */

function rglob($pattern='*', $flags = 0, $path='')
{
    $paths=glob($path.'*', GLOB_MARK|GLOB_ONLYDIR|GLOB_NOSORT);
    $files=glob($path.$pattern, $flags);
    foreach ($paths as $path) { $files=array_merge($files,rglob($pattern, $flags, $path)); }
    return $files;
}

// Load system configuration
$xml = simplexml_load_file(SERVER_ROOT . '/Configs/' . 'Configuration.xml');
//var_dump($xml);

$config = XmlToArray($xml);
$config['Modules'] = array();

// Load configuration from all module files and combine them
$module_config_file = rglob('*.xml',0, SERVER_ROOT . '/Configs/Modules/' );
//$module_config_file = glob(SERVER_ROOT . '/Configs/Modules/' . '*.xml');

foreach ($module_config_file as $f) {
    $temp = XmlToArray(simplexml_load_file($f))['modules'];
    $config['Modules'] = array_merge($config['Modules'] , $temp);
}

