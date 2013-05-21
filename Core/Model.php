<?php
/**
 * File : Model.php
 * User : loveallufev
 * Date:  5/19/13
 * Group: Hieu-Trung
*/


class Core_Model {
    /**
     * Holds instance of database connection
     */
    private $db;

    /**
     * Constructor
     */
    function __construct()
    {
        $this->db = new Lib_Driver_MysqlImproved(Core::$config['connection']);
    }
}