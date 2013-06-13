<?php
/**
 * File : Site.php
 * User : loveallufev
 * Date:  5/22/13
 * Group: Hieu-Trung
*/


class Controller_Site extends Core_Controller {

    private  $merchant_controller;

    /**
     * Display the default page of Site control (such as show the main homepage...)
     * @param $param
     */
    public function indexAction($param){
        // set title for page
        // this operation will done by function __set of Core_View whether title_url hasn't declared before
        //(it's will be declared now)
        $this->view->title_url = "Homepage";
        $this->view->header = (new Core_View('header'))->render(FALSE);
        $this->view->footer = (new Core_View('footer'))->render(FALSE);


        // set template is home.php and render
        $this->view->setTemplate('home');
        $this->view->render();
    }

    public function searchAction($param){
        // the right parameters such as s=searchingSite & sq=keyword

        // doesn't declare searching site
        if ((!isset($param['s'])) && (!isset($param['s2']))){
            $this->indexAction($param);
            return;
        }

        // key keyword from textbox has id='sq' OR id='sq2'
        $keyword = (isset($param['sq']) ? $param['sq'] : '' ) .(isset($param['sq2']) ? $param['sq2'] : '' );

        // if there is a searching site in config file
        if (isset(Core::$config['modules']['merchant'][$param['s']]['class'])){
            $this->merchant_controller = new Core::$config['modules']['merchant'][$param['s']]['class']();
        }

        // if no keyword, load the default search page
        if (empty($keyword)){
            if (is_callable(array($this->merchant_controller , 'indexAction'))){
                    $this->merchant_controller->indexAction($param);
            }
            return;
        }

        $this->merchant_controller->searchAction($param);
    }
}