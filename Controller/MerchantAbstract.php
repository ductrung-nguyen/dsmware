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
     * @return mixed
     */
    abstract public function indexAction($param);

    /**
     * Search products by keyword
     * @param $param : array of parameters (depend on the interface, such as $param['textbox1']...)
     * @return mixed
     */
    abstract public function searchAction($param);

    /**
     * Look up a product by given product code
     * @param $param
     * @return mixed
     */
    abstract protected  function lookupAction($param);

    /**
     * View detail of a product (include graph of prices)
     * @param $param
     * @return mixed
     */
    abstract public function viewAction($param);

    abstract public function trackAction($param);

    /**
     * Update price for all tracked products of this merchant
     * @return mixed
     */
    abstract public function updateDBAction($param);
}