<?php
/**
 * File : Config.php
 * User : loveallufev
 * Date:  5/19/13
 * Group: Hieu-Trung
*/

require_once SERVER_ROOT . '/Lib/' . 'XmlHelper.php';

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
$xml = simplexml_load_file(SERVER_ROOT . '/Config/' . 'Configuration.xml');
//var_dump($xml);

$config = XmlToArray($xml);
$config['modules'] = array();

// Load configuration from all module files and combine them
//$module_config_file = rglob('*.xml',0, SERVER_ROOT . '/Config/Modules/' );
//$module_config_file = glob(SERVER_ROOT . '/Config/Modules/' . '*.xml');
$module_config_file = glob(SERVER_ROOT . '/Config/Modules/*.xml' );
//var_dump($module_config_file); die;

$first = true;
foreach ($module_config_file as $f) {
    $temp = "";
    $temp = XmlToArray(simplexml_load_file($f))['modules'];

    //var_dump($temp['merchant']); echo "<br /> </br />";

    //array_push($config['modules']['merchant'], $temp['merchant']);
    if ($first = false){
//    var_dump($temp); die;
    } else {
        $first = false;
    }

    $config['modules'] = array_merge_recursive($config['modules'] , $temp);

}
//var_dump($config['modules']['merchant']); die;
