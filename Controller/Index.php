<?php
/**
 * File : Index.php
 * User : loveallufev
 * Date:  5/19/13
 * Group: Hieu-Trung
*/


class Controller_Index extends Core_Controller {

    /**
     * Display Index page when url is /index.php
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

        $this->view->merchants = array_keys(Core::$config['modules']['merchant']);
        $this->view->currentMerchant = 'amazon';
        
        $this->view->render();

    }
}