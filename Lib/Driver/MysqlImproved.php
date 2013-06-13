<?php
/**
 * File : MysqlImproved.php
 * User : loveallufev
 * Date:  5/17/13
 * Group: Hieu-Trung
*/

class Lib_Driver_MysqlImproved extends Lib_Database{
    /**
     * Connection holds MySQLi resource
     */
    private $connection;

    /**
     * Query to perform
     */
    private $query;

    /**
     * Result holds data retrieved from server
     */
    private $result;

    /**
     * Configuration
     */
    private $config;

    public function __construct($config){
        $this->config = $config;
    }

    /**
     * Create new connection to database
     */
    public function connect()
    {
        //connection parameters
        $host = $this->config['host'];
        $user = $this->config['username'];
        $password = $this->config['password'];
        $database = $this->config['database'];

        //your implementation may require these...
        $port = $this->config['port'];
        $socket = $this->config['socket'];

        //create new mysqli connection
        $this->connection = new mysqli
        (
            $host , $user , $password , $database , $port , $socket
        );

        return TRUE;
    }

    /**
     * Break connection to database
     */
    public function disconnect()
    {
        //clean up connection!
        $this->connection->close();

        return TRUE;
    }

    /**
     * Prepare query to execute
     *
     * @param $query
     */
    public function prepare($query)
    {
        //store query in query variable
        $this->query = $query;

        return TRUE;
    }

    /**
     * Execute a prepared query
     */
    public function query()
    {
        if (isset($this->query))
        {
            //execute prepared query and store in result variable
            $this->result = $this->connection->query($this->query);

            return TRUE;
        }

        return FALSE;
    }

    /**
     * Fetch a row from the query result
     *
     * @param $type
     */
    public function fetch($type = 'object')
    {
        if (isset($this->result))
        {
            switch ($type)
            {
                case 'array':

                    //fetch a row as array
                    $row = $this->result->fetch_array();

                    break;

                case 'object':

                    //fall through...

                default:

                    //fetch a row as object
                    $row = $this->result->fetch_object();

                    break;
            }

            return $row;
        }

        return FALSE;
    }

    /**
     * Sanitize data to be used in a query
     *
     * @param $data
     */
    public function escape($data)
    {
        return $this->connection->real_escape_string($data);
    }
}