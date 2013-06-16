<?php
/**
 * File : Router.php
 * User : loveallufev
 * Date:  5/19/13
 * Group: Hieu-Trung
*/
defined('APP') or die('access denied');


/**
 * Class Core_Router : Route for all request
 */
class Core_Router {
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

    /**
     * namespace
     */
    public static $module;

    public static function loader(){
        self::getController();
        $classname = '';

        // if in config file, no controller class was declared
        $classname = 'Controller_' . ucfirst(self::$controller);// . '_Controller';

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
        /*
        //fetch the passed request
        $request = $_SERVER['QUERY_STRING'];
        //parse the page request and other GET variables
        $parsed = explode('&' , $request);

        self::$namespace = array_shift($parsed);

        $control = array_shift($parsed);
        self::$controller = (empty($control)) ? 'index' : $control;

        $action = array_shift($parsed);
        self::$action = (empty($action)) ? 'index' : $action;

        self::$param = array();
        foreach ($parsed as $argument)
        {
            //split GET vars along '=' symbol to separate variable, values
            list($variable , $value) = split('=' , $argument);
            self::$param[$variable] = $value;
        }
        */

        if (strlen($_SERVER['REQUEST_URI']) < strlen($_SERVER['SCRIPT_NAME'])){
            $_SERVER['REQUEST_URI'] = $_SERVER['SCRIPT_NAME'] . DS;
        }
        $uri = str_replace($_SERVER['SCRIPT_NAME'] . DS, '', $_SERVER['REQUEST_URI']);

        // The uri will be like: /controller/action?param1=x&param2=y

        // split uri by '/'
        $parsed = explode('/' , $uri);

        //self::$module = array_shift($parsed);

        $control = array_shift($parsed);
        self::$controller = (empty($control)) ? 'index' : $control;

        $parsed = explode('?' , array_shift($parsed));
        $action = array_shift($parsed);

        self::$action = (empty($action)) ? 'index' : $action;

        if (empty($parsed))
            return;

        $parsed = explode('&' , array_shift($parsed));

        self::$param = array();
        foreach ($parsed as $argument)
        {
            //split GET vars along '=' symbol to separate variable, values
            list($variable , $value) = split('=' , $argument);
            self::$param[$variable] = $value;
        }

        /*
        $uri = str_replace($_SERVER['SCRIPT_NAME'], '', $_SERVER['PHP_SELF']);
        Core::$Config['debug'] = '<uri>' . $uri . '</uri>';
        $control = $action = $param = '';
        if(preg_match('#^/?(?P<control>[\w]+)?(?:/(?P<action>[\w]+))?(?:/(?P<param>[\d]+))?#', $uri, $matches)) {
            extract($matches);
        }
        */

    }
}