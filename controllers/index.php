<?php
/**
 * File : index.php
 * User : loveallufev
 * Date:  5/19/13
 * Group: Hieu-Trung
*/


class Index_Controller extends Controller_Core {
    public function indexAction(){

        // set title for page
        // this operation will done by function __set of Core_View whether title_url hasn't declared before
        //(it's will be declared now)
        $this->view->title_url = "Homepage";
        $this->view->header = (new View_Core('header'))->render(FALSE);
        $this->view->footer = (new View_Core('footer'))->render(FALSE);


        // set template is home.php and render
        $this->view->setTemplate('home');
        $this->view->render();
    }
}