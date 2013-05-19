<?php
/**
 * File : database.php
 * User : loveallufev
 * Date:  5/17/13
 * Group: Hieu-Trung
*/

/**
 * The Database Library handles database interaction for the application
 */
abstract class Database_Library
{
    abstract protected function connect();
    abstract protected function disconnect();
    abstract protected function prepare($query);
    abstract protected function query();
    abstract protected function fetch($type = 'object');
}

