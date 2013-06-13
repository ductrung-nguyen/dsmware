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

    private $data;

    private static $instance = null;

    static public function includeConfigFile($url_pattern){
        $url_pattern = ucwords(str_replace('_', DS, $url_pattern));
        $classFile = SERVER_ROOT . DS . $url_pattern . '.php';
        if (is_file($classFile)){
            include $classFile;
        }
    }

    private function Core_Config(){}

    static public function getInstance(){
        if (!isset(self::$instance)){
            self::$instance = new Core_Config();
        }
        return self::$instance;
    }
}