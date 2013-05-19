<?php
/**
 * File : controller.php
 * User : loveallufev
 * Date:  5/19/13
 * Group: Hieu-Trung
*/
defined('APP') or die('Access Denied');

abstract class Controller_Core {
    protected $view;

    public function __construct(){
        $this->view = new View_Core();
    }
}