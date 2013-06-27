<?php
/**
 * File : Config.php
 * User : loveallufev
 * Date:  5/27/13
 * Group: Hieu-Trung
*/

/**
 * Class Core_Config : Load & store configuration file
 */
class Core_Config {

    /**
     * @var $data: contains configuration data
     */
    private $data;

    /**
     * @var $instance: real instance of class
     */
    private static $instance = null;

    /**
     * Include a configuration file by uri
     * @param $url_pattern : pattern of uri, such as Config_Amazon_Setting
     */
    static public function includeConfigFile($url_pattern){
        $url_pattern = ucwords(str_replace('_', DS, $url_pattern));
        $classFile = SERVER_ROOT . DS . $url_pattern . '.php';
        if (is_file($classFile)){
            include $classFile;
        }
    }

    /**
     * Constructor
     */
    private function Core_Config(){}

    /**
     * return single instance of this class
     * @return Core_Config|null
     */
    static public function getInstance(){
        if (!isset(self::$instance)){
            self::$instance = new Core_Config();
        }
        return self::$instance;
    }
}