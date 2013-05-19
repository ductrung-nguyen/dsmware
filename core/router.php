<?php
/**
 * File : router.php
 * User : loveallufev
 * Date:  5/19/13
 * Group: Hieu-Trung
*/
defined('APP') or die('access denied');


/**
 * Class Core_Router : Route for all request
 */
class Router_Core {
    /**
     * @controller: name of main controller
     */
    public static $controller;

    /**
     * @action: name of action will be executed
     */
    public static $action;

    /**
     * @param: params needed for execution
     */
    public static $param;

    public static function loader(){
        self::getController();
        $classname = ucfirst(self::$controller) . '_Controller';
        $controller = new $classname();

        // if the action function isn't exist in controller object
        if (!is_callable(array($controller, self::$action . 'Action' ))){
            // switch to default action
            $action = 'indexAction';
        } else {
            // init action
            $action = self::$action . 'Action';
        }


        // call action function
        $controller->$action(self::$param);

    }

    private static function getController(){
        $uri = str_replace($_SERVER['SCRIPT_NAME'], '', $_SERVER['PHP_SELF']);
        Core::$config['debug'] = '<uri>' . $uri . '</uri>';
        $control = $action = $param = '';
        if(preg_match('#^/?(?P<control>[\w]+)?(?:/(?P<action>[\w]+))?(?:/(?P<param>[\d]+))?#', $uri, $matches)) {
            extract($matches);
        }

        self::$controller = (empty($control)) ? 'index' : $control;
        self::$action = (empty($action)) ? 'index' : $action;
        self::$param = (empty($param)) ? 'index' : $param;


    }
}