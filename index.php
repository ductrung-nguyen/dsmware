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
define('SERVER_ROOT', realpath(dirname(__FILE__)));

// absolute path
if (!isset( $_SERVER['HTTP_HOST'])){
    $_SERVER['HTTP_HOST'] = '';
}

// For testing
if (is_null($_SERVER['SCRIPT_NAME']))
    $_SERVER['SCRIPT_NAME'] = SERVER_ROOT . '/index.php';


if (!isset($_SERVER['REQUEST_URI']) || is_null($_SERVER['REQUEST_URI']))
    //$_SERVER['REQUEST_URI'] = SERVER_ROOT. DS . 'index.php/product/track?site=amazon&id=B00004Y3Q8&name=Conan%20the%20Destroyer%20[DVD]%20[1984]';
    $_SERVER['REQUEST_URI'] = SERVER_ROOT. DS . 'index.php/product/view?active=amazon&id=B00004Y3Q8';
// End for testing

$base_url = 'http://' . $_SERVER['HTTP_HOST'] . str_replace('/index.php', '', $_SERVER['SCRIPT_NAME']);

define('BASE_URL' , $base_url);


// Include configuration file
require_once SERVER_ROOT . DS . 'config.php';

/**
 * Fetch the router
 */
require_once SERVER_ROOT . DS . 'Core' . DS . 'Core.php';
Core::init($config);
