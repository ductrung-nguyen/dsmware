<?php
/**
 * File : Core.php
 * User : loveallufev
 * Date:  5/19/13
 * Group: Hieu-Trung
*/

defined('APP') or die('Access denied');

class Core {
    /**
     * @var $config: contains configuration of system
     */
    public static $config;

    /**
     * Initialize the system
     * @param $config : parameters to init the system
     */
    public static function init($config){
        self::$config = $config;
        spl_autoload_register(array('Core', 'autoload'));
        Core_Router::loader();
    }

    //Automatically includes files containing classes that are called
    public static function autoload($className)
    {
        // Parse out filename where class should be located
        // This supports names like 'Example_Model' as well as 'Example_Two_Model'

        //$classFile = str_replace(' ', DS, ucwords(str_replace('_', ' ', $className)));
        $arr = explode(DS, ucwords(str_replace('_', DS, $className)));
        $classFile = implode(DS , $arr);

        //$classFile = str_replace('controller'.DS, 'Controller'.DS, $classFile);
        //$classFile = str_replace('model'.DS, 'models'.DS, $classFile);
        //$classFile = str_replace('view'.DS, 'View'.DS, $classFile);
        $classFile = SERVER_ROOT . DS . $classFile . '.php';


        //fetch file
        if (file_exists($classFile))
        {
            //get file
            include_once($classFile);
        }
        else
        {
            //file does not exist!
            header('Location: ' . Core::site_url());

            die("File '$classFile' containing class '$className' not found.");
        }
    } // end of __autoload

    public static function site_url($uri = '') //Hàm này sẽ tạo đường dẫn tuyệt đối
    {
        if(self::$config['mod_rewrite'] == 'on') {
            $url = BASE_URL . $uri;
        } else {
            $url = BASE_URL . 'Index.php/' . $uri;
        }
        if($uri == '') {
            return $url;
        } else {
            return $url . self::$config;
        }
    }

    /**
     * Include a configuration file by uri
     * @param $url_pattern : pattern of uri, such as Config_Amazon_Setting
     */
    public static function includeConfigFile($url_pattern){
        $url_pattern = ucwords(str_replace('_', DS, $url_pattern));
        $classFile = SERVER_ROOT . DS . $url_pattern . '.php';
        if (is_file($classFile)){
            include $classFile;
        }
    }


}