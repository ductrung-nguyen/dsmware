<?php
/**
 * File : Core.php
 * User : loveallufev
 * Date:  5/19/13
 * Group: Hieu-Trung
*/

defined('APP') or die('Access denied');

class Core {
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
        list($suffix, $filename) = preg_split('/_/', strrev($className), 2);
        $filename = strrev($filename);
        $suffix = strrev($suffix);
        $folder = '';

        //$classFile = str_replace(' ', DS, ucwords(str_replace('_', ' ', $className)));
        $arr = explode(DS, ucwords(str_replace('_', DS, $className)));
        if ($arr[0] != 'Core')
            $arr[0] = $arr[0] . 's';
        $classFile = implode(DS , $arr);

        //$classFile = str_replace('controller'.DS, 'Controllers'.DS, $classFile);
        //$classFile = str_replace('model'.DS, 'models'.DS, $classFile);
        //$classFile = str_replace('view'.DS, 'Views'.DS, $classFile);
        $classFile = SERVER_ROOT . DS . $classFile . '.php';

        //select the folder where class should be located based on suffix

        //compose file name
        $file = SERVER_ROOT . $folder . strtolower($filename) . '.php';

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

    public static function includeConfigFile($url_pattern){
        $url_pattern = ucwords(str_replace('_', DS, $url_pattern));
        $classFile = SERVER_ROOT . DS . $url_pattern . '.php';
        if (is_file($classFile)){
            include $classFile;
        }
    }


}