<?php
/**
 * File : Product.php
 * User : loveallufev
 * Date:  5/27/13
 * Group: Hieu-Trung
*/


class Model_Product {
    public $name;
    public $tags;
    public $detailURL;
    public $images;
    public $thumbnail;
    public $ASIN;
    public $manufacture;
    public $price;
    public $currency;
    public $merchant;

    public function setName($name){
        $this->name = $name;
        return $this;
    }

    public function setTags($tags){
        $this->tags = $tags;
        return $this;
    }

    public function setDetailURL($url){
        $this->detailURL = $url;
        return $this;
    }

    public function setImages($imagesURL){
        $this->images = $imagesURL;
        return $this;
    }

    public function setThumbnail($thumbnailURL){
        $this->thumbnail = $thumbnailURL;
        return $this;
    }

    public function setASIN($ASIN){
        $this->ASIN = $ASIN;
        return $this;
    }

    public function setManufacture($manufacture){
        $this->manufacture = $manufacture;
        return $this;
    }

    public function setPrice($price){
        $this->price = $price;
        return $this;
    }

    public function addPrice($key, $price){
        $this->price[$key] = $price;
        return $this;
    }

    public function setCurrency($cur){
        $this->currency=$cur;
        return $this;
    }

    public function setMerchant($merchant){
        $this->merchant = $merchant;
    }


    /**
     * Checking a product was tracked or not
     * @param $product_code : product ID
     * @param $merchant : amazon or ebay...
     * @return bool
     */
    static public function checkExistProductByID($product_code, $merchant){
        try{
            $model = new Core_Model();
            $model->getDB()->connect();

            //$model->getDB()->prepare("INSERT INTO Product(ProductCode, Name, Website) VALUES ('B000KKI1F6', 'Clearblue Digital Pregnancy Test Kit with Conception Indicator - Twin-Pack', 'amazon')");
            $model->getDB()->prepare("SELECT * FROM Product WHERE ProductCode='$product_code'");

            $model->getDB()->query();

            $result = $model->getDB()->fetch();

            $model->getDB()->disconnect();
            if (isset($result))
                return TRUE;
            else
                return FALSE;
        }
        catch (Exception $e)
        {
            return FALSE;
        }
    }

    /**
     * Get all historical prices of a product
     * @param $productID
     * @return Model_Product|null
     */
    public static function getTrackedPrices($productID){
        try{
            $model = new Core_Model();
            $model->getDB()->connect();

            //$model->getDB()->prepare("INSERT INTO Product(ProductCode, Name, Website) VALUES ('B000KKI1F6', 'Clearblue Digital Pregnancy Test Kit with Conception Indicator - Twin-Pack', 'amazon')");
            $model->getDB()->prepare("SELECT * FROM Tracking, Product WHERE ProductID='$productID' and ProductID = ProductCode ORDER BY PriceType, Time ASC");

            $model->getDB()->query();

            $results = $model->getDB()->fetch('array');

            $model->getDB()->disconnect();
            if (isset($results)){
                $last_type_price = "";
                $p = new Model_Product();;
                $price = array();
                /* $price = {
                    amazon=>{1212=> $9,4, 123124=>$10.5},
                    amazon-new=> {112 => $1.2, 2332=>$3.2}
                 }
                */

                foreach($results as $row){
                    if (!isset($p->name)){
                        $p->setName($row['Name'])->setASIN($row['ProductID']);
                    }
                    $price[$row['PriceType']][$row['Time']] =$row['Price'];
                }

                $p->setPrice($price);

                return $p;

            }
            else
                return null;
        }
        catch (Exception $e)
        {
            return null;
        }
    }

    /**
     * Get all prices of type $type of a product
     * @param $productID
     * @param $type
     * @return Model_Product|null
     */
    public static function getTrackedPricesByType($productID, $type){
        try{
            $model = new Core_Model();
            $model->getDB()->connect();

            //$model->getDB()->prepare("INSERT INTO Product(ProductCode, Name, Website) VALUES ('B000KKI1F6', 'Clearblue Digital Pregnancy Test Kit with Conception Indicator - Twin-Pack', 'amazon')");
            $model->getDB()->prepare("SELECT * FROM Tracking, Product WHERE ProductID='$productID' and PriceType='$type' and ProductID = ProductCode ORDER BY PriceType, Time ASC");

            $model->getDB()->query();

            $results = $model->getDB()->fetch('array');

            $model->getDB()->disconnect();
            if (isset($results)){
                $last_type_price = "";
                $p = new Model_Product();;
                $price = array();
                /* $price = {
                    amazon=>{1212=> $9,4, 123124=>$10.5},
                    amazon-new=> {112 => $1.2, 2332=>$3.2}
                 }
                */

                foreach($results as $row){
                    if (!isset($p->name)){
                        $p->setName($row['Name'])->setASIN($row['ProductID']);
                    }
                    $price[$row['PriceType']][$row['Time']] =$row['Price'];
                }

                $p->setPrice($price);

                return $p;

            }
            else
                return null;
        }
        catch (Exception $e)
        {
            return null;
        }
    }

    public static function getPriceTypeOfProduct($productID){
        try{
            $model = new Core_Model();
            $model->getDB()->connect();

            //$model->getDB()->prepare("INSERT INTO Product(ProductCode, Name, Website) VALUES ('B000KKI1F6', 'Clearblue Digital Pregnancy Test Kit with Conception Indicator - Twin-Pack', 'amazon')");
            $model->getDB()->prepare("SELECT DISTINCT Keyword, Name FROM `Tracking`, PriceType WHERE Keyword=PriceType and ProductID='$productID'");

            $model->getDB()->query();

            $results = $model->getDB()->fetch('array');

            $model->getDB()->disconnect();
            if (isset($results)){
                $last_type_price = "";
                $p = new Model_Product();;
                $priceTypes = array();
                /* $price = {
                    amazon=>{1212=> $9,4, 123124=>$10.5},
                    amazon-new=> {112 => $1.2, 2332=>$3.2}
                 }
                */

                foreach($results as $row){
                    $priceTypes[$row['Keyword']] =$row['Name'];
                }

                return $priceTypes;

            }
            else
                return null;
        }
        catch (Exception $e)
        {
            return null;
        }
    }


}