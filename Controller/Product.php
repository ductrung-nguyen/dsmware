<?php
/**
 * File : Product.php
 * User : loveallufev
 * Date:  5/22/13
 * Group: Hieu-Trung
*/


class Controller_Product extends Core_Controller{

    /**
     * @var : the real controller to handle action of each merchant
     */
    private $merchant_controller;

    /**
     * Action display index page
     * @param $param
     */
    public function indexAction($param){
        $this->view->title = 'Amazons Product Tracking';
        $this->view->header = (new Core_View('header'))->render(FALSE);
        $this->view->footer = (new Core_View('footer'))->render(FALSE);
        $this->view->body = 'Index page here';
        $this->view->setTemplate('product');
        $this->view->render();
    }

    /**
     * Action view detail of a product
     * @param $param
     */
    public function viewAction($param){
        if (!isset($param['active']) || !isset($param['id'])){
            return $this->indexAction($param);
        }


        // create controller of merchant (which has already declared in config file)
        $this->merchant_controller = new Core::$config['modules']['merchant'][$param['active']]['class']();

        // call viewAction of each merchant's controller
        $this->merchant_controller->viewAction($param);

        // check if product has been tracked or not
        // if yes, display the information from database
        // if no, display the information from amazon or ebay...
        //$this->view->title = 'Product Tracking';
        //$this->view->setTemplate('');


    }

    /**
     * Tracking a product
     * @param $param : containt ID of product we want to keep track
     */
    public function trackAction($param){
        if (!isset($param['id'])){
            return;
        }

        $product_code = $param['id'];
        $merchant = $param['site'];

        $product_name = $param['name'];

        // if we've already tracked this product, simply skip it
        if (Model_Product::checkExistProductByID($product_code, $merchant)){
            echo 'Already tracked';
            return 'Already tracked';
        }

        // create controller of merchant (which has already declared in config file)
        $this->merchant_controller = new Core::$config['modules']['merchant'][$param['site']]['class']();

        $param['name'] = $_POST['name'];
        $param['ASIN'] = $_POST['ASIN'];
        $this->merchant_controller->trackAction($param);
        echo "<pre>". "Track OK" ."</pre>";
    }



}