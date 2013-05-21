<?php
/**
 * File : Index.php
 * User : loveallufev
 * Date:  5/16/13
 * Group: Hieu-Trung
*/

/**
 * WEB_ROOT_FOLDER is the name of the parent folder you created these
 * documents in.
 */

// only allow to access Index.php
define('APP', TRUE);

define('DS', DIRECTORY_SEPARATOR);

//define('SERVER_ROOT' , '/var/www');
//define('SERVER_ROOT', '/home/loveallufev/PhpstormProjects/dsmware');
define('SERVER_ROOT', realpath(dirname(__FILE__)));

// absolute path
//$base_url = 'http://' . $_SERVER['HTTP_HOST'] . str_replace('Index.php', '', $_SERVER['SCRIPT_NAME']);
define('BASE_URL' , 'http://localhost/');

if (is_null($_SERVER['SCRIPT_NAME']))
    $_SERVER['SCRIPT_NAME'] = SERVER_ROOT . '/index.php';


if (is_null($_SERVER['REQUEST_URI']))
    $_SERVER['REQUEST_URI'] = SERVER_ROOT. '/index.php/amazon/home/search?sq=Nikon D7000';

//$_SERVER['QUERY_STRING']='';

// Include configuration file
require_once SERVER_ROOT . DS . 'config.php';

/**
 * Fetch the router
 */
require_once SERVER_ROOT . DS . 'Core' . DS . 'Core.php';
Core::init($config);
