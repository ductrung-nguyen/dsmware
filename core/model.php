<?php
/**
 * File : model.php
 * User : loveallufev
 * Date:  5/19/13
 * Group: Hieu-Trung
*/


class Model_Core {
    /**
     * Holds instance of database connection
     */
    private $db;

    /**
     * Constructor
     */
    function __construct()
    {
        $this->db = new MysqlImproved_Driver(Core::$config);
    }
}