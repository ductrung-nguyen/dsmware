<?php
/**
 * File : install.php
 * User : loveallufev
 * Date:  6/15/13
 * Group: Hieu-Trung
*/

// only allow to access Index.php
define('APP', TRUE);
define('DEBUG', TRUE);
define('DS', DIRECTORY_SEPARATOR);
define('SERVER_ROOT', realpath(dirname(__FILE__)));

require_once SERVER_ROOT . DS . 'config.php';
require_once(SERVER_ROOT . DS . "Lib/Driver/MysqlImproved.php");

$db = new Lib_Driver_MysqlImproved($config['connection']);

$link = mysql_connect($config['connection']['host'], $config['connection']['username'], $config['connection']['password']);

if (!$link)
    die ("Couldn't connect to mysql server");

// Dont have database
//if (!$db->connect()){
    $query = 'CREATE DATABASE ' . $config['connection']['database'] . " ;";

    if (mysql_query($query, $link)) {
        echo "Database database created successfully\n";
        $raw_sql = str_replace('`','',file_get_contents("database/ProductTracking.sql"));

        $query = "USE " . $config['connection']['database'] . ";" .  $raw_sql;
        $queries = explode(';', $query);
        foreach($queries as $s){
            mysql_query($s, $link);
        }
        if  (mysql_error() !="")
            echo "Create tables successfully\n";
        else
            echo "Error when creating tables\n" . "Error:" . mysql_error() . "\n";
    } else {
        echo 'Error creating database: ' . mysql_error() . "\n";
    }
//}
//else
//    echo "Database was already existed";