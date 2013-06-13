<?php
/**
 * File : MerchantAbstract.php
 * User : loveallufev
 * Date:  5/27/13
 * Group: Hieu-Trung
*/


abstract class Model_MerchantAbstract extends Core_Model {
    /**
     * Search product on Merchant site (This is the real function which interacts with data/database)
     * @param $keyword
     * @return mixed
     */
    abstract public function search($keyword);

    /**
     * @param $productID
     * @return mixed
     */
    abstract public function lookup($productID);
}