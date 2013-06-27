<?php
/**
 * File : Home.php
 * User : loveallufev
 * Date:  5/20/13
 * Group: Hieu-Trung
*/


/**
 * Class Controller_Ebay_Home : Main class of Ebay Merchant
 */
class Controller_Ebay_Home extends Controller_MerchantAbstract {

    /**
     * Constructor
     */
    public function __construct(){
        parent::__construct();
        $this->view->currentMerchant = 'ebay';
        $this->view->merchants = array_keys(Core::$config['modules']['merchant']);
    }

    /**
     * Display index page
     * @param $param : we don't need any parameter here
     * @return nothing, but flush HTML output to client
     */
    public function indexAction($param)
    {
        if (DEBUG)
        {
            echo "<pre>" . "index action of ebay" . "</pre>";
        }
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
     * @return nothing, but flush HTML output to client screen
     */
    public function searchAction($param)
    {
        if (DEBUG){
            echo "<pre>". "search action of ebay" . "</pre>";
        }

        $keyword = (isset($param['sq']) ? $param['sq'] : '' ) .(isset($param['sq2']) ? $param['sq2'] : '' );
        $this->view->setTemplate('Ebay/search_result');

        $this->view->title = 'Ebay Product Tracking';

        $this->view->header = (new Core_View('header'))->render(FALSE);
        $this->view->footer = (new Core_View('footer'))->render(FALSE);

        $ebay_model = new Model_Ebay_Product();
        $result = $ebay_model->search($keyword);

        $this->view->result = $result;

        $this->view->keyword = $keyword;
        $this->view->data = str_replace('\\"','\\\\"', json_encode($this->view->result,JSON_FORCE_OBJECT | JSON_HEX_APOS));

        // set default template for result page

        $this->view->render();

    }

    /**
     * Look up a product by given product code
     * @param $param : contain id of product which need to look up
     * @return Model_Product
     */
    public function lookupAction($param)
    {
        if (!isset($param['id'])){
            return null;
        }

        return (new Model_Ebay_Product())->lookup($param['id']);
    }

    /**
     * View detail of a product (include graph of prices)
     * @param $param['id'] : product code
     * @return nothing, but flush HTML output to client screen
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
            $product = (new Model_Ebay_Product())->lookup($param['id']);
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
        $this->view->setTemplate('Ebay/Product');
        $this->view->product = $product;
        $this->view->type_of_price = isset($param['type_of_price']) ? $param['type_of_price'] : ['ebay'=>'ebay'];
        $this->view->render();

    }

    /**
     * Update price for all tracked products of this merchant
     * @return TRUE or FALSE
     */
    public function updateDBAction($param)
    {
        if (DEBUG){
            echo "Ebay updates its product";
        }
        $model = new Model_Ebay_Product();
        return $model->updateDB();
    }

    /**
     * Track new product
     * @param $product : product which we want to track
     * @return TRUE or FALSE
     */
    public function trackAction($product)
    {
        if (DEBUG){
            echo "Tracking of Ebay";
        }
        $model = new Model_Ebay_Product();
        return $model->track($product);
    }
}