<?php
/**
 * File : core.php
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
        Router_Core::loader();
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

        //select the folder where class should be located based on suffix
        switch (strtolower($suffix))
        {
            case 'model':
                $folder = DS. 'models' . DS;
                break;

            case 'library':
                $folder = DS .'libraries'  . DS;
                break;

            case 'driver':
                $folder = DS. 'libraries' .DS . 'drivers' . DS;
                break;

            case 'controller':
                $folder = DS . 'controllers' . DS;
                break;

            case 'core':
                $folder = DS . 'core' . DS ;
                break;
        }


        //compose file name
        $file = SERVER_ROOT . $folder . strtolower($filename) . '.php';

        //fetch file
        if (file_exists($file))
        {
            //get file
            include_once($file);
        }
        else
        {
            //file does not exist!
            header('Location: ' . Core::site_url());

            die("File '$filename' containing class '$className' not found.");
        }
    } // end of __autoload

    public static function site_url($uri = '') //Hàm này sẽ tạo đường dẫn tuyệt đối
    {
        if(self::$config['mod_rewrite'] == 'on') {
            $url = BASE_URL . $uri;
        } else {
            $url = BASE_URL . 'index.php/' . $uri;
        }
        if($uri == '') {
            return $url;
        } else {
            return $url . self::$config;
        }
    }


}