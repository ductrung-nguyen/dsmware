<?php
/**
 * File : index.php
 * User : loveallufev
 * Date:  5/16/13
 * Group: Hieu-Trung
*/

/**
 * WEB_ROOT_FOLDER is the name of the parent folder you created these
 * documents in.
 */

// only allow to access index.php
define('APP', TRUE);

define('DS', DIRECTORY_SEPARATOR);

//define('SERVER_ROOT' , '/var/www');
//define('SERVER_ROOT', '/home/loveallufev/PhpstormProjects/dsmware');
define('SERVER_ROOT', realpath(dirname(__FILE__)));

// absolute path
//$base_url = 'http://' . $_SERVER['HTTP_HOST'] . str_replace('index.php', '', $_SERVER['SCRIPT_NAME']);
define('BASE_URL' , 'http://localhost/');



// Include configuration file
require_once SERVER_ROOT . DS . 'config.php';

/**
 * Fetch the router
 */
require_once SERVER_ROOT . DS . 'core' . DS . 'core.php';
Core::init($config);
