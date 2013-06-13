<?php
/**
 * File : Product.php
 * User : loveallufev
 * Date:  5/27/13
 * Group: Hieu-Trung
*/


class Model_Ebay_Product extends Model_MerchantAbstract {

    public function search($keyword)
    {
        return "result";
    }

    public function lookup($productID)
    {
        return "result";
    }

    /**
     * Add a product for tracking
     * @param $product
     * @return mixed
     */
    public function track($product)
    {
        // TODO: Implement track() method.
    }

    /**
     * Update new price of products which users have already added into database
     * @return mixed
     */
    static function updateDB()
    {
        // TODO: Implement updateDB() method.
    }
}