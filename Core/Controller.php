<?php
/**
 * File : Controller.php
 * User : loveallufev
 * Date:  5/19/13
 * Group: Hieu-Trung
*/
defined('APP') or die('Access Denied');

/**
 * Class Core_Controller: Abstract class for controller
 */
abstract class Core_Controller {
    /**
     * @var Core_View : responsible to display output content
     */
    protected  $view;

    public function __construct(){
        $this->view = new Core_View();
    }
}