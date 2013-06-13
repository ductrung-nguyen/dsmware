<?php
/**
 * File : Home.php
 * User : loveallufev
 * Date:  5/20/13
 * Group: Hieu-Trung
*/


class Controller_Ebay_Home extends Controller_MerchantAbstract {

    /**
     * Display index page
     * @param $param
     * @return mixed
     */
    public function indexAction($param)
    {
        echo "<pre>" . "index action of ebay" . "</pre>";
        $this->view->title = 'Ebay Product Tracking';
        $this->view->header = (new Core_View('header'))->render(FALSE);
        $this->view->footer = (new Core_View('footer'))->render(FALSE);
        $this->view->body = 'Some stuff';
        $this->view->setTemplate('Ebay/Home');
        $this->view->render();
    }

    /**
     * Search products by keyword
     * @param $param : array of parameters (depend on the interface, such as $param['textbox1']...)
     * @return mixed
     */
    public function searchAction($param)
    {
        echo "<pre>". "search action of ebay" . "</pre>";
        $keyword = (isset($param['sq']) ? $param['sq'] : '' ) .(isset($param['sq2']) ? $param['sq2'] : '' );
        $this->view->setTemplate('Ebay/search_result');

        $this->view->title = 'Ebay Product Tracking';

        $this->view->header = (new Core_View('header'))->render(FALSE);
        $this->view->footer = (new Core_View('footer'))->render(FALSE);

        $amazon_model = new Model_Ebay_Product();
        $result = $amazon_model->search($keyword);

        $this->view->result = (new Model_Ebay_Product())->search($keyword);

        $this->view->keyword = $keyword;
        $this->view->data = str_replace('\\"','\\\\"', json_encode($this->view->result,JSON_FORCE_OBJECT | JSON_HEX_APOS));

        // set default template for result page

        $this->view->render();

    }

    /**
     * Look up a product by given product code
     * @param $param
     * @return mixed
     */
    protected function lookupAction($param)
    {
        // TODO: Implement lookup() method.
    }

    /**
     * View detail of a product (include graph of prices)
     * @param $param['id'] : product code
     * @return mixed
     */
    public function viewAction($param)
    {
        if (!isset($param['id'])){
            return indexAction($param);
        }

        if (isset($_SESSION['product'][$param['id']])){
            // get product from session data (we've already saved it before)
            $product = $_SESSION['product'][$param['id']];
        } else {
            $product = (new Model_Ebay_Product())->lookup($param['id']);
        }

        // And prepare data for displaying
        $this->view->setTemplate('Ebay/Product');
        $this->view->product = $product;
        $this->view->render();
    }

    /**
     * Update price for all tracked products of this merchant
     * @return mixed
     */
    public function updateDBAction($param)
    {
        // TODO: Implement updateDBAction() method.
    }

    public function trackAction($param)
    {
        // TODO: Implement trackAction() method.
    }
}