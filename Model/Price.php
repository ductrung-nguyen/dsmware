<?php
/**
 * File : Price.php
 * User : loveallufev
 * Date:  6/14/13
 * Group: Hieu-Trung
*/


class Model_Price {
    public $price;
    public $formattedPrice;

    /**
     * @param $price : price in float number
     * @param $formattedPrice : price with currency
     */
    public function __construct($price, $formattedPrice){
        $this->price = $price;
        $this->formattedPrice = $formattedPrice;
    }
}