<?php
/**
 * File : Controller.php
 * User : loveallufev
 * Date:  5/19/13
 * Group: Hieu-Trung
*/
defined('APP') or die('Access Denied');

abstract class Core_Controller {
    protected  $view;

    public function __construct(){
        $this->view = new Core_View();
    }
}