<?php
/**
 * File : MerchantAbstract.php
 * User : loveallufev
 * Date:  5/22/13
 * Group: Hieu-Trung
*/

/**
 * Class Controller_SearchingAbstract :  Define the prototype for searching modules
 */
abstract class Controller_MerchantAbstract extends Core_Controller{

    /**
     * Display index page
     * @param $param
     * @return nothing, but flush HTML output to client screen
     */
    abstract public function indexAction($param);

    /**
     * Search products by keyword
     * @param $param : array of parameters (depend on the interface, such as $param['textbox1']...)
     * @return nothing, but flush HTML output to client screen
     */
    abstract public function searchAction($param);

    /**
     * Look up a product by given product code
     * @param $param
     * @return TRUE or FALSE
     */
    abstract public  function lookupAction($param);

    /**
     * View detail of a product (include graph of prices)
     * @param $param
     * @return nothing, but flush HTML output to client screen
     */
    abstract public function viewAction($param);

    /**
     * @param $product: product which we want to track
     * @return nothing, but flush HTML output to client screen
     */
    abstract public function trackAction($product);

    /**
     * Update price for all tracked products of this merchant
     * @return TRUE or FALSE
     */
    abstract public function updateDBAction($param);
}