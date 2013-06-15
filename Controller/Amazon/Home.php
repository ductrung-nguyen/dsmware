<?php
/**
 * File : Home.php
 * User : loveallufev
 * Date:  5/20/13
 * Group: Hieu-Trung
*/


class Controller_Amazon_Home extends Controller_MerchantAbstract {

    /**
     * Display index page
     * @param $param
     * @return mixed
     */
    public function indexAction($param)
    {
        echo "<pre>" . "index action of amazon" . "</pre>";
        $this->view->title = 'Amazons Product Tracking';
        $this->view->header = (new Core_View('header'))->render(FALSE);
        $this->view->footer = (new Core_View('footer'))->render(FALSE);
        $this->view->body = 'Some stuff';
        $this->view->setTemplate('Amazon/Home');
        $this->view->render();
    }

    /**
     * Search products by keyword
     * @param $param : array of parameters (depend on the interface, such as $param['textbox1']...)
     * @return mixed
     */
    public function searchAction($param)
    {
        echo "<pre>". "search action of amazon" . "</pre>";
        $keyword = (isset($param['sq']) ? $param['sq'] : '' ) .(isset($param['sq2']) ? $param['sq2'] : '' );
        $this->view->setTemplate('Amazon/search_result');

        $this->view->title = 'Amazons Product Tracking';

        $this->view->header = (new Core_View('header'))->render(FALSE);
        $this->view->footer = (new Core_View('footer'))->render(FALSE);

        $this->view->result = (new Model_Amazon_Product())->search($keyword);
        //echo var_dump($this->view->result);die;

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
    public function lookupAction($param)
    {
        if (!isset($param['id'])){
            return null;
        }

        return (new Model_Amazon_Product())->lookup($param['id']);
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

        if (isset($_SESSION['products'][$param['id']])){
            // get product from session data (we've already saved it before)
            $product = $_SESSION['products'][$param['id']];
        } else {
            $product = (new Model_Amazon_Product())->lookup($param['id']);
            $_SESSION['product'] = $product;
        }

        // this product was already tracked
        if ($param['tracked']){
            $this->view->tracked = TRUE;
        }
        else {
            $this->view->tracked = FALSE;
        }

        // And prepare data for displaying
        $this->view->setTemplate('Amazon/Product');
        $this->view->product = $product;
        $this->view->type_of_price = $param['type_of_price'];
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

    public function trackAction($product)
    {
        echo "Tracking of Amazon";
        $model = new Model_Amazon_Product();
        return $model->track($product);
    }
}